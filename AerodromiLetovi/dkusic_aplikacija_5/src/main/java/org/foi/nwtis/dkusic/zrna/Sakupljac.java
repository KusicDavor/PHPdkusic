package org.foi.nwtis.dkusic.zrna;

import java.util.ArrayList;
import java.util.List;
import jakarta.ejb.Singleton;

/**
 * 
 * Singleton razred koji služi za sakupljanje JMS poruka. Ovaj razred sadrži listu poruka te nudi
 * metode za dodavanje poruka i dohvaćanje određenog raspona poruka.
 */
@Singleton
public class Sakupljac {
  private static List<String> listaPoruka = new ArrayList<String>();

  public static void dodajPorukuUlistu(String poruka) {
    listaPoruka.add(poruka);
  }

  public static List<String> dohvatiListuPoruka(int odBroja, int broj) {
    odBroja--;
    broj = odBroja + broj;
    
    if (broj > listaPoruka.size()) {
      broj = listaPoruka.size();
    }
    
    if (odBroja > broj) {
      return new ArrayList<String>();
    }
    
    return listaPoruka.subList(odBroja, broj);
  }
  
  public static void ocistiListu() {
    listaPoruka.clear();
  }
}