/**
 * 
 */
package org.foi.nwtis.dkusic.konfiguracije;

import org.foi.nwtis.KonfiguracijaApstraktna;
import org.foi.nwtis.NeispravnaKonfiguracija;

/**
 * Klasa KonfiguracijaJson za rad s postavkama konfiguracije u json formatu.
 *
 * @author Dragutin Kermek
 */
public class KonfiguracijaJson extends KonfiguracijaApstraktna {

  /** Konstanta TIP. */
  public static final String TIP = "json";

  /**
   * Instancira klasu KonfiguracijaJson.
   *
   * @param nazivDatoteke Naziv datoteke
   */
  public KonfiguracijaJson(String nazivDatoteke) {
    super(nazivDatoteke);
  }

  /**
   * Spremi konfiguraciju.
   *
   * @param datoteka Naziv datoteke
   * @throws NeispravnaKonfiguracija ako nije ispravna konfiguracija
   */
  @Override
  public void spremiKonfiguraciju(String datoteka) throws NeispravnaKonfiguracija {

  }

  /**
   * Učitaj konfiguraciju.
   *
   * @throws NeispravnaKonfiguracija ako nije ispravna konfiguracija
   */
  @Override
  public void ucitajKonfiguraciju() throws NeispravnaKonfiguracija {
  }

}
