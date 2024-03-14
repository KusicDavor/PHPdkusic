package org.foi.nwtis.dkusic.aplikacija_5.mvc;

import java.io.IOException;
import java.util.List;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsKorisnici.endpoint.Korisnik;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsLetovi.endpoint.LetAviona;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsLetovi.endpoint.Letovi;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsLetovi.endpoint.WsLetovi;
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
@Path("izbornik/letovi")
@RequestScoped
public class KontrolerLetovi {
  @WebServiceRef(wsdlLocation = "http://localhost:8080/dkusic_aplikacija_4/letovi?wsdl")
  private Letovi service;
  
  @Inject
  private Models model;

  @Inject
  private ServletContext context;
  private static Korisnik prijavljeni;

  @GET
  @View("upravljanjeLetovima.jsp")
  public void pocetak() {}

  @POST
  @Path("spremljeni")
  @View("pregledSpremljenih.jsp")
  public void spremljeni(@FormParam("icao") String icao,
      @FormParam("danOd") String danOd, @FormParam("danDo") String danDo,
      @FormParam("odBroja") @DefaultValue("1") int odBroja, @FormParam("broj") @DefaultValue("20") int broj) throws IOException {
    prijavljeni = (Korisnik) context.getAttribute("korisnik");
    WsLetovi wsLetovi = service.getWsLetoviPort();
    List<LetAviona> listaLetova = wsLetovi.dajPolaskeInterval(prijavljeni.getKorIme(), prijavljeni.getLozinka(), icao, danOd, danDo, odBroja, broj);
    model.put("listaLetova", listaLetova);
    model.put("icao", icao);
    model.put("danOd", danOd);
    model.put("danDo", danDo);
    model.put("odBroja", odBroja);
    model.put("broj", broj);
  }
  
  @POST
  @Path("spremljeni2")
  @View("pregledSpremljenih2.jsp")
  public void spremljeni2(@FormParam("icao") String icao,
      @FormParam("datum") String datum, @FormParam("odBroja") @DefaultValue("1") int odBroja, @FormParam("broj") @DefaultValue("20") int broj) throws IOException {
    prijavljeni = (Korisnik) context.getAttribute("korisnik");
    WsLetovi wsLetovi = service.getWsLetoviPort();
    List<LetAviona> listaLetova = wsLetovi.dajPolaskeNaDan(prijavljeni.getKorIme(), prijavljeni.getLozinka(), icao, datum, odBroja, broj);
    model.put("listaLetova", listaLetova);
    model.put("icao", icao);
    model.put("danOd", datum);
    model.put("odBroja", odBroja);
    model.put("broj", broj);
  }
  
  @POST
  @Path("spremljeni3")
  @View("pregledSpremljenih3.jsp")
  public void spremljeni3(@FormParam("icao") String icao,
      @FormParam("datum") String datum, @FormParam("odBroja") @DefaultValue("1") int odBroja, @FormParam("broj") @DefaultValue("20") int broj) throws IOException {
    prijavljeni = (Korisnik) context.getAttribute("korisnik");
    WsLetovi wsLetovi = service.getWsLetoviPort();
    List<LetAviona> listaLetova = wsLetovi.dajPolaskeNaDanOS(prijavljeni.getKorIme(), prijavljeni.getLozinka(), icao, datum);
    model.put("listaLetova", listaLetova);
    model.put("icao", icao);
    model.put("danOd", datum);
  }
}
