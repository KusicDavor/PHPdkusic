package org.foi.nwtis.dkusic.aplikacija_5.mvc;

import java.util.List;
import org.foi.nwtis.dkusic.aplikacija_5.klijenti.RestDnevnik;
import org.foi.nwtis.dkusic.aplikacija_5.klijenti.RestPosluzitelj;
import org.foi.nwtis.dkusic.aplikacija_5.podaci.OdgovorPosluzitelja;
import org.foi.nwtis.dkusic.aplikacija_5.podaci.Zapis;
import org.foi.nwtis.dkusic.zrna.Sakupljac;
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

@Controller
@Path("izbornik")
@RequestScoped
public class Kontroler {
  @Inject
  private Models model;

  @Inject
  private ServletContext context;

  @GET
  @View("index.jsp")
  public void pocetak() {}

  @POST
  @Path("poruke")
  @View("pregledPoruka.jsp")
  public void pregledPoruka(@FormParam("odBroja") @DefaultValue("1") int odBroja,
      @FormParam("broj") @DefaultValue("20") int broj) {

    if (broj == 0) {
      broj = 20;
    }

    if (odBroja == 0) {
      odBroja = 20;
    }

    List<String> listaPoruka = Sakupljac.dohvatiListuPoruka(odBroja, broj);
    model.put("listaPoruka", listaPoruka);
  }

  @GET
  @Path("posluzitelj")
  @View("posluzitelj.jsp")
  public void posaljiZahtjev() {}

  @GET
  @Path("porukeO")
  @View("index.jsp")
  public void obrisiPoruke() {
    Sakupljac.ocistiListu();
  }

  @POST
  @Path("posluzitelj")
  @View("odgovor.jsp")
  public void posaljiZahtjev(@FormParam("gumb") String gumb) {
    try {
      RestPosluzitelj rkp = new RestPosluzitelj();
      OdgovorPosluzitelja op = rkp.getOdgovor(gumb);
      model.put("op", op);
    } catch (Exception e) {
      e.printStackTrace();
    }
  }

  @POST
  @Path("dnevnik")
  @View("dnevnik.jsp")
  public void dnevnik(@FormParam("vrsta") String vrsta,
      @FormParam("odBroja") @DefaultValue("1") int odBroja,
      @FormParam("broj") @DefaultValue("20") int broj) {
    try {
      RestDnevnik rd = new RestDnevnik();
      List<Zapis> listaZapisa = rd.getZapisi(vrsta, odBroja, broj);   
      model.put("listaZapisa", listaZapisa);
      model.put("vrsta", vrsta);
      model.put("odBroja", odBroja);
      model.put("broj", broj);
    } catch (Exception e) {
      e.printStackTrace();
    }
  }
}
