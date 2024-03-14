package org.foi.nwtis.dkusic.aplikacija_2.rest;

import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.Socket;
import java.net.SocketException;
import java.nio.charset.Charset;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.regex.Matcher;
import java.util.regex.Pattern;
import org.foi.nwtis.Konfiguracija;
import org.foi.nwtis.dkusic.aplikacija_2.podaci.OdgovorPosluzitelja;
import com.google.gson.Gson;
import jakarta.annotation.Resource;
import jakarta.inject.Inject;
import jakarta.servlet.Filter;
import jakarta.servlet.FilterChain;
import jakarta.servlet.FilterConfig;
import jakarta.servlet.ServletContext;
import jakarta.servlet.ServletException;
import jakarta.servlet.ServletRequest;
import jakarta.servlet.ServletResponse;
import jakarta.servlet.annotation.WebFilter;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.ws.rs.ApplicationPath;
import jakarta.ws.rs.core.Application;
import jakarta.ws.rs.core.Response;
import jakarta.ws.rs.core.Response.Status;

/**
 * Klasa za definiranje putanje REST servisa
 * 
 */
@WebFilter("/*")
@ApplicationPath("api")
public class RestServis extends Application implements Filter {
  @Resource(lookup = "java:app/jdbc/nwtis_bp")
  javax.sql.DataSource ds;
  @Inject
  ServletContext context;

  @Override
  public void init(FilterConfig filterConfig) throws ServletException {}

  @Override
  public void doFilter(ServletRequest request, ServletResponse response, FilterChain chain)
      throws IOException, ServletException {

    HttpServletRequest httpRequest = (HttpServletRequest) request;
    StringBuffer requestURL = httpRequest.getRequestURL();
    String zahtjev = "";

    chain.doFilter(request, response);

    if (provjeri().getStatus() == 400) {
      return;
    } else {

      String vrsta = "";
      if (requestURL.toString().contains("aplikacija_2")) {
        vrsta = "AP2";
      }

      String regex1 = ".*\\/nadzor\\/(.*)";
      String regex2 = ".*\\/aerodromi\\/(.*)";
      String regex3 = ".*\\/api\\/(.*)";

      String r1 = odvojiNaredbu(requestURL.toString(), regex1);
      String r2 = odvojiNaredbu(requestURL.toString(), regex2);
      String r3 = odvojiNaredbu(requestURL.toString(), regex3);

      if (r3.isEmpty()) {
        if (r2.isEmpty()) {
          zahtjev = r1;
        } else {
          zahtjev = r2;
        }
      } else {
        zahtjev = r3;
      }


      PreparedStatement pstmt = null;
      String query = "INSERT INTO DNEVNIK (VRSTA, ZAHTJEV) VALUES (?, ?)";
      try (var con = ds.getConnection()) {
        pstmt = con.prepareStatement(query);
        pstmt.setString(1, vrsta);
        pstmt.setString(2, zahtjev);
        pstmt.executeUpdate();
        pstmt.close();
        con.close();
      } catch (SQLException e) {
        e.printStackTrace();
      }
    }
  }

  private static String odvojiNaredbu(String url, String regex) {
    Pattern pattern = Pattern.compile(regex);
    Matcher matcher = pattern.matcher(url);
    if (matcher.find()) {
      return matcher.group(1);
    }
    return null;
  }

  private Response provjeri() {
    Response odgovor = Response.status(Status.OK.getStatusCode()).build();
    Konfiguracija konfig = (Konfiguracija) context.getAttribute("konfig");
    String status = saljiNaredbu(konfig, "STATUS");
    OdgovorPosluzitelja op = new OdgovorPosluzitelja();
    var gson = new Gson();

    if (status.isEmpty()) {
      op.status = Status.BAD_REQUEST.getStatusCode();
      op.opis = "POSLUŽITELJ NIJE POKRENUT";
      var jsonOdgovorPosluzitelja = gson.toJson(op);
      odgovor = Response.status(Status.BAD_REQUEST.getStatusCode()).entity(jsonOdgovorPosluzitelja)
          .build();
      return odgovor;
    } else if (status.contains("0")) {
      op.status = Status.BAD_REQUEST.getStatusCode();
      op.opis = "POSLUŽITELJ PAUZIRA";
      var jsonOdgovorPosluzitelja = gson.toJson(op);
      odgovor = Response.status(Status.BAD_REQUEST.getStatusCode()).entity(jsonOdgovorPosluzitelja)
          .build();
      return odgovor;
    }
    return odgovor;
  }

  public String saljiNaredbu(Konfiguracija konfig, String naredba1) {
    int port = Integer.parseInt(konfig.dajPostavku("port"));
    String adresa = (String) konfig.dajPostavku("adresa");
    String naredba = naredba1;
    StringBuilder odg = new StringBuilder();
    try (Socket veza = new Socket(adresa, port);
        InputStreamReader isr =
            new InputStreamReader(veza.getInputStream(), Charset.forName("UTF-8"));
        OutputStreamWriter osw =
            new OutputStreamWriter(veza.getOutputStream(), Charset.forName("UTF-8"));) {
      osw.write(naredba);
      osw.flush();
      veza.shutdownOutput();

      while (true) {
        int i = isr.read();
        if (i == -1) {
          break;
        }
        odg.append((char) i);
      }
      veza.shutdownInput();
      veza.close();
      return odg.toString();
    } catch (SocketException e) {
    } catch (IOException ex) {
    }
    return odg.toString();
  }
}
