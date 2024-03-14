package org.foi.nwtis.dkusic.aplikacija_5.mvc;

import java.util.ArrayList;
import java.util.List;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsKorisnici.endpoint.Korisnici;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsKorisnici.endpoint.Korisnik;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsKorisnici.endpoint.PogresnaAutentikacija_Exception;
import org.foi.nwtis.dkusic.aplikacija_4.ws.WsKorisnici.endpoint.WsKorisnici;
import jakarta.enterprise.context.RequestScoped;
import jakarta.inject.Inject;
import jakarta.mvc.Controller;
import jakarta.mvc.Models;
import jakarta.mvc.View;
import jakarta.servlet.ServletContext;
import jakarta.ws.rs.FormParam;
import jakarta.ws.rs.GET;
import jakarta.ws.rs.POST;
import jakarta.ws.rs.Path;
import jakarta.xml.ws.WebServiceRef;

@Controller
@Path("izbornik/korisnici")
@RequestScoped
public class KontrolerKorisnici {
  @WebServiceRef(wsdlLocation = "http://localhost:8080/dkusic_aplikacija_4/korisnici?wsdl")
  private Korisnici service;

  @Inject
  private Models model;

  @Inject
  private ServletContext context;

  @GET
  @View("upravljanjeKorisnicima.jsp")
  public void pocetak() {}

  @GET
  @Path("registracija")
  @View("registracija.jsp")
  public void registracija() {}

  @POST
  @Path("registracija")
  @View("registracija.jsp")
  public void registracija(@FormParam("korIme") String korIme, @FormParam("ime") String ime,
      @FormParam("prezime") String prezime, @FormParam("lozinka") String lozinka,
      @FormParam("email") String email) {
    
    String registracija = "";
    Korisnik korisnik = new Korisnik();
    korisnik.setKorIme(korIme);
    korisnik.setIme(ime);
    korisnik.setPrezime(prezime);
    korisnik.setLozinka(lozinka);
    korisnik.setEmail(email);
    WsKorisnici wsKorisnici = service.getWsKorisniciPort();
    boolean rezultatRegistracije = wsKorisnici.dodajKorisnika(korisnik);
    if (rezultatRegistracije) {
      registracija = "Uspješna registracija";
    } else {
      registracija = "Neuspješna registracija";
    }
    model.put("rezultatRegistracija", registracija);
  }

  @POST
  @Path("pregled")
  @View("pregledKorisnika.jsp")
  public void pregledKorisnika(@FormParam("ime") String ime, @FormParam("prezime") String prezime) {
    List<Korisnik> listaKorisnika = new ArrayList<Korisnik>();
    Korisnik prijavljeni = (Korisnik) context.getAttribute("korisnik");
    String prijavljeniKorisnik = prijavljeni.getKorIme();
    String lozinka = prijavljeni.getLozinka();

    WsKorisnici wsKorisnici = service.getWsKorisniciPort();
    try {
      listaKorisnika = wsKorisnici.dajKorisnike(prijavljeniKorisnik, lozinka, ime, prezime);
    } catch (PogresnaAutentikacija_Exception e) {
      e.printStackTrace();
    }
    model.put("listaKorisnika", listaKorisnika);
  }

  @POST
  @Path("prijava")
  @View("prijava.jsp")
  public void prijavaKorisnika(@FormParam("korIme") String korIme,
      @FormParam("lozinka") String lozinka, @FormParam("trazeniKorisnik") String trazeniKorisnik) {
    if (trazeniKorisnik.isEmpty()) {
      trazeniKorisnik = korIme;
    }
    if (korIme.isEmpty()) {
      Korisnik prijavljeni = (Korisnik) context.getAttribute("korisnik");
      korIme = prijavljeni.getKorIme();
    }

    if (lozinka.isEmpty()) {
      Korisnik prijavljeni = (Korisnik) context.getAttribute("korisnik");
      lozinka = prijavljeni.getLozinka();
    }

    Korisnik korisnik = new Korisnik();
    WsKorisnici wsKorisnici = service.getWsKorisniciPort();
    try {
      korisnik = wsKorisnici.dajKorisnika(korIme, lozinka, trazeniKorisnik);
    } catch (PogresnaAutentikacija_Exception e) {
      e.printStackTrace();
    }
    if (korisnik != null) {
      context.setAttribute("korisnik", korisnik);
      model.put("korisnik", korisnik);
    }
  }
}
