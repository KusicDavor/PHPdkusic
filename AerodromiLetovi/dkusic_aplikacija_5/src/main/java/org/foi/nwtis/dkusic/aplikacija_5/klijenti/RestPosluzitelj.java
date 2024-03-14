package org.foi.nwtis.dkusic.aplikacija_5.klijenti;

import java.util.List;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsAerodromi.endpoint.Aerodrom;
import org.foi.nwtis.dkusic.aplikacija_5.podaci.OdgovorPosluzitelja;
import org.foi.nwtis.dkusic.aplikacija_5.podaci.Zapis;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;
import jakarta.ws.rs.client.Client;
import jakarta.ws.rs.client.ClientBuilder;
import jakarta.ws.rs.client.Invocation;
import jakarta.ws.rs.client.WebTarget;
import jakarta.ws.rs.core.MediaType;

public class RestPosluzitelj {
  public RestPosluzitelj() {}

  public OdgovorPosluzitelja getOdgovor(String naredba) {
    RestKKlijent rc = new RestKKlijent();
    OdgovorPosluzitelja op = rc.getOdgovor(naredba);
    return op;
  }

  public List<Aerodrom> getAerodromi(String traziNaziv, String traziDrzavu, String odBroja,
      String broj) {
    RestKKlijent rc = new RestKKlijent();
    List<Aerodrom> listaAerodroma = rc.getAerodromi(traziNaziv, traziDrzavu, odBroja, broj);
    return listaAerodroma;
  }

  public static class RestKKlijent {
    private final WebTarget webTarget;
    private final Client client;
    private static final String BASE_URI = "http://localhost:8070/dkusic_aplikacija_2/api/";

    public RestKKlijent() {
      client = ClientBuilder.newClient();
      webTarget = client.target(BASE_URI).path("nadzor");
    }

    public OdgovorPosluzitelja getOdgovor(String naredba) {
      WebTarget resource = webTarget;
      resource = resource.path(java.text.MessageFormat.format("{0}", new Object[] {naredba}));
      Invocation.Builder request = resource.request(MediaType.APPLICATION_JSON);

      if (request.get(String.class).isEmpty()) {
        return null;
      }
      Gson gson = new Gson();
      OdgovorPosluzitelja odgovor =
          gson.fromJson(request.get(String.class), OdgovorPosluzitelja.class);
      return odgovor;
    }

    public List<Aerodrom> getAerodromi(String traziNaziv, String traziDrzavu, String odBroja,
        String broj) {
      WebTarget resource = webTarget;
      resource =
          resource.queryParam("traziNaziv", traziNaziv).queryParam("traziDrzavu", traziDrzavu)
              .queryParam("odBroja", odBroja).queryParam("broj", broj);
      Invocation.Builder request = resource.request(MediaType.APPLICATION_JSON);

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
