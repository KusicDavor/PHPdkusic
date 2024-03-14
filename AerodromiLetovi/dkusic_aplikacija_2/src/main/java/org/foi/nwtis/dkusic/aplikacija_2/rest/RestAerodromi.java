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
import org.foi.nwtis.dkusic.aplikacija_2.podaci.Udaljenost;
import org.foi.nwtis.dkusic.aplikacija_2.podaci.UdaljenostAerodromDrzava;
import org.foi.nwtis.podaci.Aerodrom;
import org.foi.nwtis.rest.podaci.Lokacija;
import com.google.gson.Gson;
import jakarta.annotation.Resource;
import jakarta.enterprise.context.RequestScoped;
import jakarta.inject.Inject;
import jakarta.servlet.ServletContext;
import jakarta.ws.rs.DefaultValue;
import jakarta.ws.rs.GET;
import jakarta.ws.rs.Path;
import jakarta.ws.rs.PathParam;
import jakarta.ws.rs.Produces;
import jakarta.ws.rs.QueryParam;
import jakarta.ws.rs.core.Application;
import jakarta.ws.rs.core.MediaType;
import jakarta.ws.rs.core.Response;
import jakarta.ws.rs.core.Response.Status;


@Path("aerodromi")
@RequestScoped
public class RestAerodromi extends Application {

  @Resource(lookup = "java:app/jdbc/nwtis_bp")
  javax.sql.DataSource ds;

  @Inject
  ServletContext context;

  @GET
  @Produces(MediaType.APPLICATION_JSON)
  public Response dajSveAerodrome(@QueryParam("traziNaziv") @DefaultValue("") String traziNaziv,
      @QueryParam("traziDrzavu") String traziDrzavu,
      @QueryParam("odBroja") @DefaultValue("1") int odBroja,
      @QueryParam("broj") @DefaultValue("20") int broj) {

    if (provjeri().getStatus() == 400) {
      return provjeri();
    } else {

      List<Aerodrom> aerodromi = new ArrayList<Aerodrom>();
      PreparedStatement pstmt = null;

      String query =
          "select * from AIRPORTS WHERE NAME LIKE CONCAT('%', ?, '%') AND (ISO_COUNTRY = ? OR ? IS NULL OR ? = '%') LIMIT ? OFFSET ?";
      try (var con = ds.getConnection()) {
        pstmt = con.prepareStatement(query);
        pstmt.setString(1, traziNaziv);
        pstmt.setString(2, traziDrzavu);
        pstmt.setString(3, traziDrzavu);
        pstmt.setString(4, traziDrzavu);
        pstmt.setInt(5, broj);
        pstmt.setInt(6, odBroja);

        ResultSet rs = pstmt.executeQuery();
        while (rs.next()) {
          String icao = rs.getString("ICAO");
          String naziv = rs.getString("NAME");
          String drzava = rs.getString("ISO_COUNTRY");
          String[] lok = rs.getString("COORDINATES").split(",");
          Lokacija lokacija = new Lokacija();
          lokacija.postavi(lok[0], lok[1]);
          Aerodrom aerodrom = new Aerodrom(icao, naziv, drzava, lokacija);
          aerodromi.add(aerodrom);

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
      var jsonAerodromi = gson.toJson(aerodromi);
      var odgovor = Response.ok().entity(jsonAerodromi).build();
      return odgovor;
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

  @GET
  @Produces({MediaType.APPLICATION_JSON})
  @Path("{icao}")
  public Response dajIcao(@PathParam("icao") String icao) {

    if (provjeri().getStatus() == 400) {
      return provjeri();
    } else {

      Aerodrom trazeni = null;
      PreparedStatement pstmt = null;
      Response odgovor = null;

      String query = "SELECT * FROM AIRPORTS a WHERE a.ICAO  = ?;";
      try (var con = ds.getConnection()) {

        pstmt = con.prepareStatement(query);
        pstmt.setString(1, icao);

        ResultSet rs = pstmt.executeQuery();

        while (rs.next()) {
          String icao1 = rs.getString("ICAO");
          String naziv = rs.getString("NAME");
          String drzava = rs.getString("ISO_COUNTRY");
          String[] koordinate = rs.getString("COORDINATES").split(",");
          trazeni = new Aerodrom();
          trazeni.setIcao(icao1);
          trazeni.setNaziv(naziv);
          trazeni.setDrzava(drzava);
          Lokacija lokacija = new Lokacija();
          lokacija.postavi(koordinate[0], koordinate[1]);
          trazeni.setLokacija(lokacija);
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
      var jsonAerodrom = gson.toJson(trazeni);

      if (trazeni != null) {
        odgovor = Response.ok().entity(jsonAerodrom).build();
      } else {
        odgovor = Response.status(Response.Status.NOT_FOUND).build();
      }
      return odgovor;
    }
  }

  @Path("{icaoOd}/izracunaj/{icaoDo}")
  @GET
  @Produces(MediaType.APPLICATION_JSON)
  public Response dajUdaljenostPodzadatakE(@PathParam("icaoOd") String icaoOd,
      @PathParam("icaoDo") String icaoDo) {
    Konfiguracija konfig = (Konfiguracija) context.getAttribute("konfig");

    if (provjeri().getStatus() == 400) {
      return provjeri();
    } else {

      PreparedStatement pstmt = null;
      Response odgovor = null;
      Lokacija icaoOdLok = new Lokacija();
      Lokacija icaoDoLok = new Lokacija();

      String query = "SELECT * FROM AIRPORTS a WHERE a.ICAO  = ?;";
      try (var con = ds.getConnection()) {

        pstmt = con.prepareStatement(query);
        pstmt.setString(1, icaoOd);

        ResultSet rs = pstmt.executeQuery();

        while (rs.next()) {
          String[] koordinate = rs.getString("COORDINATES").split(",");
          icaoOdLok.postavi(koordinate[0], koordinate[1]);
        }

        pstmt.close();
        con.close();

        query = "SELECT * FROM AIRPORTS a WHERE a.ICAO  = ?;";
        try (var con1 = ds.getConnection()) {

          pstmt = con1.prepareStatement(query);
          pstmt.setString(1, icaoDo);

          rs = pstmt.executeQuery();

          while (rs.next()) {
            String[] koordinate1 = rs.getString("COORDINATES").split(",");
            icaoDoLok.postavi(koordinate1[0], koordinate1[1]);
          }

          rs.close();
          pstmt.close();
          con1.close();

        }
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
      String naredba = "UDALJENOST" + icaoOdLok.getLongitude() + " " + icaoOdLok.getLatitude()
          + icaoDoLok.getLongitude() + " " + icaoDoLok.getLatitude();
      String odgovorPosluzitelja = saljiNaredbu(konfig, naredba);

      var gson = new Gson();
      var jsonUdaljenosti = gson.toJson(odgovorPosluzitelja);
      odgovor = Response.ok().entity(jsonUdaljenosti).build();
      return odgovor;
    }
  }

  @Path("{icaoOd}/udaljenost1/{icaoDo}")
  @GET
  @Produces(MediaType.APPLICATION_JSON)
  public Response dajUdaljenostPodzadatakF(@PathParam("icaoOd") String icaoOd,
      @PathParam("icaoDo") String icaoDo) {

    if (provjeri().getStatus() == 400) {
      return provjeri();
    } else {

      Response odgovor = null;
      List<UdaljenostAerodromDrzava> listaUdaljenost = new ArrayList<UdaljenostAerodromDrzava>();

      if (provjeri().getStatus() == 400) {
        return provjeri();
      } else {
        Double udaljenost = vratiUdaljenost(icaoOd, icaoDo);

        if (udaljenost == 0.0) {
          String nepostojeciAerodromi = "Nisu prepoznati unešeni aerodromi.";
          var gsonGreska = new Gson();
          var jsonGreška = gsonGreska.toJson(nepostojeciAerodromi);
          return Response.status(Response.Status.NOT_FOUND).entity(jsonGreška).build();
        }

        String drzavaIcaoDo = "";
        PreparedStatement pstmt = null;

        String query = "SELECT * FROM AIRPORTS a WHERE a.ICAO  = ?;";
        try (var con = ds.getConnection()) {
          pstmt = con.prepareStatement(query);
          pstmt.setString(1, icaoDo);
          ResultSet rs = pstmt.executeQuery();
          while (rs.next()) {
            drzavaIcaoDo = rs.getString("ISO_COUNTRY");
          }
          pstmt.close();

          query = "select * from AIRPORTS WHERE ISO_COUNTRY = ?";
          try (var con1 = ds.getConnection()) {
            pstmt = con.prepareStatement(query);
            pstmt.setString(1, drzavaIcaoDo);
            rs = pstmt.executeQuery();
            while (rs.next()) {
              String icaoProvjerenogAerodroma = rs.getString("ICAO");
              Double dobivenaUdaljenost2 = vratiUdaljenost(icaoOd, icaoProvjerenogAerodroma);
              Float floatVrijednostDoublea = dobivenaUdaljenost2.floatValue();

              if (dobivenaUdaljenost2 < udaljenost) {
                UdaljenostAerodromDrzava uad = new UdaljenostAerodromDrzava(
                    icaoProvjerenogAerodroma, drzavaIcaoDo, floatVrijednostDoublea);
                listaUdaljenost.add(uad);
              }
            }

            rs.close();
            pstmt.close();
            con.close();
          }
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
      }
      var gson = new Gson();
      var jsonUdaljenosti = gson.toJson(listaUdaljenost);
      odgovor = Response.ok().entity(jsonUdaljenosti).build();
      return odgovor;
    }
  }

  @Path("{icaoOd}/udaljenost2")
  @GET
  @Produces(MediaType.APPLICATION_JSON)
  public Response dajUdaljenostPodzadatakG(@PathParam("icaoOd") String icaoOd,
      @QueryParam("drzava") String drzava, @QueryParam("km") Double km) {

    if (provjeri().getStatus() == 400) {
      return provjeri();
    } else {

      Response odgovor = null;
      List<UdaljenostAerodromDrzava> listaUdaljenost = new ArrayList<UdaljenostAerodromDrzava>();

      PreparedStatement pstmt = null;
      String query = "select * from AIRPORTS WHERE ISO_COUNTRY = ?";
      try (var con = ds.getConnection()) {
        pstmt = con.prepareStatement(query);
        pstmt.setString(1, drzava);
        ResultSet rs = pstmt.executeQuery();

        if (!rs.next()) {
          rs.close();
          pstmt.close();
          con.close();
          String nepostojecaDrzava = "Ne postoji upisana država.";
          var gsonGreska = new Gson();
          var jsonGreška = gsonGreska.toJson(nepostojecaDrzava);
          return Response.status(Response.Status.NOT_FOUND).entity(jsonGreška).build();
        }

        while (rs.next()) {
          String icaoProvjerenogAerodroma = rs.getString("ICAO");
          Double dobivenaUdaljenost2 = vratiUdaljenost(icaoOd, icaoProvjerenogAerodroma);
          Float floatVrijednostDoublea = dobivenaUdaljenost2.floatValue();

          if (dobivenaUdaljenost2 < km) {
            UdaljenostAerodromDrzava uad = new UdaljenostAerodromDrzava(icaoProvjerenogAerodroma,
                drzava, floatVrijednostDoublea);
            listaUdaljenost.add(uad);
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

      if (listaUdaljenost.isEmpty()) {
        String nepostojeciAerodromi = "Ne postoje aerodromi s manjom udaljenošću.";
        var gsonGreska = new Gson();
        var jsonGreška = gsonGreska.toJson(nepostojeciAerodromi);
        return Response.status(Response.Status.NOT_FOUND).entity(jsonGreška).build();
      }

      for (UdaljenostAerodromDrzava udaljenostAerodromDrzava : listaUdaljenost) {
        if (udaljenostAerodromDrzava.km() == 0.0) {
          String nepostojeciAerodrom = "Nije prepoznat početni aerodrom.";
          var gsonGreska = new Gson();
          var jsonGreška = gsonGreska.toJson(nepostojeciAerodrom);
          return Response.status(Response.Status.NOT_FOUND).entity(jsonGreška).build();
        }
      }

      var gson = new Gson();
      var jsonUdaljenosti = gson.toJson(listaUdaljenost);
      odgovor = Response.ok().entity(jsonUdaljenosti).build();
      return odgovor;
    }
  }

  public Double vratiUdaljenost(String icaoOd, String icaoDo) {
    Konfiguracija konfig = (Konfiguracija) context.getAttribute("konfig");
    PreparedStatement pstmt = null;
    Lokacija icaoOdLok = new Lokacija();
    Lokacija icaoDoLok = new Lokacija();

    String query = "SELECT * FROM AIRPORTS a WHERE a.ICAO  = ?;";
    try (var con = ds.getConnection()) {

      pstmt = con.prepareStatement(query);
      pstmt.setString(1, icaoOd);

      ResultSet rs = pstmt.executeQuery();

      while (rs.next()) {
        String[] koordinate = rs.getString("COORDINATES").split(",");
        icaoOdLok.postavi(koordinate[0], koordinate[1]);
      }

      pstmt.close();
      con.close();

      query = "SELECT * FROM AIRPORTS a WHERE a.ICAO  = ?;";
      try (var con1 = ds.getConnection()) {

        pstmt = con1.prepareStatement(query);
        pstmt.setString(1, icaoDo);
        rs = pstmt.executeQuery();
        while (rs.next()) {
          String[] koordinate1 = rs.getString("COORDINATES").split(",");
          icaoDoLok.postavi(koordinate1[0], koordinate1[1]);
        }

        rs.close();
        pstmt.close();
        con1.close();

      }
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
    String naredba = "UDALJENOST" + icaoOdLok.getLongitude() + " " + icaoOdLok.getLatitude()
        + icaoDoLok.getLongitude() + " " + icaoDoLok.getLatitude();
    String odgovorPosluzitelja = saljiNaredbu(konfig, naredba);

    String[] odgovorUdaljenost = odgovorPosluzitelja.split(" ");
    Double udaljenostAerodroma;
    try {
      udaljenostAerodroma = Double.parseDouble(odgovorUdaljenost[1]);
    } catch (NumberFormatException e) {
      return 0.0;
    }
    return udaljenostAerodroma;
  }

  @Path("{icaoOd}/{icaoDo}")
  @GET
  @Produces(MediaType.APPLICATION_JSON)
  public Response dajUdaljenostiIzmeđuDvaAerodoma(@PathParam("icaoOd") String icaoOd,
      @PathParam("icaoDo") String icaoDo) {

    if (provjeri().getStatus() == 400) {
      return provjeri();
    } else {

      List<Udaljenost> lista = new ArrayList<Udaljenost>();
      PreparedStatement pstmt = null;

      String query =
          "select ICAO_FROM, ICAO_TO, COUNTRY, DIST_CTRY from AIRPORTS_DISTANCE_MATRIX WHERE "
              + "ICAO_FROM = ? AND ICAO_TO = ?";

      try (var con = ds.getConnection()) {

        pstmt = con.prepareStatement(query);
        pstmt.setString(1, icaoOd);
        pstmt.setString(2, icaoDo);

        ResultSet rs = pstmt.executeQuery();

        while (rs.next()) {
          String drzava = rs.getString("COUNTRY");
          float udaljDrzava = rs.getFloat("DIST_CTRY");
          Udaljenost udaljenost = new Udaljenost(drzava, udaljDrzava);
          lista.add(udaljenost);

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
      var jsonUdaljenosti = gson.toJson(lista);
      var odgovor = Response.ok().entity(jsonUdaljenosti).build();

      return odgovor;
    }
  }

  @Path("{icao}/udaljenosti")
  @GET
  @Produces({MediaType.APPLICATION_JSON})
  public Response dajAerodrom(@PathParam("icao") String icao,
      @QueryParam("odBroja") @DefaultValue("1") int odBroja,
      @QueryParam("broj") @DefaultValue("20") int broj) {

    if (provjeri().getStatus() == 400) {
      return provjeri();
    } else {

      List<UdaljenostAerodromDrzava> listaUdaljenosti = new ArrayList<UdaljenostAerodromDrzava>();
      PreparedStatement pstmt = null;

      String query =
          "SELECT * FROM AIRPORTS_DISTANCE_MATRIX adm WHERE adm.ICAO_FROM = ? LIMIT ? OFFSET ?;";
      try (var con = ds.getConnection()) {

        pstmt = con.prepareStatement(query);
        pstmt.setString(1, icao);
        pstmt.setInt(2, broj);
        pstmt.setInt(3, odBroja);

        ResultSet rs = pstmt.executeQuery();

        while (rs.next()) {
          String aerodrom = rs.getString("ICAO_TO");
          String drzava = rs.getString("COUNTRY");
          float km = rs.getFloat("DIST_TOT");

          UdaljenostAerodromDrzava udaljenosti = new UdaljenostAerodromDrzava(aerodrom, drzava, km);
          listaUdaljenosti.add(udaljenosti);
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
      var jsonUdaljenosti = gson.toJson(listaUdaljenosti);

      Response odgovor = Response.ok().entity(jsonUdaljenosti).build();
      return odgovor;
    }
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
