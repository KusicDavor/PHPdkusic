package org.foi.nwtis.dkusic.aplikacija_3.dretva;

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
import javax.naming.InitialContext;
import javax.sql.DataSource;
import org.foi.nwtis.Konfiguracija;
import org.foi.nwtis.dkusic.aplikacija_3.zrna.JmsPosiljatelj;
import org.foi.nwtis.rest.klijenti.NwtisRestIznimka;
import org.foi.nwtis.rest.klijenti.OSKlijentBP;
import org.foi.nwtis.rest.podaci.LetAviona;
import jakarta.annotation.Resource;

public class SakupljacLetovaAviona extends Thread {
  @Resource(lookup = "java:app/jdbc/nwtis_bp")
  javax.sql.DataSource ds;

  private Konfiguracija konfig;
  private JmsPosiljatelj jmsPosiljatelj;
  private long trajanjeCiklusa;
  private String korisnikUsername;
  private String lozinka;
  private String datumOd;
  private String datumDo;
  private String[] aerodromi;
  private boolean ugasi = false;

  public SakupljacLetovaAviona(Konfiguracija konfig1, JmsPosiljatelj jmsPosiljatelj) {
    this.jmsPosiljatelj = jmsPosiljatelj;
    this.konfig = konfig1;
    this.datumOd = konfig.dajPostavku("preuzimanje.od");
    this.datumDo = konfig.dajPostavku("preuzimanje.do");
    long trajanje = Long.parseLong(konfig.dajPostavku("ciklus.trajanje")) * 1000;
    this.trajanjeCiklusa = trajanje;
    String korisnik = konfig.dajPostavku("OpenSkyNetwork.korisnik");
    String lozinka = konfig.dajPostavku("OpenSkyNetwork.lozinka");
    this.korisnikUsername = korisnik;
    this.lozinka = lozinka;
  }

  @Override
  public synchronized void start() {
    InitialContext ctx;
    try {
      ctx = new InitialContext();
      ds = (DataSource) ctx.lookup("java:app/jdbc/nwtis_bp");
    } catch (Exception e) {
      e.printStackTrace();
    }
    this.aerodromi = vratiPopisAerodroma().split(" ");
    super.start();
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

  @Override
  public void run() {
    String odgovor = provjeri();
    while (!odgovor.equals("OK 1")) {
      System.out.println("POSLUŽITELJ NIJE AKTIVAN");
      odgovor = provjeri();
    }
    System.out.println("POSLUŽITELJ AKTIVAN. POKREĆEM APLIKACIJU");
    List<LetAviona> listaLetova = new ArrayList<LetAviona>();
    int brojLetova = 0;
    String datum = vratiZadnjiDatum();

    long dretvaStart = System.currentTimeMillis();
    while (!ugasi && !zadnjiDatum(datum)) {
      brojLetova = 0;
      for (String aerodrom : aerodromi) {
        listaLetova = odradiDan(aerodrom, datum);
       
        System.out.println("BROJ LETOVA: --------- " + listaLetova.size()
            + " ---------- datum: ---------- " + datum
            + " --------- aerodrom: ------- " + aerodrom);

        if (listaLetova != null) {
          brojLetova +=
              listaLetova.stream().filter(let -> let.getEstArrivalAirport() != null).count();
        }

        spremiLet(listaLetova);
      }

      long spavaj = System.currentTimeMillis() - dretvaStart;
      saljePoruku(datum, brojLetova);
      spavanje(spavaj);
      datum = vratiSljedeciDan(datum);
    }

    if (zadnjiDatum(datum)) {
      System.out.println("POSLJEDNJI DATUM U BAZI JE JEDNAK DATUMU IZ POSTAVKE PREUZIMANJE.DO");
      interrupt();
    }
  }

  private void spremiLet(List<LetAviona> letovi) {
    PreparedStatement pstmt = null;
    String upit =
        "INSERT INTO LETOVI_POLASCI (ICAO24, FIRSTSEEN, ESTDEPARTUREAIRPORT, LASTSEEN, ESTARRIVALAIRPORT, CALLSIGN, ESTDEPARTUREAIRPORTHORIZDISTANCE, ESTDEPARTUREAIRPORTVERTDISTANCE, ESTARRIVALAIRPORTHORIZDISTANCE, ESTARRIVALAIRPORTVERTDISTANCE, DEPARTUREAIRPORTCANDIDATESCOUNT, ARRIVALAIRPORTCANDIDATESCOUNT, STORED) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP)";
    try (var con = ds.getConnection()) {
      pstmt = con.prepareStatement(upit);
      for (LetAviona let : letovi) {
        if (let.getEstArrivalAirport() != null) {
          pstmt.setString(1, let.getIcao24());
          pstmt.setLong(2, let.getFirstSeen());
          pstmt.setString(3, let.getEstDepartureAirport());
          pstmt.setLong(4, let.getLastSeen());
          pstmt.setString(5, let.getEstArrivalAirport());
          pstmt.setString(6, let.getCallsign());
          pstmt.setInt(7, let.getEstDepartureAirportHorizDistance());
          pstmt.setInt(8, let.getEstDepartureAirportVertDistance());
          pstmt.setInt(9, let.getEstArrivalAirportHorizDistance());
          pstmt.setInt(10, let.getEstArrivalAirportVertDistance());
          pstmt.setInt(11, let.getDepartureAirportCandidatesCount());
          pstmt.setInt(12, let.getArrivalAirportCandidatesCount());
          pstmt.addBatch();

        }
      }
      pstmt.executeBatch();
    } catch (SQLException e) {
      Logger.getGlobal().log(Level.SEVERE, e.getMessage());
    }
  }

  private void saljePoruku(String datum, int brojLetova) {
    String poruka = "Na dan " + datum + " preuzeto ukupno " + brojLetova + " letova aviona.";
    jmsPosiljatelj.posaljiPoruku(poruka);
  }

  private List<LetAviona> odradiDan(String aerodrom, String trenutniDatum) {    
    List<LetAviona> listaLetova = new ArrayList<LetAviona>();

    LocalDate datum = LocalDate.parse(trenutniDatum, DateTimeFormatter.ofPattern("dd.MM.yyyy"));
    LocalDateTime pocetakDana = datum.atStartOfDay();
    long datumPocetak = pocetakDana.toEpochSecond(ZoneOffset.UTC);

    datum = LocalDate.parse(trenutniDatum, DateTimeFormatter.ofPattern("dd.MM.yyyy"));
    LocalDateTime krajDana = datum.plusDays(1).atStartOfDay();
    long datumKraj = krajDana.toEpochSecond(ZoneOffset.UTC);

    OSKlijentBP osk = new OSKlijentBP(korisnikUsername, lozinka);
    try {
      listaLetova = osk.getDepartures(aerodrom, datumPocetak, datumKraj);     
    } catch (NwtisRestIznimka e) {
      System.out.println("GREŠKA KLIJENTA");
      e.printStackTrace();
      return null;
    }

    return listaLetova;
  }

  private String vratiZadnjiDatum() {
    String zadnjiDatum = posljednjiDatumUBazi();
    if (zadnjiDatum == null) {
      return datumOd;
    }
    Date parsiraniZadnjiDatum = null;
    Date parsiraniDatumOd = null;

    SimpleDateFormat formatDatuma = new SimpleDateFormat("dd.MM.yyyy");
    try {
      parsiraniDatumOd = formatDatuma.parse(datumOd);
      parsiraniZadnjiDatum = formatDatuma.parse(zadnjiDatum);

    } catch (ParseException e) {
      e.printStackTrace();
    }

    int rezultatUsporedbe = parsiraniZadnjiDatum.compareTo(parsiraniDatumOd);

    if (rezultatUsporedbe == 0) {
      return vratiSljedeciDan(formatDatuma.format(parsiraniZadnjiDatum));
    }

    if (rezultatUsporedbe < 0) {
      return datumOd;
    }

    if (rezultatUsporedbe > 0) {
      return vratiSljedeciDan(zadnjiDatum);
    }

    return zadnjiDatum;
  }

  public long vratiZadnjiZapis() {
    String zadnjiDan = "";
    PreparedStatement pstmt = null;
    String query = "select FIRSTSEEN from LETOVI_POLASCI ORDER BY ID DESC LIMIT 1";
    try (var con = ds.getConnection()) {
      pstmt = con.prepareStatement(query);
      ResultSet rs = pstmt.executeQuery();
      while (rs.next()) {
        zadnjiDan = rs.getString("FIRSTSEEN");
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
    if (zadnjiDan.isEmpty()) {
      return 0;
    } else {
      return Long.parseLong(zadnjiDan);
    }
  }

  public String vratiPopisAerodroma() {
    String popis = "";
    String status = "Da";
    PreparedStatement pstmt = null;
    String query = "SELECT * from AERODROMI_LETOVI WHERE STATUS = ?";
    try (var con = ds.getConnection()) {
      pstmt = con.prepareStatement(query);
      pstmt.setString(1, status);
      ResultSet rs = pstmt.executeQuery();
      while (rs.next()) {
        popis += rs.getString("ICAO");
        popis += " ";
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
    return popis;
  }

  private String posljednjiDatumUBazi() {
    long zadnjiZapis = vratiZadnjiZapis();

    if (zadnjiZapis == 0) {
      return null;
    }

    Date date = new Date(zadnjiZapis * 1000);
    SimpleDateFormat formatter = new SimpleDateFormat("dd.MM.yyyy");
    return formatter.format(date);
  }

  private String vratiSljedeciDan(String dan) {
    DateTimeFormatter f = DateTimeFormatter.ofPattern("dd.MM.yyyy");
    LocalDate trenutniDan = LocalDate.parse(dan, f);
    LocalDate sljedeciDan = trenutniDan.plusDays(1);
    return sljedeciDan.format(f);
  }

  private boolean zadnjiDatum(String datum) {
    Date trenutniDatumDate = null;
    Date datumDoDate = null;
    SimpleDateFormat dateFormat = new SimpleDateFormat("dd.MM.yyyy");
    try {
      trenutniDatumDate = dateFormat.parse(datum);
      datumDoDate = dateFormat.parse(datumDo);
    } catch (ParseException e) {
      e.printStackTrace();
    }
    if (trenutniDatumDate.after(datumDoDate)) {
      return true;
    }
    return false;
  }

  private void spavanje(long trajanje) {
    try {
      long trajanjeSpavanjaDretve = trajanjeCiklusa - (trajanje % trajanjeCiklusa);
      if (trajanjeSpavanjaDretve < 0) {
        trajanjeSpavanjaDretve = 0;
      }
      Thread.sleep(trajanjeSpavanjaDretve);

    } catch (InterruptedException e) {
      e.printStackTrace();
    }
  }

  @Override
  public void interrupt() {
    this.ugasi = true;
    super.interrupt();
  }
}
