package org.foi.nwtis.dkusic.aplikacija_5.klijenti;

import java.util.List;
import org.foi.nwtis.dkusic.aplikacija_5.podaci.UdaljenostAerodromDrzava;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsAerodromi.endpoint.Aerodrom;
import org.foi.nwtis.dkusic.aplikacija_5.podaci.Udaljenost;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;
import jakarta.ws.rs.client.Client;
import jakarta.ws.rs.client.ClientBuilder;
import jakarta.ws.rs.client.Invocation;
import jakarta.ws.rs.client.WebTarget;
import jakarta.ws.rs.core.MediaType;
import jakarta.ws.rs.core.UriBuilder;

public class RestAerodromi {
  public RestAerodromi() {}

  public List<Aerodrom> getAerodromi(String traziNaziv, String traziDrzavu, int odBroja, int broj) {
    RestKKlijent rc = new RestKKlijent();
    List<Aerodrom> listaAerodroma = rc.getAerodromi(traziNaziv, traziDrzavu, odBroja, broj);
    return listaAerodroma;
  }

  public Aerodrom getAerodrom(String icao) {
    RestKKlijent rc = new RestKKlijent();
    Aerodrom aerodrom = rc.getAerodrom(icao);
    return aerodrom;
  }

  public List<Udaljenost> getUdaljenost1(String icaoOd, String icaoDo) {
    RestKKlijent rc = new RestKKlijent();
    List<Udaljenost> listaUdaljenosti = rc.getUdaljenost1(icaoOd, icaoDo);
    return listaUdaljenosti;
  }
  
  public String getUdaljenost2(String icaoOd, String icaoDo) {
    RestKKlijent rc = new RestKKlijent();
    String udaljenost = rc.getUdaljenost2(icaoOd, icaoDo);
    return udaljenost;
  }
  
  public List<UdaljenostAerodromDrzava> getUdaljenost3(String icaoOd, String icaoDo) {
    RestKKlijent rc = new RestKKlijent();
    List<UdaljenostAerodromDrzava> listaUdaljenosti = rc.getUdaljenost3(icaoOd, icaoDo);
    return listaUdaljenosti;
  }
  
  public List<UdaljenostAerodromDrzava> getUdaljenost4(String icaoOd, String drzava, Double km) {
    RestKKlijent rc = new RestKKlijent();
    List<UdaljenostAerodromDrzava> listaUdaljenosti = rc.getUdaljenost4(icaoOd, drzava, km);
    return listaUdaljenosti;
  }

  public static class RestKKlijent {
    private final WebTarget webTarget;
    private final Client client;
    private static final String BASE_URI = "http://localhost:8070/dkusic_aplikacija_2/api/";

    public RestKKlijent() {
      client = ClientBuilder.newClient();
      webTarget = client.target(BASE_URI).path("aerodromi");
    }
    
    public List<UdaljenostAerodromDrzava> getUdaljenost4(String icaoOd, String drzava, Double km) {
      WebTarget resource = webTarget;
      resource =
          resource.path(java.text.MessageFormat.format("{0}/udaljenost2", new Object[] {icaoOd})).queryParam("drzava", drzava).queryParam("km", km);
      Invocation.Builder request = resource.request(MediaType.APPLICATION_JSON);
      if (request.get(String.class).isEmpty()) {
        return null;
      }
      Gson gson = new Gson();
      var listaUdaljenosti = new TypeToken<List<UdaljenostAerodromDrzava>>() {}.getType();
      List<UdaljenostAerodromDrzava> lista = gson.fromJson(request.get(String.class), listaUdaljenosti);
      return lista;
    }
    
    public List<UdaljenostAerodromDrzava> getUdaljenost3(String icaoOd, String icaoDo) {
      WebTarget resource = webTarget;
      resource =
          resource.path(java.text.MessageFormat.format("{0}/udaljenost1/{1}", new Object[] {icaoOd, icaoDo}));
      Invocation.Builder request = resource.request(MediaType.APPLICATION_JSON);
      if (request.get(String.class).isEmpty()) {
        return null;
      }
      Gson gson = new Gson();
      var listaUdaljenosti = new TypeToken<List<UdaljenostAerodromDrzava>>() {}.getType();
      List<UdaljenostAerodromDrzava> lista = gson.fromJson(request.get(String.class), listaUdaljenosti);
      return lista;
    }

    public String getUdaljenost2(String icaoOd, String icaoDo) {
      WebTarget resource = webTarget;
      resource =
          resource.path(java.text.MessageFormat.format("{0}/izracunaj/{1}", new Object[] {icaoOd, icaoDo}));
      Invocation.Builder request = resource.request(MediaType.APPLICATION_JSON);
      if (request.get(String.class).isEmpty()) {
        return null;
      }
      Gson gson = new Gson();
      String udaljenost = gson.fromJson(request.get(String.class), String.class);
      return udaljenost;
    }

    public List<Udaljenost> getUdaljenost1(String icaoOd, String icaoDo) {
      WebTarget resource = webTarget;
      resource =
          resource.path(java.text.MessageFormat.format("{0}/{1}", new Object[] {icaoOd, icaoDo}));
      Invocation.Builder request = resource.request(MediaType.APPLICATION_JSON);
      if (request.get(String.class).isEmpty()) {
        return null;
      }
      Gson gson = new Gson();
      var listaUdaljenosti = new TypeToken<List<Udaljenost>>() {}.getType();
      List<Udaljenost> lista = gson.fromJson(request.get(String.class), listaUdaljenosti);
      return lista;
    }

    public Aerodrom getAerodrom(String icao) {
      WebTarget resource = webTarget;
      resource = resource.path(java.text.MessageFormat.format("{0}", new Object[] {icao}));
      Invocation.Builder request = resource.request(MediaType.APPLICATION_JSON);
      if (request.get(String.class).isEmpty()) {
        return null;
      }
      Gson gson = new Gson();
      Aerodrom aerodrom = gson.fromJson(request.get(String.class), Aerodrom.class);
      return aerodrom;
    }

    public List<Aerodrom> getAerodromi(String traziNaziv, String traziDrzavu, int odBroja,
        int broj) {
      WebTarget resource = webTarget;
      UriBuilder resourceUriBuilder = resource.getUriBuilder();

      if (traziNaziv != null && !traziNaziv.isEmpty()) {
        resourceUriBuilder.queryParam("traziNaziv", traziNaziv);
      }
      if (traziDrzavu != null && !traziDrzavu.isEmpty()) {
        resourceUriBuilder.queryParam("traziDrzavu", traziDrzavu);
      }
      if (odBroja != 0) {
        resourceUriBuilder.queryParam("odBroja", odBroja);
      }

      if (broj != 0) {
        resourceUriBuilder.queryParam("broj", broj);
      }

      WebTarget webTarget = client.target(resourceUriBuilder);
      Invocation.Builder request = webTarget.request(MediaType.APPLICATION_JSON);

      if (request.get(String.class).isEmpty()) {
        return null;
      }

      Gson gson = new Gson();
      var listaAerodroma = new TypeToken<List<Aerodrom>>() {}.getType();
      List<Aerodrom> aerodromi = gson.fromJson(request.get(String.class), listaAerodroma);
      return aerodromi;
    }
  }
}
