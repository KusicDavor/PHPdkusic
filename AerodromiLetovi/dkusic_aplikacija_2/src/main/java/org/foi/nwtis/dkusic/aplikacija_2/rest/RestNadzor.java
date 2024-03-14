package org.foi.nwtis.dkusic.aplikacija_2.rest;

import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.Socket;
import java.net.SocketException;
import java.nio.charset.Charset;
import org.foi.nwtis.Konfiguracija;
import org.foi.nwtis.dkusic.aplikacija_2.podaci.OdgovorPosluzitelja;
import com.google.gson.Gson;
import jakarta.inject.Inject;
import jakarta.servlet.ServletContext;
import jakarta.ws.rs.GET;
import jakarta.ws.rs.Path;
import jakarta.ws.rs.PathParam;
import jakarta.ws.rs.Produces;
import jakarta.ws.rs.core.Application;
import jakarta.ws.rs.core.MediaType;
import jakarta.ws.rs.core.Response;
import jakarta.ws.rs.core.Response.Status;


@Path("nadzor")
public class RestNadzor extends Application {

  @Inject
  ServletContext context;

  @GET
  @Produces({MediaType.APPLICATION_JSON})
  public Response status() {
    Response odgovor = null;
    Konfiguracija konfig = (Konfiguracija) context.getAttribute("konfig");
    int port = Integer.parseInt(konfig.dajPostavku("port"));
    String adresa = (String) konfig.dajPostavku("adresa");
    String naredba = "STATUS";
    String odgovorPosluzitelja = saljiNaredbu(adresa, port, naredba);
    OdgovorPosluzitelja op = new OdgovorPosluzitelja();
    var gson = new Gson();

    if (odgovorPosluzitelja.contains("OK")) {
      op.status = Status.OK.getStatusCode();
      op.opis = odgovorPosluzitelja;
      var jsonOdgovorPosluzitelja = gson.toJson(op);
      odgovor = Response.status(Status.OK.getStatusCode()).entity(jsonOdgovorPosluzitelja).build();
    } else if (odgovorPosluzitelja.isBlank()) {
      op.status = Status.BAD_REQUEST.getStatusCode();
      op.opis = "POSLUŽITELJ NIJE POKRENUT";
      var jsonOdgovorPosluzitelja = gson.toJson(op);
      odgovor = Response.status(Status.OK.getStatusCode()).entity(jsonOdgovorPosluzitelja)
          .build();
    } else {
      op.status = Status.BAD_REQUEST.getStatusCode();
      op.opis = odgovorPosluzitelja;
      var jsonOdgovorPosluzitelja = gson.toJson(op);
      odgovor = Response.status(Status.OK.getStatusCode()).entity(jsonOdgovorPosluzitelja)
          .build();
    }
    return odgovor;
  }

  @GET
  @Produces({MediaType.APPLICATION_JSON})
  @Path("{komanda}")
  public Response komanda(@PathParam("komanda") String komanda) {
    Response odgovor = null;
    Konfiguracija konfig = (Konfiguracija) context.getAttribute("konfig");
    int port = Integer.parseInt(konfig.dajPostavku("port"));
    String adresa = (String) konfig.dajPostavku("adresa");
    String odgovorPosluzitelja = saljiNaredbu(adresa, port, komanda);
    OdgovorPosluzitelja op = new OdgovorPosluzitelja();
    var gson = new Gson();

    if (odgovorPosluzitelja.contains("OK")) {
      op.status = Status.OK.getStatusCode();
      op.opis = odgovorPosluzitelja;
      var jsonOdgovorPosluzitelja = gson.toJson(op);
      odgovor = Response.status(Status.OK.getStatusCode()).entity(jsonOdgovorPosluzitelja)
          .build();
    } else if (odgovorPosluzitelja.contains("ERROR")) {
      op.status = Status.BAD_REQUEST.getStatusCode();
      op.opis = odgovorPosluzitelja;
      var jsonOdgovorPosluzitelja = gson.toJson(op);
      odgovor = Response.status(Status.OK.getStatusCode()).entity(jsonOdgovorPosluzitelja).build();
    } else if (odgovorPosluzitelja.isBlank()) {
      op.status = Status.BAD_REQUEST.getStatusCode();
      op.opis = "POSLUŽITELJ NIJE POKRENUT";
      var jsonOdgovorPosluzitelja = gson.toJson(op);
      odgovor = Response.status(Status.OK.getStatusCode()).entity(jsonOdgovorPosluzitelja)
          .build();
    }
    return odgovor;
  }

  @GET
  @Produces({MediaType.APPLICATION_JSON})
  @Path("INFO/{vrsta}")
  public Response info(@PathParam("vrsta") String vrsta) {
    Response odgovor = null;
    Konfiguracija konfig = (Konfiguracija) context.getAttribute("konfig");
    int port = Integer.parseInt(konfig.dajPostavku("port"));
    String adresa = (String) konfig.dajPostavku("adresa");
    String naredba = "INFO " + vrsta;
    String odgovorPosluzitelja = saljiNaredbu(adresa, port, naredba);
    OdgovorPosluzitelja op = new OdgovorPosluzitelja();
    var gson = new Gson();
    
    if (odgovorPosluzitelja.contains("OK")) {
      op.status = Status.OK.getStatusCode();
      op.opis = odgovorPosluzitelja;
      var jsonOdgovorPosluzitelja = gson.toJson(op);
      odgovor = Response.status(Status.OK.getStatusCode()).entity(jsonOdgovorPosluzitelja)
          .build();
    } else if (odgovorPosluzitelja.contains("ERROR")) {
      op.status = Status.BAD_REQUEST.getStatusCode();
      op.opis = odgovorPosluzitelja;
      var jsonOdgovorPosluzitelja = gson.toJson(op);
      odgovor = Response.status(Status.OK.getStatusCode()).entity(jsonOdgovorPosluzitelja).build();
    } else if (odgovorPosluzitelja.isBlank()) {
      op.status = Status.BAD_REQUEST.getStatusCode();
      op.opis = "POSLUŽITELJ NIJE POKRENUT";
      var jsonOdgovorPosluzitelja = gson.toJson(op);
      odgovor = Response.status(Status.OK.getStatusCode()).entity(jsonOdgovorPosluzitelja)
          .build();
    }
    return odgovor;
  }

  public String saljiNaredbu(String adresa, int port, String naredba) {
    try (Socket veza = new Socket(adresa, port);
        InputStreamReader isr =
            new InputStreamReader(veza.getInputStream(), Charset.forName("UTF-8"));
        OutputStreamWriter osw =
            new OutputStreamWriter(veza.getOutputStream(), Charset.forName("UTF-8"));) {
      osw.write(naredba);
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
      return odg.toString();
    } catch (SocketException e) {
    } catch (IOException ex) {
    }
    return "";
  }
}
