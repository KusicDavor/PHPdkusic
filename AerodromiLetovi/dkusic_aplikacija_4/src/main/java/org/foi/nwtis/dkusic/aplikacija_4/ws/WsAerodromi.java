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
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import org.foi.nwtis.PostavkeBazaPodataka;
import org.foi.nwtis.dkusic.aplikacija_4.zrna.AirportFacade;
import org.foi.nwtis.dkusic.aplikacija_4.zrna.Autentikacija;
import org.foi.nwtis.dkusic.aplikacija_4.zrna.PogresnaAutentikacija;
import org.foi.nwtis.dkusic.aplikacija_4.zrna.Slusac;
import org.foi.nwtis.podaci.Aerodrom;
import org.foi.nwtis.rest.podaci.Lokacija;
import jakarta.annotation.Resource;
import jakarta.inject.Inject;
import jakarta.jws.WebMethod;
import jakarta.jws.WebParam;
import jakarta.jws.WebService;
import jakarta.persistence.EntityManager;
import jakarta.persistence.PersistenceContext;
import jakarta.ws.rs.core.Response;

@WebService(serviceName = "aerodromi")
public class WsAerodromi {
  @Resource(lookup = "java:app/jdbc/nwtis_bp")
  javax.sql.DataSource ds;

  @PersistenceContext(unitName = "nwtis_projekt_pu")
  private EntityManager em;

  public static PostavkeBazaPodataka konfig = Slusac.getkonfDB();
  Autentikacija autentikacija = new Autentikacija();

  @Inject
  AirportFacade airportFacade;

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

  @WebMethod
  public List<Aerodrom> dajAerodromeZaLetove(@WebParam(name = "korisnik") String korisnik,
      @WebParam(name = "lozinka") String lozinka) {
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

    PreparedStatement pstmt = null;
    List<Aerodrom> listaAerodroma = new ArrayList<Aerodrom>();
    String query =
        "SELECT * FROM AIRPORTS a, AERODROMI_LETOVI al WHERE a.ICAO = al.ICAO";
    try (var con = ds.getConnection()) {
      pstmt = con.prepareStatement(query);
      ResultSet rs = pstmt.executeQuery();
      while (rs.next()) {
        Aerodrom aerodrom = new Aerodrom();
        aerodrom.setNaziv(rs.getString("NAME"));
        aerodrom.setIcao(rs.getString("ICAO"));
        aerodrom.setDrzava(rs.getString("ISO_COUNTRY"));
        String[] koordinate = rs.getString("COORDINATES").split(",");
        Lokacija lokacija = new Lokacija();
        lokacija.postavi(koordinate[0], koordinate[1]);
        aerodrom.setLokacija(lokacija);
        listaAerodroma.add(aerodrom);
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
    return listaAerodroma;
  }

  @WebMethod
  public List<String> vratiStatuse() {
    List<String> lista = new ArrayList<String>();
    PreparedStatement pstmt = null;
    String query = "SELECT * FROM AERODROMI_LETOVI al";
    try (var con = ds.getConnection()) {
      pstmt = con.prepareStatement(query);
      ResultSet rs = pstmt.executeQuery();
      while (rs.next()) {
        String icao = rs.getString("ICAO");
        String status = rs.getString("STATUS");
        String finalni = icao + " " + status;
        lista.add(finalni);
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
    return lista;
  }

  @WebMethod
  public boolean dodajAerodromZaLetove(@WebParam(name = "korisnik") String korisnik,
      @WebParam(name = "lozinka") String lozinka, @WebParam(name = "icao") String icao) {
    String odgovor = provjeri();
    if (odgovor.isEmpty()) {
      System.out.println("POSLUŽITELJ NIJE AKTIVAN");
      return false;
    } else if (odgovor.contains("OK 0")) {
      System.out.println("POSLUŽITELJ PAUZIRA");
      return false;
    }

    try {
      autentikacija.autentikacija(korisnik, lozinka);
    } catch (PogresnaAutentikacija pa) {
      System.out.println(pa.getMessage());
      return false;
    }
    int rezultat = 0;
    String status = "Da";
    PreparedStatement pstmt = null;
    String query = "INSERT INTO AERODROMI_LETOVI VALUES ?,?;";
    try (var con = ds.getConnection()) {
      pstmt = con.prepareStatement(query);
      pstmt.setString(1, icao);
      pstmt.setString(2, status);
      rezultat = pstmt.executeUpdate();

      if (rezultat == 1) {
        return true;
      }
    } catch (Exception ex) {
    }
    return false;
  }

  @WebMethod
  public boolean pauzirajAerodromZaLetove(@WebParam(name = "korisnik") String korisnik,
      @WebParam(name = "lozinka") String lozinka, @WebParam(name = "icao") String icao) {
    String odgovor = provjeri();
    if (odgovor.isEmpty()) {
      System.out.println("POSLUŽITELJ NIJE AKTIVAN");
      return false;
    } else if (odgovor.contains("OK 0")) {
      System.out.println("POSLUŽITELJ PAUZIRA");
      return false;
    }

    try {
      autentikacija.autentikacija(korisnik, lozinka);
    } catch (PogresnaAutentikacija pa) {
      System.out.println(pa.getMessage());
      return false;
    }

    int rezultat = 0;
    String status = "Pauza";
    PreparedStatement pstmt = null;
    String query = "UPDATE AERODROMI_LETOVI SET STATUS = ? WHERE ICAO = ?;";
    try (var con = ds.getConnection()) {
      pstmt = con.prepareStatement(query);
      pstmt.setString(1, status);
      pstmt.setString(2, icao);
      rezultat = pstmt.executeUpdate();
      if (rezultat == 1) {
        return true;
      }
    } catch (Exception ex) {
    }
    System.out.println("Nepoznati ICAO aerodroma");
    return false;
  }

  @WebMethod
  public boolean aktivirajAerodromZaLetove(@WebParam(name = "korisnik") String korisnik,
      @WebParam(name = "lozinka") String lozinka, @WebParam(name = "icao") String icao) {
    String odgovor = provjeri();
    if (odgovor.isEmpty()) {
      System.out.println("POSLUŽITELJ NIJE AKTIVAN");
      return false;
    } else if (odgovor.contains("OK 0")) {
      System.out.println("POSLUŽITELJ PAUZIRA");
      return false;
    }

    try {
      autentikacija.autentikacija(korisnik, lozinka);
    } catch (PogresnaAutentikacija pa) {
      System.out.println(pa.getMessage());
      return false;
    }

    int rezultat = 0;
    String status = "Da";
    PreparedStatement pstmt = null;
    String query = "UPDATE AERODROMI_LETOVI SET STATUS = ? WHERE ICAO = ?;";
    try (var con = ds.getConnection()) {
      pstmt = con.prepareStatement(query);
      pstmt.setString(1, status);
      pstmt.setString(2, icao);
      rezultat = pstmt.executeUpdate();
      if (rezultat == 1) {
        return true;
      }
    } catch (Exception ex) {
    }
    System.out.println("Nepoznati ICAO aerodroma");
    return false;
  }
}
