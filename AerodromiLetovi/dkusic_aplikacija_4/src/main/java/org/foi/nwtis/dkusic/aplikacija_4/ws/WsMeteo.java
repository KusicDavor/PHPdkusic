package org.foi.nwtis.dkusic.aplikacija_4.ws;

import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.Socket;
import java.net.UnknownHostException;
import java.nio.charset.Charset;
import org.foi.nwtis.PostavkeBazaPodataka;
import org.foi.nwtis.dkusic.aplikacija_4.zrna.AirportFacade;
import org.foi.nwtis.dkusic.aplikacija_4.zrna.Slusac;
import org.foi.nwtis.podaci.Aerodrom;
import org.foi.nwtis.rest.klijenti.NwtisRestIznimka;
import org.foi.nwtis.rest.klijenti.OWMKlijent;
import org.foi.nwtis.rest.podaci.Lokacija;
import org.foi.nwtis.rest.podaci.MeteoPodaci;
import com.google.gson.Gson;
import jakarta.annotation.Resource;
import jakarta.inject.Inject;
import jakarta.jws.WebMethod;
import jakarta.jws.WebParam;
import jakarta.jws.WebService;
import jakarta.ws.rs.client.Client;
import jakarta.ws.rs.client.ClientBuilder;
import jakarta.ws.rs.client.WebTarget;
import jakarta.ws.rs.core.Response;

@WebService(serviceName = "meteo")
public class WsMeteo {
  @Resource(lookup = "java:app/jdbc/nwtis_bp")
  javax.sql.DataSource ds;

  public static PostavkeBazaPodataka konfig = Slusac.getkonfDB();

  @Inject
  AirportFacade airportFacade;

  @WebMethod
  public MeteoPodaci dajMeteo(@WebParam(name = "icao") String icao) throws NwtisRestIznimka {
    String odgovorPosluzitelja = provjeri();
    if (odgovorPosluzitelja.isEmpty()) {    
      System.out.println("POSLUŽITELJ NIJE AKTIVAN");
      return null;
    } else if (odgovorPosluzitelja.contains("OK 0")) {
      System.out.println("POSLUŽITELJ PAUZIRA");
      return null;
    }
    
    Client client = ClientBuilder.newClient();
    WebTarget wt =
        client.target("http://200.20.0.4:8080/dkusic_aplikacija_2/api/aerodromi/" + icao);
    Response response = wt.request().header("Accept", "application/json").get();
    Aerodrom trazeni = new Aerodrom();
    if (response.getStatus() == 200) {
      String odgovor = response.readEntity(String.class);
      Gson gson = new Gson();
      trazeni = gson.fromJson(odgovor, Aerodrom.class);
    } else {
      System.out.println("Nepoznati ICAO aerodroma");
      return null;
    }
    Lokacija lokacija = trazeni.getLokacija();
    OWMKlijent ovm = new OWMKlijent(konfig.dajPostavku("OpenWeatherMap.apikey"));
    MeteoPodaci mp = ovm.getRealTimeWeather(lokacija.getLatitude(), lokacija.getLongitude());
    return mp;
  }
  
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
}
