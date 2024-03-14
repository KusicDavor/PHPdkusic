package org.foi.nwtis.dkusic.aplikacija_4.zrna;

import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.naming.InitialContext;
import javax.sql.DataSource;
import org.foi.nwtis.PostavkeBazaPodataka;
import jakarta.annotation.Resource;

public class Autentikacija {
  @Resource(lookup = "java:app/jdbc/nwtis_bp")
  javax.sql.DataSource ds;
  public static PostavkeBazaPodataka konfig = Slusac.getkonfDB();

  public Autentikacija() {
    InitialContext ctx;
    try {
      ctx = new InitialContext();
      ds = (DataSource) ctx.lookup("java:app/jdbc/nwtis_bp");
    } catch (Exception e) {
      e.printStackTrace();
    }
  }

  public void autentikacija(String korisnik, String lozinka) throws PogresnaAutentikacija {
    String postoji = "";
    String query = "SELECT * FROM KORISNICI WHERE KORIME = ? AND LOZINKA = ?;";
    PreparedStatement pstmt = null;
    try (var con = ds.getConnection()) {
      pstmt = con.prepareStatement(query);
      pstmt.setString(1, korisnik);
      pstmt.setString(2, lozinka);
      ResultSet rs = pstmt.executeQuery();
      while (rs.next()) {
        postoji = rs.getString("KORIME");
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
    if (postoji.isEmpty()) {
      throw new PogresnaAutentikacija("Neuspješna autentikacija");
    }
  }
}
