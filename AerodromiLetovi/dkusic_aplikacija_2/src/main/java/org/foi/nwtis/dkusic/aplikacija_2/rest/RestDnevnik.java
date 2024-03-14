package org.foi.nwtis.dkusic.aplikacija_2.rest;


import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.Socket;
import java.net.SocketException;
import java.nio.charset.Charset;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;
import org.foi.nwtis.Konfiguracija;
import org.foi.nwtis.dkusic.aplikacija_2.podaci.OdgovorPosluzitelja;
import org.foi.nwtis.dkusic.aplikacija_2.podaci.Zapis;
import com.google.gson.Gson;
import jakarta.annotation.Resource;
import jakarta.enterprise.context.ApplicationScoped;
import jakarta.inject.Inject;
import jakarta.servlet.ServletContext;
import jakarta.ws.rs.Consumes;
import jakarta.ws.rs.DefaultValue;
import jakarta.ws.rs.GET;
import jakarta.ws.rs.POST;
import jakarta.ws.rs.Path;
import jakarta.ws.rs.Produces;
import jakarta.ws.rs.QueryParam;
import jakarta.ws.rs.core.Application;
import jakarta.ws.rs.core.MediaType;
import jakarta.ws.rs.core.Response;
import jakarta.ws.rs.core.Response.Status;

@Path("dnevnik")
@ApplicationScoped
public class RestDnevnik extends Application {
  @Resource(lookup = "java:app/jdbc/nwtis_bp")
  javax.sql.DataSource ds;

  @Inject
  ServletContext context;

  @GET
  @Produces(MediaType.APPLICATION_JSON)
  public Response dajZapise(@QueryParam("vrsta") @DefaultValue("") String vrsta,
      @QueryParam("odBroja") @DefaultValue("1") int odBroja,
      @QueryParam("broj") @DefaultValue("20") int broj) {

    if (provjeri().getStatus() == 400) {
      return provjeri();
    } else {
      
      if (vrsta.equals("JAX-RS")) {
        vrsta = "AP2";
      }
      if (vrsta.equals("JAX-WS")) {
        vrsta = "AP4";
      }
      if (vrsta.equals("UI")) {
        vrsta = "AP5";
      }
      
      if (vrsta.isEmpty()) {
        vrsta = null;
      }
      
      List<Zapis> listaZahtjeva = new ArrayList<Zapis>();
      PreparedStatement pstmt = null;

      String query =
          "select * from DNEVNIK WHERE VRSTA = ? OR ? IS NULL OR ? = '%' LIMIT ? OFFSET ?";
      try (var con = ds.getConnection()) {
        pstmt = con.prepareStatement(query);
        pstmt.setString(1, vrsta);
        pstmt.setString(2, vrsta);
        pstmt.setString(3, vrsta);
        pstmt.setInt(4, broj);
        pstmt.setInt(5, odBroja);

        ResultSet rs = pstmt.executeQuery();
        while (rs.next()) {
          String vrstaZahtjeva = rs.getString("VRSTA");
          String zahtjev = rs.getString("ZAHTJEV");
          Zapis zapis = new Zapis();
          zapis.setVrsta(vrstaZahtjeva);
          zapis.setZahtjev(zahtjev);
          listaZahtjeva.add(zapis);
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
      var gson = new Gson();
      if (listaZahtjeva.isEmpty()) {
        return Response.status(Status.BAD_REQUEST.getStatusCode()).entity("Ne postoje zapisi s traženom vrstom.").build();
      }
      var jsonZapisi = gson.toJson(listaZahtjeva);
      var odgovor = Response.ok().entity(jsonZapisi).build();
      return odgovor;
    }
  }

  @POST
  @Consumes(MediaType.APPLICATION_JSON)
  public void dodajZahtjev(String jsonZapis) {
    System.out.println("PRIMLJENO");
    
    Gson gson = new Gson();
    Zapis z = gson.fromJson(jsonZapis, Zapis.class);
    PreparedStatement pstmt = null;
    String query = "INSERT INTO DNEVNIK (VRSTA, ZAHTJEV) VALUES (?, ?)";
    try (var con = ds.getConnection()) {
      pstmt = con.prepareStatement(query);
      pstmt.setString(1, z.vrsta);
      pstmt.setString(2, z.zahtjev);
      pstmt.executeUpdate();
      pstmt.close();
      con.close();
    } catch (SQLException e) {
      e.printStackTrace();
    }
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
      odgovor = Response.status(Status.BAD_REQUEST.getStatusCode()).entity(jsonOdgovorPosluzitelja).build();
      return odgovor;
    } else if (status.contains("0")) {
      op.status = Status.BAD_REQUEST.getStatusCode();
      op.opis = "POSLUŽITELJ PAUZIRA";
      var jsonOdgovorPosluzitelja = gson.toJson(op);
      odgovor = Response.status(Status.BAD_REQUEST.getStatusCode()).entity(jsonOdgovorPosluzitelja).build();
      return odgovor;
    }
    return odgovor;
  }

  public String saljiNaredbu(Konfiguracija konfig, String naredba1) {
    int port = Integer.parseInt(konfig.dajPostavku("port"));
    String adresa = (String) konfig.dajPostavku("adresa");
    String naredba = naredba1;
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
