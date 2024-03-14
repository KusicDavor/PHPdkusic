package org.foi.nwtis.dkusic.aplikacija_5.mvc;

import java.io.IOException;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import javax.swing.text.html.parser.DTD;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsAerodromi.endpoint.Aerodrom;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsAerodromi.endpoint.Aerodromi;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsAerodromi.endpoint.WsAerodromi;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsKorisnici.endpoint.Korisnik;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsMeteo.endpoint.Meteo;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsMeteo.endpoint.MeteoPodaci;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsMeteo.endpoint.NwtisRestIznimka_Exception;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsMeteo.endpoint.WsMeteo;
import org.foi.nwtis.dkusic.aplikacija_5.klijenti.RestAerodromi;
import org.foi.nwtis.dkusic.aplikacija_5.podaci.Udaljenost;
import org.foi.nwtis.dkusic.aplikacija_5.podaci.UdaljenostAerodromDrzava;
import jakarta.enterprise.context.RequestScoped;
import jakarta.inject.Inject;
import jakarta.mvc.Controller;
import jakarta.mvc.Models;
import jakarta.mvc.View;
import jakarta.servlet.ServletContext;
import jakarta.ws.rs.DefaultValue;
import jakarta.ws.rs.FormParam;
import jakarta.ws.rs.GET;
import jakarta.ws.rs.POST;
import jakarta.ws.rs.Path;
import jakarta.xml.ws.WebServiceRef;

@Controller
@Path("izbornik/aerodromi")
@RequestScoped
public class KontrolerAerodromi {
  @WebServiceRef(wsdlLocation = "http://localhost:8080/dkusic_aplikacija_4/aerodromi?wsdl")
  private Aerodromi service;
  @WebServiceRef(wsdlLocation = "http://localhost:8080/dkusic_aplikacija_4/meteo?wsdl")
  private Meteo serviceMeteo;

  @Inject
  private Models model;

  @Inject
  private ServletContext context;
  private static Korisnik prijavljeni;
  private static Map<Aerodrom, String> mapaStatic = new HashMap<Aerodrom, String>();

  @GET
  @View("upravljanjeAerodromima.jsp")
  public void pocetak() {}

  @POST
  @Path("dodajAerodrom")
  @View("upravljanjeAerodromima.jsp")
  public void dodajAerodrom(@FormParam("icao") String icao) {
    prijavljeni = (Korisnik) context.getAttribute("korisnik");
    WsAerodromi wsAerodromi = service.getWsAerodromiPort();
    wsAerodromi.dodajAerodromZaLetove(prijavljeni.getKorIme(), prijavljeni.getLozinka(), icao);
  }

  @POST
  @Path("pregledAerodroma")
  @View("pregledAerodroma.jsp")
  public void dajAerodrom(@FormParam("icao") String icao) {
    prijavljeni = (Korisnik) context.getAttribute("korisnik");
    RestAerodromi ra = new RestAerodromi();
    Aerodrom trazeni = ra.getAerodrom(icao);

    WsMeteo wm = serviceMeteo.getWsMeteoPort();
    MeteoPodaci mp = new MeteoPodaci();

    try {
      mp = wm.dajMeteo(icao);
    } catch (NwtisRestIznimka_Exception e) {
      e.printStackTrace();
    }

    model.put("aerodrom", trazeni);
    model.put("meteoPodaci", mp);
  }

  @GET
  @Path("pregledPreuzimanje")
  @View("pregledPreuzimanje.jsp")
  public void prikaziPreuzete() {
    prijavljeni = (Korisnik) context.getAttribute("korisnik");
    WsAerodromi wsAerodromi = service.getWsAerodromiPort();
    List<Aerodrom> listaAerodroma =
        wsAerodromi.dajAerodromeZaLetove(prijavljeni.getKorIme(), prijavljeni.getLozinka());
    List<String> listaStatusa = wsAerodromi.vratiStatuse();
    Map<Aerodrom, String> mapa = new HashMap<Aerodrom, String>();
    for (Aerodrom aero : listaAerodroma) {
      for (String string : listaStatusa) {
        String[] icao = string.split(" ");
        if (aero.getIcao().equals(icao[0])) {
          mapa.put(aero, icao[1]);
        }
      }
    }
    mapaStatic = mapa;
    model.put("mapa", mapa);
  }

  @POST
  @Path("pauzirajAerodrom")
  @View("pregledPreuzimanje.jsp")
  public void pauzirajAerodrom(@FormParam("icao") String icao) {
    prijavljeni = (Korisnik) context.getAttribute("korisnik");
    WsAerodromi wsAerodromi = service.getWsAerodromiPort();
    wsAerodromi.pauzirajAerodromZaLetove(prijavljeni.getKorIme(), prijavljeni.getLozinka(), icao);
    Map<Aerodrom, String> mapa = mapaStatic;
    model.put("mapa", mapa);
  }

  @POST
  @Path("aktivirajAerodrom")
  @View("pregledPreuzimanje.jsp")
  public void aktivirajAerodrom(@FormParam("icao") String icao) {
    prijavljeni = (Korisnik) context.getAttribute("korisnik");
    WsAerodromi wsAerodromi = service.getWsAerodromiPort();
    wsAerodromi.aktivirajAerodromZaLetove(prijavljeni.getKorIme(), prijavljeni.getLozinka(), icao);
    Map<Aerodrom, String> mapa = mapaStatic;
    model.put("mapa", mapa);
  }


  @POST
  @Path("svi")
  @View("svi.jsp")
  public void svi(@FormParam("traziNaziv") String traziNaziv,
      @FormParam("traziDrzavu") String traziDrzavu, @FormParam("odBroja") int odBroja,
      @FormParam("broj") int broj) throws IOException {

    RestAerodromi ra = new RestAerodromi();
    List<Aerodrom> listaAerodroma = ra.getAerodromi(traziNaziv, traziDrzavu, odBroja, broj);
    model.put("traziNaziv", traziNaziv);
    model.put("traziDrzavu", traziDrzavu);
    model.put("odBroja", odBroja);
    model.put("broj", broj);
    model.put("listaAerodroma", listaAerodroma);
  }

  @POST
  @Path("pregledUdaljenost1")
  @View("pregledUdaljenost1.jsp")
  public void pregledUdaljenost1(@FormParam("icaoOd") String icaoOd,
      @FormParam("icaoDo") String icaoDo) {
    RestAerodromi ra = new RestAerodromi();
    List<Udaljenost> listaUdaljenosti = ra.getUdaljenost1(icaoOd, icaoDo);
    model.put("udaljenosti", listaUdaljenosti);
  }

  @POST
  @Path("pregledUdaljenost2")
  @View("pregledUdaljenost2.jsp")
  public void pregledUdaljenost2(@FormParam("icaoOd") String icaoOd,
      @FormParam("icaoDo") String icaoDo) {
    RestAerodromi ra = new RestAerodromi();
    String udaljenost = ra.getUdaljenost2(icaoOd, icaoDo);
    String[] polje = udaljenost.split(" ");
    model.put("udaljenost", polje[1]);
    model.put("icaoOd", icaoOd);
    model.put("icaoDo", icaoDo);
  }

  @POST
  @Path("pregledUdaljenost3")
  @View("pregledUdaljenost3.jsp")
  public void pregledUdaljenost3(@FormParam("icaoOd") String icaoOd,
      @FormParam("icaoDo") String icaoDo) {
    RestAerodromi ra = new RestAerodromi();
    List<UdaljenostAerodromDrzava> listaUdaljenosti = ra.getUdaljenost3(icaoOd, icaoDo);
    model.put("listaUdaljenosti", listaUdaljenosti);
  }
  
  @POST
  @Path("pregledUdaljenost4")
  @View("pregledUdaljenost4.jsp")
  public void pregledUdaljenost4(@FormParam("icaoOd") String icaoOd,
      @FormParam("drzava") String drzava, @FormParam("km") Double km) {
    RestAerodromi ra = new RestAerodromi();
    List<UdaljenostAerodromDrzava> listaUdaljenosti = ra.getUdaljenost4(icaoOd, drzava, km);
    model.put("listaUdaljenosti", listaUdaljenosti);
  }
}
