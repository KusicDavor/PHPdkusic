package org.foi.nwtis.dkusic.aplikacija_3.zrna;

import java.io.File;
import org.foi.nwtis.KonfiguracijaBP;
import org.foi.nwtis.NeispravnaKonfiguracija;
import org.foi.nwtis.PostavkeBazaPodataka;
import org.foi.nwtis.dkusic.aplikacija_3.dretva.SakupljacLetovaAviona;
import jakarta.ejb.EJB;
import jakarta.servlet.ServletContext;
import jakarta.servlet.ServletContextEvent;
import jakarta.servlet.ServletContextListener;
import jakarta.servlet.annotation.WebListener;

/**
 * Klasa tipa listener, služi za učitavanje konfiguracijske datoteke
 * 
 */
@WebListener
public class Slusac implements ServletContextListener {
  private static PostavkeBazaPodataka konfDB = null;
  private SakupljacLetovaAviona sakupljac;

  @EJB
  JmsPosiljatelj jmsPosiljatelj;

  /**
   * Učitava konfiguracijsku datoteku
   * 
   * @param sce kontekst servleta za određivanje putanje do konfiguracijske datoteke
   */
  @Override
  public void contextInitialized(ServletContextEvent sce) {
    ServletContext context = sce.getServletContext();
    String nazivDatoteke = context.getInitParameter("konfiguracija");
    String putanja = context.getRealPath("/WEB-INF");
    nazivDatoteke = putanja + File.separator + nazivDatoteke;

    konfDB = new PostavkeBazaPodataka(nazivDatoteke);
    KonfiguracijaBP konfig = konfDB;
    try {
      konfig.ucitajKonfiguraciju();
    } catch (NeispravnaKonfiguracija e) {
      e.printStackTrace();
      return;
    }
    context.setAttribute("konfig", konfig);
    ServletContextListener.super.contextInitialized(sce);
    sakupljac = new SakupljacLetovaAviona(konfig, jmsPosiljatelj);
    sakupljac.start();
  }

  /**
   * Briše atribut s konfiguracijskom datotekom iz konteksta
   * 
   * @param sce kontekst servleta
   */
  @Override
  public void contextDestroyed(ServletContextEvent sce) {
    if (sakupljac.isAlive() && sakupljac != null) {
      sakupljac.interrupt();
    }
  }

  /**
   * Metoda za dohvat konfiguracije baze podataka
   * 
   * @return konfDB konfiguracija baze podataka
   */
  public static PostavkeBazaPodataka getkonfDB() {
    return konfDB;
  }
}
