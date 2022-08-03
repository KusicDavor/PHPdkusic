using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;

namespace Zaposlenici
{
    public class Repozitorij
    {
        public static List<Zaposlenik> DohvatiListuZaposlenika()
        {
            using (var context = new EntitiesZaposlenici())
            {
                var query = from z in context.Zaposleniks
                            select z;

                return query.ToList();
            }
        }

        public static void RegistrirajZaposlenika(Zaposlenik zaposlenik)
        {
            bool postoji = false;
            using (var context = new EntitiesZaposlenici())
            {
                foreach (var z in context.Zaposleniks)
                {
                    if (z.Oib == zaposlenik.Oib)
                    {
                        postoji = true;
                        throw new OibPostojiException();
                    }
                }

                if (!postoji)
                {
                    context.Zaposleniks.Add(zaposlenik);
                    context.SaveChanges();
                }

            }
        }

        [Serializable]
        internal class OibPostojiException : Exception
        {
            public OibPostojiException()
            {
            }
        }        
        public static List<Zaposlenik> DohvatiPodjelu(Projekt odabran)
        {
            using (var context = new EntitiesZaposlenici())
            {
                var query = from z in context.Zaposleniks
                            from zp in context.ZaposleniciNaProjektus
                            where zp.IDProjekta == odabran.IDprojekta && zp.OIB == z.Oib
                            select z;
                return query.ToList();
            }
        }
        
        public static void ObrišiZaposlenika(Zaposlenik odabran)
        {
            using (var context = new EntitiesZaposlenici())
            {
                context.Zaposleniks.Attach(odabran);
                context.Zaposleniks.Remove(odabran);
                context.SaveChanges();

                ObrišiVoditeljaObrisanogZaposlenika(odabran);
            }
        }

        public static void ObrišiVoditeljaObrisanogZaposlenika(Zaposlenik odabran)
        {
            using (var context = new EntitiesZaposlenici())
            {
                foreach (Projekt p in context.Projekts)
                {
                    if (p.VoditeljRadilišta == odabran.Ime + " " + odabran.Prezime)
                    {
                        p.VoditeljRadilišta = "Nije postavljen";

                    }
                }
                context.SaveChanges();
            }
        }

        public static void Podjela(Projekt odabraniP, Zaposlenik odabraniZ)
        {
            using  (var context = new EntitiesZaposlenici())
            {
                ZaposleniciNaProjektu novaPodjela = new ZaposleniciNaProjektu
                {
                    IDProjekta = odabraniP.IDprojekta,
                    OIB = odabraniZ.Oib
                };
                context.ZaposleniciNaProjektus.Add(novaPodjela);
                context.SaveChanges();
            }
        }
        public static bool ProvjeraPodjele(Projekt odabraniP, Zaposlenik odabraniZ)
        {
            using (var context = new EntitiesZaposlenici())
            {
                foreach (var item in context.ZaposleniciNaProjektus)
                {
                    if (item.IDProjekta == odabraniP.IDprojekta && item.OIB == odabraniZ.Oib) return true;
                }
            }
            return false;
        }

        public static void UkloniZaposlenikaSProjekta(Zaposlenik odabraniZ, Projekt odabraniP)
        {
            ZaposleniciNaProjektu unosZaBrisanje = new ZaposleniciNaProjektu();
            using (var context = new EntitiesZaposlenici())
            {
                foreach (var item in context.ZaposleniciNaProjektus)
                {
                    if (item.IDProjekta == odabraniP.IDprojekta && item.OIB == odabraniZ.Oib) unosZaBrisanje = item;
                }
                context.ZaposleniciNaProjektus.Attach(unosZaBrisanje);
                context.ZaposleniciNaProjektus.Remove(unosZaBrisanje);
                context.SaveChanges();
            }
        }

        public static void AžurirajZaposlenika(Zaposlenik noviZaposlenik)
        {
            using (var context = new EntitiesZaposlenici())
            {
                foreach (Zaposlenik z in context.Zaposleniks)
                {
                    if (z.Oib == noviZaposlenik.Oib)
                    {
                        z.Ime = noviZaposlenik.Ime;
                        z.Prezime = noviZaposlenik.Prezime;
                        z.Datum = noviZaposlenik.Datum;
                    }
                }
                context.SaveChanges();
            }
        }

        public static List<Projekt> DohvatiProjekte()
        {
            using (var context = new EntitiesZaposlenici())
            {
                var query = from p in context.Projekts
                            select p;

                return query.ToList();
            }
        }
    }
}
