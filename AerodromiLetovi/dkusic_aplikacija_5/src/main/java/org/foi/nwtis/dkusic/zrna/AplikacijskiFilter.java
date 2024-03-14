package org.foi.nwtis.dkusic.zrna;

import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.Socket;
import java.net.SocketException;
import java.net.URI;
import java.net.http.HttpClient;
import java.net.http.HttpRequest;
import java.net.http.HttpResponse.BodyHandlers;
import java.nio.charset.Charset;
import org.foi.nwtis.Konfiguracija;
import org.foi.nwtis.dkusic.aplikacija_5.podaci.OdgovorPosluzitelja;
import org.foi.nwtis.dkusic.aplikacija_5.podaci.Zapis;
import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
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
@ApplicationPath("mvc")
public class AplikacijskiFilter extends Application implements Filter {
  @Inject
  ServletContext context;

  @Override
  public void init(FilterConfig filterConfig) throws ServletException {}

  @Override
  public void doFilter(ServletRequest request, ServletResponse response, FilterChain chain)
      throws IOException, ServletException {

    HttpServletRequest httpRequest = (HttpServletRequest) request;
    StringBuffer requestURL = httpRequest.getRequestURL();

    while (provjeri().getStatus() == 400) {
      System.out.println("POSLUŽITELJ NIJE U STANJU AKTIVNOSTI");
      provjeri();
    }
    posaljiZahtjev(request);
    chain.doFilter(request, response);
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

  public void posaljiZahtjev(ServletRequest request) throws IOException {
    HttpClient client = HttpClient.newHttpClient();
    URI uri = URI.create("http://200.20.0.4:8080/dkusic_aplikacija_2/api/dnevnik");

    HttpServletRequest httpRequest = (HttpServletRequest) request;
    StringBuffer requestURL = httpRequest.getRequestURL();

    String vrsta = "AP5";
    int indeksOdIzbornik = requestURL.toString().indexOf("aplikacija_5/");
    String zahtjev = requestURL.toString().substring(indeksOdIzbornik + 13);

    if (zahtjev.isEmpty()) {
      zahtjev = "izbornik";
    }
    Zapis z = new Zapis();
    z.setVrsta(vrsta);
    z.setZahtjev(zahtjev);
    Gson gson = new GsonBuilder().create();
    String jsonZapis = gson.toJson(z);
    HttpRequest request1 =
        HttpRequest.newBuilder().uri(uri).header("Content-Type", "application/json")
            .POST(HttpRequest.BodyPublishers.ofString(jsonZapis)).build();

    try {
      client.send(request1, BodyHandlers.ofString());
    } catch (Exception e) {
      e.printStackTrace();
    }
  }
}
