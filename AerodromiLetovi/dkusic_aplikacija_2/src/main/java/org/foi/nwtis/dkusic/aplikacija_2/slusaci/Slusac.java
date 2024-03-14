package org.foi.nwtis.dkusic.aplikacija_2.slusaci;

import java.io.File;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.net.Socket;
import java.net.UnknownHostException;
import java.nio.charset.Charset;
import org.foi.nwtis.Konfiguracija;
import org.foi.nwtis.KonfiguracijaBP;
import org.foi.nwtis.NeispravnaKonfiguracija;
import org.foi.nwtis.PostavkeBazaPodataka;
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
  }

  /**
   * Briše atribut s konfiguracijskom datotekom iz konteksta
   * 
   * @param sce kontekst servleta
   */
  @Override
  public void contextDestroyed(ServletContextEvent sce) {
    ServletContext context = sce.getServletContext();
    context.removeAttribute("konfig");
    ServletContextListener.super.contextDestroyed(sce);
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
