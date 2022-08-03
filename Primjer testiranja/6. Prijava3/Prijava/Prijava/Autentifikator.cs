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

    public class IncorrectAuthenticationData : ApplicationException
    {
        public IncorrectAuthenticationData() : base()
        {

        }
    }

    public class UnauthorizedRegistrationException : ApplicationException
    {
        public UnauthorizedRegistrationException() : base()
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
            Korisnici.Add(new Korisnik { KorisnickoIme = "thorvat", Lozinka = "hfdrz", Tip = TipKorisnika.Obicni, Aktivan = false });
            Korisnici.Add(new Korisnik { KorisnickoIme = "gtudor", Lozinka = "nrtgs", Tip = TipKorisnika.Obicni });
            Korisnici.Add(new Korisnik { KorisnickoIme = "btomas", Lozinka = "kgdrt", Tip = TipKorisnika.Administrator });
            Korisnici.Add(new Korisnik { KorisnickoIme = "gost", Lozinka = "gost", Tip = TipKorisnika.Gost });
        }

        public void PrijaviKorisnika(string korisnickoIme, string lozinka)
        {
            if (korisnickoIme != "" && lozinka != "")
            {
                PrijavljeniKorisnik = Korisnici.FirstOrDefault(k => k.KorisnickoIme == korisnickoIme && k.Lozinka == lozinka);
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

        public void RegistrirajKorisnika(string korisnickoIme, string lozinka)
        {
            RegistrirajKorisnika(korisnickoIme, lozinka, TipKorisnika.Obicni);
        }

        public void RegistrirajKorisnika(string korisnickoIme, string lozinka, TipKorisnika tip)
        {
            if (lozinka.Length < 5)
            {
                throw new IncorrectAuthenticationData();
            }

            if (Korisnici.Exists(x => x.KorisnickoIme == korisnickoIme && x.Aktivan == true))
            {
                throw new IncorrectAuthenticationData();
            }

            if (Korisnici.Exists(x => x.KorisnickoIme == korisnickoIme && x.Aktivan == false))
            {
                var neaktivanKorisnik = Korisnici.First(x => x.KorisnickoIme == korisnickoIme);
                neaktivanKorisnik.Aktivan = true;
                return;
            }

            if (korisnickoIme.Length < 5)
            {
                throw new IncorrectAuthenticationData();
            }

            if (tip == TipKorisnika.Gost)
            {
                return;
            }

            if (tip == TipKorisnika.Administrator && (PrijavljeniKorisnik == null || PrijavljeniKorisnik.Tip != TipKorisnika.Administrator))
            {
                throw new UnauthorizedRegistrationException();
            }

            Korisnik korisnik = new Korisnik
            {
                KorisnickoIme = korisnickoIme,
                Lozinka = lozinka,
                Tip = tip
            };

            Korisnici.Add(korisnik);
        }

        public Korisnik DohvatiKorisnika(string korisnickoIme)
        {
            var korisnik = Korisnici.FirstOrDefault(k => k.KorisnickoIme == korisnickoIme);

            if (Korisnici.Exists(x => x.KorisnickoIme == korisnickoIme && x.Aktivan == false))
            {
                return null;
            }

            return korisnik;
        }
    }
}
