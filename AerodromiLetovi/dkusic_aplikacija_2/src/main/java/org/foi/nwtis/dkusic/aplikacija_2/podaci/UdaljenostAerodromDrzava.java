package org.foi.nwtis.dkusic.aplikacija_2.podaci;

/**
 * Record za rad sa udaljenostima između aerodroma, uključuje oznaku odredišnog aerodroma i države
 * 
 * @param icao oznaka aerodroma do kojeg se izražava udaljenost
 * @param drzava oznaka države
 * @param km udaljenost kroz državu izražena u kilometrima
 * 
 */
public record UdaljenostAerodromDrzava(String icao, String drzava, float km) {
}
