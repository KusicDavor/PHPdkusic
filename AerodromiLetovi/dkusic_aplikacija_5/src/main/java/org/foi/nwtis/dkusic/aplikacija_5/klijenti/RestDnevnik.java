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

public class RestDnevnik {
  public RestDnevnik() {}

  public List<Zapis> getZapisi(String vrsta, int odBroja, int broj) {
    RestKKlijent rc = new RestKKlijent();
    List<Zapis> listaZapisa = rc.getZapisi(vrsta, odBroja, broj);
    return listaZapisa;
  }

  public static class RestKKlijent {
    private final WebTarget webTarget;
    private final Client client;
    private static final String BASE_URI = "http://localhost:8070/dkusic_aplikacija_2/api/";

    public RestKKlijent() {
      client = ClientBuilder.newClient();
      webTarget = client.target(BASE_URI).path("dnevnik");
    }

    public List<Zapis> getZapisi(String vrsta, int odBroja, int broj) {
      WebTarget resource = webTarget;
      resource =
          resource.queryParam("vrsta", vrsta).queryParam("odBroja", odBroja).queryParam("broj", broj);
      Invocation.Builder request = resource.request(MediaType.APPLICATION_JSON);

      if (request.get(String.class).isEmpty()) {
        return null;
      }

      Gson gson = new Gson();
      var listaZapisa = new TypeToken<List<Zapis>>() {}.getType();
      List<Zapis> lista = gson.fromJson(request.get(String.class), listaZapisa);
      return lista;
    }
  }
}
