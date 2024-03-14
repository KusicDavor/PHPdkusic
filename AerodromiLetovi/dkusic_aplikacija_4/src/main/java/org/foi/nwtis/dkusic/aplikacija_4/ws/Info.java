package org.foi.nwtis.dkusic.aplikacija_4.ws;

import java.io.IOException;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.time.Instant;
import java.time.LocalDateTime;
import java.time.ZoneId;
import java.time.format.DateTimeFormatter;
import java.util.HashSet;
import java.util.Set;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.naming.InitialContext;
import javax.sql.DataSource;
import jakarta.annotation.Resource;
import jakarta.websocket.CloseReason;
import jakarta.websocket.EndpointConfig;
import jakarta.websocket.OnClose;
import jakarta.websocket.OnError;
import jakarta.websocket.OnMessage;
import jakarta.websocket.OnOpen;
import jakarta.websocket.Session;
import jakarta.websocket.server.ServerEndpoint;

@ServerEndpoint("/info")
public class Info {

  @Resource(lookup = "java:app/jdbc/nwtis_bp")
  javax.sql.DataSource ds;
  private Set<Session> setSessiona = new HashSet<Session>();
  public static int brojAerodroma;
  
  public String dajMeteo() {
    InitialContext ctx;
    try {
      ctx = new InitialContext();
      ds = (DataSource) ctx.lookup("java:app/jdbc/nwtis_bp");
    } catch (Exception e) {
      e.printStackTrace();
    }

    long vrijemePosluzitelja = System.currentTimeMillis();
    LocalDateTime localDateTime =
        LocalDateTime.ofInstant(Instant.ofEpochMilli(vrijemePosluzitelja), ZoneId.systemDefault());
    DateTimeFormatter formater = DateTimeFormatter.ofPattern("dd.MM.yyyy HH:mm:ss");
    String vrijeme = localDateTime.format(formater);

    int brojAerodroma = vratiBrojPracenihAerodroma(ds);

    return "Vrijeme poslužitelja: " + vrijeme + " \n Trenutni broj korisnika: " + setSessiona.size()
        + " \n Ukupan broj aerodroma za koje se preuzimaju letovi: " + brojAerodroma;
  }

  public int vratiBrojPracenihAerodroma(DataSource ds2) {
    PreparedStatement pstmt = null;
    int brojAerodroma = 0;
    String query = "SELECT COUNT(*) AS broj from AERODROMI_LETOVI";
    try (var con = ds2.getConnection()) {
      pstmt = con.prepareStatement(query);
      ResultSet rs = pstmt.executeQuery();
      while (rs.next()) {
        brojAerodroma = rs.getInt("broj");
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
    return brojAerodroma;
  }
  
  public int vratiBrojKorisnika(DataSource ds2) {
    PreparedStatement pstmt = null;
    int brojKorisnika = 0;
    String query = "SELECT COUNT(*) AS broj from KORISNICI";
    try (var con = ds2.getConnection()) {
      pstmt = con.prepareStatement(query);
      ResultSet rs = pstmt.executeQuery();
      while (rs.next()) {
        brojKorisnika = rs.getInt("broj");
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
    return brojKorisnika;
  }

  @OnMessage
  public void primitak(Session sesija, String poruka) {
    System.out.println("Poruka: " + poruka + " - ID sesije: " + sesija.getId());
    if (poruka.equals("info")) {
      poruka = dajMeteo();
    }
    if (poruka.equals("registracija")) {
      poruka = registracija();
    }
    
    if (poruka.equals("dodaj")) {
      poruka = dodajAerodrom();
    }
    posaljiPoruku(poruka);
  }

  private String dodajAerodrom() {
    InitialContext ctx;
    try {
      ctx = new InitialContext();
      ds = (DataSource) ctx.lookup("java:app/jdbc/nwtis_bp");
    } catch (Exception e) {
      e.printStackTrace();
    }
    String poruka = "Ukupan broj upisanih aerodroma: " + vratiBrojPracenihAerodroma(ds);
    return poruka;
  }

  private String registracija() {
    String poruka = "Ukupan broj upisanih korisnika: " + vratiBrojKorisnika(ds);
    return poruka;
  }

  @OnOpen
  public void otvori(Session sesija, EndpointConfig konfig) {
    setSessiona.add(sesija);
    System.out.println("Otvorena sesija:" + sesija.getId());
  }

  @OnClose
  public void zatvori(Session sesija, CloseReason razlogZatvaranja) {
    setSessiona.remove(sesija);
    System.out.println("Ugašena sesija ID: " + sesija.getId() + " - Razlog gašenja sesije: "
        + razlogZatvaranja.getReasonPhrase());
  }

  @OnError
  public void greska(Session sesija, Throwable iznimka) {
    System.out.println("Sesija ID: " + sesija.getId() + " Tekst pogreške: " + iznimka.getMessage());
  }

  public void posaljiPoruku(String poruka) {
    for (Session session : setSessiona) {
      if (session.isOpen()) {
        try {
          session.getBasicRemote().sendText(poruka.toString());
          System.out.println("POSLANA PORUKA KROZ WEBSOCKET --------------- PORUKA: " + poruka);
        } catch (IOException e) {
          System.out.println("Pogreška kod slanja poruke. Sesija ID: " + session.getId());
        }
      }
    }
  }
}
