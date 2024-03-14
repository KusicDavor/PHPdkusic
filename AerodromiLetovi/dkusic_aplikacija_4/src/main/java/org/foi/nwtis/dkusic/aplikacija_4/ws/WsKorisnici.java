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
import org.foi.nwtis.dkusic.aplikacija_4.zrna.Autentikacija;
import org.foi.nwtis.dkusic.aplikacija_4.zrna.PogresnaAutentikacija;
import org.foi.nwtis.dkusic.aplikacija_4.zrna.Slusac;
import org.foi.nwtis.podaci.Korisnik;
import jakarta.annotation.Resource;
import jakarta.jws.WebMethod;
import jakarta.jws.WebParam;
import jakarta.jws.WebService;
import jakarta.ws.rs.DefaultValue;
import jakarta.ws.rs.HeaderParam;

@WebService(serviceName = "korisnici")
public class WsKorisnici {
  @Resource(lookup = "java:app/jdbc/nwtis_bp")
  javax.sql.DataSource ds;

  public static PostavkeBazaPodataka konfig = Slusac.getkonfDB();
  Autentikacija autentikacija = new Autentikacija();

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
  public boolean dodajKorisnika(@HeaderParam("korisnik") Korisnik korisnik) {
    String odgovor = provjeri();
    if (odgovor.isEmpty()) {
      System.out.println("POSLUŽITELJ NIJE AKTIVAN");
      return false;
    } else if (odgovor.contains("OK 0")) {
      System.out.println("POSLUŽITELJ PAUZIRA");
      return false;
    }

    int rezultat = 0;
    PreparedStatement pstmt = null;
    String query = "INSERT INTO KORISNICI VALUES ?,?,?,?,?;";
    try (var con = ds.getConnection()) {
      pstmt = con.prepareStatement(query);
      pstmt.setString(1, korisnik.getKorIme());
      pstmt.setString(2, korisnik.getIme());
      pstmt.setString(3, korisnik.getPrezime());
      pstmt.setString(4, korisnik.getLozinka());
      pstmt.setString(5, korisnik.getEmail());
      rezultat = pstmt.executeUpdate();
      if (rezultat == 1) {
        return true;
      }
    } catch (Exception ex) {
    }
    return false;
  }

  public int brojKorisnika() {
    String odgovor = provjeri();
    if (odgovor.isEmpty()) {
      System.out.println("POSLUŽITELJ NIJE AKTIVAN");
      return -1;
    } else if (odgovor.contains("OK 0")) {
      System.out.println("POSLUŽITELJ PAUZIRA");
      return -1;
    }

    int brojKorisnika = 0;
    PreparedStatement pstmt = null;
    String query = "SELECT COUNT(*) AS broj FROM KORISNICI;";
    try (var con = ds.getConnection()) {
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

  @WebMethod
  public List<Korisnik> dajKorisnike(@WebParam(name = "korisnik") String korisnik,
      @WebParam(name = "lozinka") String lozinka,
      @WebParam(name = "traziImeKorisnika") @DefaultValue("") String traziImeKorisnika,
      @WebParam(name = "traziPrezimeKorisnika") @DefaultValue("") String traziPrezimeKorisnika)
      throws PogresnaAutentikacija {
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

    List<Korisnik> listaKorisnika = new ArrayList<Korisnik>();
    PreparedStatement pstmt = null;
    String query =
        "SELECT * FROM KORISNICI WHERE (IME LIKE '%' || ? || '%' OR ? IS NULL) AND (PREZIME LIKE '%' || ? || '%' OR ? IS NULL)";
    try (var con = ds.getConnection()) {
      pstmt = con.prepareStatement(query);
      pstmt.setString(1, traziImeKorisnika);
      pstmt.setString(2, traziImeKorisnika);
      pstmt.setString(3, traziPrezimeKorisnika);
      pstmt.setString(4, traziPrezimeKorisnika);
      ResultSet rs = pstmt.executeQuery();
      while (rs.next()) {
        Korisnik k = new Korisnik();
        k.setKorIme(rs.getString("KORIME"));
        k.setIme(rs.getString("IME"));
        k.setPrezime(rs.getString("PREZIME"));
        k.setLozinka(rs.getString("LOZINKA"));
        k.setEmail(rs.getString("EMAIL"));
        listaKorisnika.add(k);
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
    return listaKorisnika;
  }

  @WebMethod
  public Korisnik dajKorisnika(@WebParam(name = "korisnik") String korisnik,
      @WebParam(name = "lozinka") String lozinka,
      @WebParam(name = "traziKorisnika") String traziKorisnika) throws PogresnaAutentikacija {
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

    Korisnik vraceni = new Korisnik();
    PreparedStatement pstmt = null;
    String query = "SELECT * FROM KORISNICI WHERE KORIME = ?;";
    try (var con = ds.getConnection()) {
      pstmt = con.prepareStatement(query);
      pstmt.setString(1, traziKorisnika);
      ResultSet rs = pstmt.executeQuery();
      while (rs.next()) {
        vraceni.setKorIme(rs.getString("KORIME"));
        vraceni.setIme(rs.getString("IME"));
        vraceni.setPrezime(rs.getString("PREZIME"));
        vraceni.setLozinka(rs.getString("LOZINKA"));
        vraceni.setEmail(rs.getString("EMAIL"));
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
    return vraceni;
  }
}
