package org.foi.nwtis.dkusic.aplikacija_4.ws;

import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.Socket;
import java.net.UnknownHostException;
import java.nio.charset.Charset;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.time.LocalDateTime;
import java.time.ZoneOffset;
import java.time.format.DateTimeFormatter;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import org.foi.nwtis.PostavkeBazaPodataka;
import org.foi.nwtis.dkusic.aplikacija_4.zrna.AirportFacade;
import org.foi.nwtis.dkusic.aplikacija_4.zrna.Autentikacija;
import org.foi.nwtis.dkusic.aplikacija_4.zrna.PogresnaAutentikacija;
import org.foi.nwtis.dkusic.aplikacija_4.zrna.Slusac;
import org.foi.nwtis.rest.klijenti.NwtisRestIznimka;
import org.foi.nwtis.rest.klijenti.OSKlijentBP;
import org.foi.nwtis.rest.podaci.LetAviona;
import jakarta.annotation.Resource;
import jakarta.inject.Inject;
import jakarta.jws.WebMethod;
import jakarta.jws.WebParam;
import jakarta.jws.WebService;

@WebService(serviceName = "letovi")
public class WsLetovi {
  @Resource(lookup = "java:app/jdbc/nwtis_bp")
  javax.sql.DataSource ds;

  public static PostavkeBazaPodataka konfig = Slusac.getkonfDB();
  Autentikacija autentikacija = new Autentikacija();

  @Inject
  AirportFacade airportFacade;

  @WebMethod
  public List<LetAviona> dajPolaskeInterval(@WebParam(name = "korisnik") String korisnik,
      @WebParam(name = "lozinka") String lozinka, @WebParam(name = "icao") String icao,
      @WebParam(name = "danOd") String danOd, @WebParam(name = "danDo") String danDo,
      @WebParam(name = "odBroja") int odBroja, @WebParam(name = "broj") int broj) {

    String odgovor = provjeri();
    if (odgovor.isEmpty()) {
      System.out.println("POSLUŽITELJ NIJE AKTIVAN");
      return null;
    } else if (odgovor.contains("OK 0")) {
      System.out.println("POSLUŽITELJ PAUZIRA");
      return null;
    }

    try {
      autentikacija.autentikacija(korisnik, lozinka);
    } catch (PogresnaAutentikacija pa) {
      System.out.println(pa.getMessage());
      return null;
    }

    if (odBroja == 0) {
      odBroja = 1;
    }

    if (broj == 0) {
      broj = 20;
    }
    int brojPop = broj + 1;
    broj = brojPop;

    List<LetAviona> listaLetova = new ArrayList<LetAviona>();
    long danOdUnix = 0;
    long danDoUnix = 0;
    try {
      danDoUnix = datumUEpoch(danDo);
      danOdUnix = datumUEpoch(danOd);
    } catch (ParseException e1) {
      e1.printStackTrace();
    }

    PreparedStatement pstmt = null;
    String query =
        "SELECT * FROM LETOVI_POLASCI lp WHERE lp.ESTARRIVALAIRPORT = ? AND lp.LASTSEEN BETWEEN ? AND ? LIMIT ? OFFSET ?";

    try (var con = ds.getConnection()) {

      pstmt = con.prepareStatement(query);
      pstmt.setString(1, icao);
      pstmt.setLong(2, danOdUnix);
      pstmt.setLong(3, danDoUnix);;
      pstmt.setInt(4, broj);
      pstmt.setInt(5, odBroja);
      ResultSet rs = pstmt.executeQuery();
      while (rs.next()) {
        while (rs.next()) {
          LetAviona la = new LetAviona();
          la.setIcao24(rs.getString("ICAO24"));
          la.setFirstSeen(rs.getInt("FIRSTSEEN"));
          la.setEstDepartureAirport(rs.getString("ESTDEPARTUREAIRPORT"));
          la.setLastSeen(rs.getInt("LASTSEEN"));
          la.setEstArrivalAirport(rs.getString("ESTARRIVALAIRPORT"));
          la.setCallsign(rs.getString("CALLSIGN"));
          la.setEstDepartureAirportHorizDistance(rs.getInt("ESTDEPARTUREAIRPORTHORIZDISTANCE"));
          la.setEstDepartureAirportVertDistance(rs.getInt("ESTDEPARTUREAIRPORTVERTDISTANCE"));
          la.setEstArrivalAirportHorizDistance(rs.getInt("ESTARRIVALAIRPORTHORIZDISTANCE"));
          la.setEstArrivalAirportVertDistance(rs.getInt("ESTARRIVALAIRPORTVERTDISTANCE"));
          la.setDepartureAirportCandidatesCount(rs.getInt("DEPARTUREAIRPORTCANDIDATESCOUNT"));
          la.setArrivalAirportCandidatesCount(rs.getInt("ARRIVALAIRPORTCANDIDATESCOUNT"));
          listaLetova.add(la);
        }
      }
      rs.close();
      pstmt.close();
      con.close();
    } catch (Exception e) {
      Logger.getGlobal().log(Level.SEVERE, e.getMessage());
      System.out.println(e.getMessage());
    } finally {
      try {
        if (pstmt != null && !pstmt.isClosed()) {
          pstmt.close();
        }
      } catch (SQLException e) {
        Logger.getGlobal().log(Level.SEVERE, e.getMessage());
        System.out.println(e.getMessage());
      }
    }
    if (listaLetova.isEmpty()) {
      System.out.println("Nisu pronađeni zapisi o letovima");
      return null;
    }
    return listaLetova;
  }

  @WebMethod
  public List<LetAviona> dajPolaskeNaDan(@WebParam(name = "korisnik") String korisnik,
      @WebParam(name = "lozinka") String lozinka, @WebParam(name = "icao") String icao,
      @WebParam(name = "dan") String dan, @WebParam(name = "odBroja") int odBroja,
      @WebParam(name = "broj") int broj) {

    String odgovor = provjeri();
    if (odgovor.isEmpty()) {
      System.out.println("POSLUŽITELJ NIJE AKTIVAN");
      return null;
    } else if (odgovor.contains("OK 0")) {
      System.out.println("POSLUŽITELJ PAUZIRA");
      return null;
    }

    try {
      autentikacija.autentikacija(korisnik, lozinka);
    } catch (PogresnaAutentikacija pa) {
      System.out.println(pa.getMessage());
      return null;
    }

    if (odBroja == 0) {
      odBroja = 1;
    }

    if (broj == 0) {
      broj = 20;
    }
    int brojPop = broj + 1;
    broj = brojPop;

    List<LetAviona> listaLetova = new ArrayList<LetAviona>();

    long datumPocetak = 0;
    try {
      datumPocetak = datumUEpoch(dan);
    } catch (ParseException e1) {
      e1.printStackTrace();
    }
    long datumKraj = datumPocetak + 86400;
    PreparedStatement pstmt = null;
    String query =
        "SELECT * FROM LETOVI_POLASCI lp WHERE lp.ESTARRIVALAIRPORT = ? AND lp.FIRSTSEEN BETWEEN ? AND ? LIMIT ? OFFSET ?";

    try (var con = ds.getConnection()) {

      pstmt = con.prepareStatement(query);
      pstmt.setString(1, icao);
      pstmt.setLong(2, datumPocetak);
      pstmt.setLong(3, datumKraj);
      pstmt.setInt(4, broj);
      pstmt.setInt(5, odBroja);
      ResultSet rs = pstmt.executeQuery();
      while (rs.next()) {
        while (rs.next()) {
          LetAviona la = new LetAviona();
          la.setIcao24(rs.getString("ICAO24"));
          la.setFirstSeen(rs.getInt("FIRSTSEEN"));
          la.setEstDepartureAirport(rs.getString("ESTDEPARTUREAIRPORT"));
          la.setLastSeen(rs.getInt("LASTSEEN"));
          la.setEstArrivalAirport(rs.getString("ESTARRIVALAIRPORT"));
          la.setCallsign(rs.getString("CALLSIGN"));
          la.setEstDepartureAirportHorizDistance(rs.getInt("ESTDEPARTUREAIRPORTHORIZDISTANCE"));
          la.setEstDepartureAirportVertDistance(rs.getInt("ESTDEPARTUREAIRPORTVERTDISTANCE"));
          la.setEstArrivalAirportHorizDistance(rs.getInt("ESTARRIVALAIRPORTHORIZDISTANCE"));
          la.setEstArrivalAirportVertDistance(rs.getInt("ESTARRIVALAIRPORTVERTDISTANCE"));
          la.setDepartureAirportCandidatesCount(rs.getInt("DEPARTUREAIRPORTCANDIDATESCOUNT"));
          la.setArrivalAirportCandidatesCount(rs.getInt("ARRIVALAIRPORTCANDIDATESCOUNT"));
          listaLetova.add(la);
        }
      }
      rs.close();
      pstmt.close();
      con.close();
    } catch (Exception e) {
      Logger.getGlobal().log(Level.SEVERE, e.getMessage());
      System.out.println(e.getMessage());
    } finally {
      try {
        if (pstmt != null && !pstmt.isClosed()) {
          pstmt.close();
        }
      } catch (SQLException e) {
        Logger.getGlobal().log(Level.SEVERE, e.getMessage());
        System.out.println(e.getMessage());
      }
    }
    if (listaLetova.isEmpty()) {
      System.out.println("Nisu pronađeni zapisi o letovima");
      return null;
    }
    return listaLetova;
  }

  @WebMethod
  public List<LetAviona> dajPolaskeNaDanOS(@WebParam(name = "korisnik") String korisnik,
      @WebParam(name = "lozinka") String lozinka, @WebParam(name = "icao") String icao,
      @WebParam(name = "dan") String dan) {

    String odgovor = provjeri();
    if (odgovor.isEmpty()) {
      System.out.println("POSLUŽITELJ NIJE AKTIVAN");
      return null;
    } else if (odgovor.contains("OK 0")) {
      System.out.println("POSLUŽITELJ PAUZIRA");
      return null;
    }

    try {
      autentikacija.autentikacija(korisnik, lozinka);
    } catch (PogresnaAutentikacija pa) {
      System.out.println(pa.getMessage());
      return null;
    }

    String korisnikOpenSky = konfig.dajPostavku("OpenSkyNetwork.korisnik");
    String lozinkaOpenSky = konfig.dajPostavku("OpenSkyNetwork.lozinka");
    List<LetAviona> listaLetova = new ArrayList<LetAviona>();

    String trenutniDatum = dan;
    LocalDate datum = LocalDate.parse(trenutniDatum, DateTimeFormatter.ofPattern("dd.MM.yyyy"));
    LocalDateTime pocetakDana = datum.atStartOfDay();
    long datumPocetak = pocetakDana.toEpochSecond(ZoneOffset.UTC);

    datum = LocalDate.parse(trenutniDatum, DateTimeFormatter.ofPattern("dd.MM.yyyy"));
    LocalDateTime krajDana = datum.plusDays(1).atStartOfDay();
    long datumKraj = krajDana.toEpochSecond(ZoneOffset.UTC);

    OSKlijentBP osk = new OSKlijentBP(korisnikOpenSky, lozinkaOpenSky);
    try {
      listaLetova = osk.getDepartures(icao, datumPocetak, datumKraj);
    } catch (NwtisRestIznimka e) {
      System.out.println("GREŠKA KLIJENTA");
      e.printStackTrace();
      return null;
    }
    if (listaLetova.isEmpty()) {
      System.out.println("Nisu pronađeni zapisi o letovima");
      return null;
    }
    return listaLetova;
  }

  private long datumUEpoch(String dan) throws ParseException {
    SimpleDateFormat formatter = new SimpleDateFormat("dd.MM.yyyy");
    Date datum = formatter.parse(dan);
    long epochTime = datum.getTime() / 1000;
    return epochTime;
  }

  private String provjeri() {
    int port = Integer.parseInt(konfig.dajPostavku("port"));
    String adresa = konfig.dajPostavku("adresa");
    String odgovor = "";

    try {
      Socket veza = new Socket(adresa, port);
      InputStreamReader isr =
          new InputStreamReader(veza.getInputStream(), Charset.forName("UTF-8"));
      OutputStreamWriter osw =
          new OutputStreamWriter(veza.getOutputStream(), Charset.forName("UTF-8"));
      {
        osw.write("STATUS");
        osw.flush();
        veza.shutdownOutput();
        StringBuilder odg = new StringBuilder();
        while (true) {
          int i = isr.read();
          if (i == -1) {
            break;
          }
          odg.append((char) i);
        }
        veza.shutdownInput();
        veza.close();

        odgovor = odg.toString();
      }
    } catch (UnknownHostException e) {
    } catch (IOException e) {
    }
    return odgovor;
  }
}
