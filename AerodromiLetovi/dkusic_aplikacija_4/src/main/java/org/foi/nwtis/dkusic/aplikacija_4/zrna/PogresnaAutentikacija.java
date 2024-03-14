package org.foi.nwtis.dkusic.aplikacija_4.zrna;

public class PogresnaAutentikacija extends Exception {

  private static final long serialVersionUID = -8862599860424451266L;

  public PogresnaAutentikacija(String tekst) {
    super(tekst);
  }
  
  public void ispisPogreske(String tekst) {
    System.out.println(tekst);
  }
}
