using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace PrijavaDLL
{
    public class Provjera
    {
        private static Prijava PrijavljeniKorisnik;
        public static bool ProvjeriKorisnickoIme(string korisnickoIme)
        {
            using (var kontekst = new PrijavaEntities())
            {
                foreach (var objekt in kontekst.Prijava)
                {
                    if (objekt.KorisnickoIme == korisnickoIme) return true;
                }
            }
            return false;
        }
        public static bool ProvjeriUnos(string korisnickoIme, string lozinka)
        {
            using (var kontekst = new PrijavaEntities())
            {
                foreach (var objekt in kontekst.Prijava)
                {
                    if (objekt.KorisnickoIme == korisnickoIme && objekt.Lozinka == lozinka)
                    {
                        PrijavljeniKorisnik = objekt;
                        return true;
                    }
                }
            }
            return false;
        }
        public static string Prijavljeni()
        {
            string prijavljen = PrijavljeniKorisnik.Ime + "" + PrijavljeniKorisnik.Prezime;
            return prijavljen;
        }
    }
}
