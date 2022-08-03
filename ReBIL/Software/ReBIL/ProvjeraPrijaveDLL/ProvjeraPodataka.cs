using System;
using System.Collections.Generic;

namespace ProvjeraPrijaveDLL
{
    public static class ProvjeraPodataka
    {
        public static bool ProvjeriKorisnickoIme(string upisanoKorisnickoIme, List<String> listaKorisnickihImena)
        {
            bool provjera = false;
            foreach (var korisnickoIme in listaKorisnickihImena)
            {
                if (korisnickoIme == upisanoKorisnickoIme) provjera = true;
            }
            return provjera;
        }

        public static bool ProvjeriLozinku(string upisanaLozinka, string lozinka)
        {
            bool provjera = false;
            
            if (lozinka == upisanaLozinka) provjera = true;
            
            return provjera;
        }
    }
}
