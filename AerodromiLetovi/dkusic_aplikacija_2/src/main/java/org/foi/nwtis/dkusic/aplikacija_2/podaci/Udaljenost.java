package org.foi.nwtis.dkusic.aplikacija_2.podaci;

/**
 * Record za rad sa udaljenostima između aerodroma
 * 
 * @param drzava država kroz koju se računa udaljenost
 * @param km udaljenost kroz državu izražena u kilometrima
 * 
 */
public record Udaljenost(String drzava, float km) {
}
