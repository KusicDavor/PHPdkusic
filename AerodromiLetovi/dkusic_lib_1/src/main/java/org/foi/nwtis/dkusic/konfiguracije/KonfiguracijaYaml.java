/**
 * 
 */
package org.foi.nwtis.dkusic.konfiguracije;

import org.foi.nwtis.KonfiguracijaApstraktna;
import org.foi.nwtis.NeispravnaKonfiguracija;

/**
 * Klasa KonfiguracijaYaml za rad s postavkama konfiguracije u yaml formatu..
 *
 * @author Dragutin Kermek
 */
public class KonfiguracijaYaml extends KonfiguracijaApstraktna {
  /** Konstanta TIP. */
  public static final String TIP = "yaml";

  /**
   * Instancira klasu KonfiguracijaYaml.
   *
   * @param nazivDatoteke Naziv datoteke
   */
  public KonfiguracijaYaml(String nazivDatoteke) {
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
