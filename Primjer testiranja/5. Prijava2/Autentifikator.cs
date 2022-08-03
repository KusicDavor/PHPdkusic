using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Prijava
{
    public class FailedAuthenticationException : ApplicationException
    {
        public FailedAuthenticationException(string message)
            :base(message)
        {

        }
    }

    public class UserDeactivatedException : ApplicationException
    {
        public UserDeactivatedException(string message) : base(message)
        {

        }
    }

    public class Autentifikator
    {
        private List<Korisnik> Korisnici { get; set; }
        public Korisnik PrijavljeniKorisnik { get; private set; }

        public Autentifikator()
        {
            Korisnici = new List<Korisnik>();

            Korisnici.Add(new Korisnik { KorisnickoIme = "mmijac", Lozinka="abcde", Tip = TipKorisnika.Administrator });
            Korisnici.Add(new Korisnik { KorisnickoIme = "pivic", Lozinka = "12345", Tip = TipKorisnika.Obicni });
            Korisnici.Add(new Korisnik { KorisnickoIme = "valic", Lozinka = "ab234", Tip = TipKorisnika.Obicni });
            Korisnici.Add(new Korisnik { KorisnickoIme = "anovak", Lozinka = "qetzs", Tip = TipKorisnika.Obicni });
            Korisnici.Add(new Korisnik { KorisnickoIme = "thorvat", Lozinka = "hfdrz", Tip = TipKorisnika.Obicni });
            Korisnici.Add(new Korisnik { KorisnickoIme = "gtudor", Lozinka = "nrtgs", Tip = TipKorisnika.Obicni });
            Korisnici.Add(new Korisnik { KorisnickoIme = "btomas", Lozinka = "kgdrt", Tip = TipKorisnika.Administrator });
            Korisnici.Add(new Korisnik { KorisnickoIme = "gost", Lozinka = "gost", Tip = TipKorisnika.Gost });
        }

        public void PrijaviKorisnika(string korisnickoIme, string lozinka)
        {
            if (PrijavljeniKorisnik != null)
            {
                throw new InvalidOperationException();
            }

            if (korisnickoIme != "" && lozinka != "")
            {
                PrijavljeniKorisnik = Korisnici.FirstOrDefault(k => k.KorisnickoIme == korisnickoIme && k.Lozinka == lozinka);

                if (PrijavljeniKorisnik == null)
                {
                    throw new FailedAuthenticationException("Neispravni podaci!");
                }

                if (PrijavljeniKorisnik.Active == false)
                {
                    throw new UserDeactivatedException("Korisnik je deaktiviran!");
                }
            }

            if (korisnickoIme == "" && lozinka == "")
            {
                PrijaviKorisnika();
            }
        }

        public void PrijaviKorisnika()
        {
            PrijaviKorisnika("gost", "gost");
        }

        public void OdjaviKorisnika()
        {
            if (PrijavljeniKorisnik != null)
            {
                PrijavljeniKorisnik = null;
            }
            else
            {
                throw new InvalidOperationException("Odjava je moguća samo ukoliko je korisnik prijavljen!");
            }
        }

        public void DektivirajKorisnika(string korisnickoIme)
        {
            if (PrijavljeniKorisnik == null)
            {
                throw new InvalidOperationException();
            }

            if (PrijavljeniKorisnik.Tip != TipKorisnika.Administrator)
            {
                throw new InvalidOperationException();
            }

            var korisnik = Korisnici.FirstOrDefault(k => k.KorisnickoIme == korisnickoIme);
            if (korisnik != null)
            {
                korisnik.Active = false;
            }
        }
    }
}
