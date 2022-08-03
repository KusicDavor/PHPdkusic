using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;

namespace UpravljanjeResursima
{
    public class BazaPodataka
    {
        public static void DodajVozilo(Vozilo vozilo)
        {
            using (var context = new Entities())
            {
                context.Voziloes.Add(vozilo);
                context.SaveChanges();
            }
        }
        public static void IzbrisiVozilo(Vozilo vozilo)
        {
            using (var context = new Entities())
            {
                context.Voziloes.Attach(vozilo);
                context.Voziloes.Remove(vozilo);
                context.SaveChanges();
            }
        }
        public static void DodajOpremu(Oprema oprema)
        {
            using (var context = new Entities())
            {
                bool postoji = Provjera(oprema);
                if (postoji == true)
                {
                    throw new PostojiZapis();
                } 
                else
                {
                    context.Opremas.Add(oprema);
                    context.SaveChanges();
                }
            }
        }
        public static bool Provjera(Oprema oprema)
        {
            bool postoji = false;
            using (var context = new Entities())
            {
                foreach (Oprema o in context.Opremas)
                {
                    if (o.NazivOpreme == oprema.NazivOpreme && o.Oib == oprema.Oib)
                    {
                        postoji = true;
                    }
                }
                return postoji;
            }
        }
        public static void IzbrisiOpremu(Oprema oprema)
        {
            using (var context = new Entities())
            {
                context.Opremas.Attach(oprema);
                context.Opremas.Remove(oprema);
                context.SaveChanges();
            }
        }
        public static void DodajUKatalog(KatalogDijelova katalogDijelova)
        {
            using (var context = new Entities())
            {
                Dijelovi dijelovi = new Dijelovi()
                {
                    SerijskiBrojDijelova = katalogDijelova.SerijskiBrojDIjela,
                    Ispravnost = true
                };
                context.KatalogDijelovas.Add(katalogDijelova);
                context.Dijelovis.Add(dijelovi);
                context.SaveChanges();
            }
        }
        public static void IzbrisiIzKataloga(KatalogDijelova katalogDijelova)
        {
            using (var context = new Entities())
            {
                context.KatalogDijelovas.Attach(katalogDijelova);
                context.KatalogDijelovas.Remove(katalogDijelova);
                context.SaveChanges();
            }
        }
        public static List<Projekt> DohvatiProjekte()
        {
            using (var context = new Entities())
            {
                var query = from p in context.Projekts
                            select p;
                return query.ToList();
            }
        }
        public static List<KatalogDijelova> GetKatalogDijelovas()
        {
            using (var context = new Entities())
            {
                return context.KatalogDijelovas.ToList();
            }
        }
        public static List<PopisSkladista> DohvatiDijeloveKataloga()
        {
            using (var context = new Entities())
            {
                var query = from d in context.Dijelovis
                            from k in context.KatalogDijelovas
                            where d.SerijskiBrojDijelova == k.SerijskiBrojDIjela
                            select new PopisSkladista
                            {
                                SerijskiBroj = d.SerijskiBrojDijelova,
                                Naziv = k.NazivDijela,
                                Kolicina =  d.KolicinaDijelova,
                                Ispravnost = d.Ispravnost
                            };
                return query.ToList();
            }
        }
        public static List<Vozilo> GetVozilos()
        {
            using (var context = new Entities())
            {
                return context.Voziloes.ToList();
            }
        }
        public static List<Zaposlenik> GetZaposlenici()
        {
            using (var context = new Entities())
            {
                var query = from z in context.Zaposleniks
                            select z;

                return query.ToList();
            }
        }
        public static List<Oprema> GetOprema()
        {
            using (var context = new Entities())
            {
                return context.Opremas.ToList();
            }
        }
        public static void UrediKolicinu(int serijski, int kolicina)
        {
            using (var context = new Entities())
            {
                foreach (var item in context.Dijelovis)
                {
                    if (item.SerijskiBrojDijelova == serijski)
                    {
                        context.Dijelovis.Attach(item);
                        item.KolicinaDijelova = kolicina;
                    }
                }
                context.SaveChanges();
            }
        }

        public static void UrediVozilo(Vozilo odabrano, Vozilo novoVozilo)
        {
            using (var context = new Entities())
            {
                context.Voziloes.Attach(odabrano);
                odabrano.Naziv = novoVozilo.Naziv;
                odabrano.GodinaKupnje = novoVozilo.GodinaKupnje;
                odabrano.BrojSasije = novoVozilo.BrojSasije;
                odabrano.Kilometraza = novoVozilo.Kilometraza;
                odabrano.BrojPoliceOsiguranja = novoVozilo.BrojPoliceOsiguranja;
                odabrano.TablicaVozila = novoVozilo.TablicaVozila;
                odabrano.MjesecTehnickogPregleda = novoVozilo.MjesecTehnickogPregleda;
                context.SaveChanges();
            }
        }
        public static void UrediOpremu(Oprema odabranaOprema, Oprema novaOprema)
        {
            using (var context = new Entities())
            {
                context.Opremas.Attach(odabranaOprema);
                odabranaOprema.DatumKupnje = novaOprema.DatumKupnje;
                odabranaOprema.KolicinaOpreme = novaOprema.KolicinaOpreme;
                odabranaOprema.NazivOpreme = novaOprema.NazivOpreme;
                odabranaOprema.Oib = novaOprema.Oib;
                context.SaveChanges();
            }
        }
        public static void UrediKatalog(KatalogDijelova odabraniKatalog, KatalogDijelova noviKatalog)
        {
            using (var context = new Entities())
            {
                context.KatalogDijelovas.Attach(odabraniKatalog);
                odabraniKatalog.NazivDijela = noviKatalog.NazivDijela;
                context.SaveChanges();
            }
        }
        public static List<PopisSkladista> DijeloviNaProjektu(Projekt projekt)
        {
            if (projekt == null) return null;
            using (var context = new Entities())
            {
                var query = from d in context.Dijelovis
                            from dp in context.DijeloviProjektas
                            from kd in context.KatalogDijelovas
                            where d.IDDijela == dp.IDDIjela && dp.IDProjekta == projekt.IDprojekta && d.SerijskiBrojDijelova == kd.SerijskiBrojDIjela
                            select new PopisSkladista
                            {
                                SerijskiBroj = d.SerijskiBrojDijelova,
                                Naziv = kd.NazivDijela,
                                Kolicina = dp.KolicinaDijelovaNaProjektu,
                                Ispravnost = d.Ispravnost
                            };
                return query.ToList();
            }
        }

        public static bool ProvjeriImeDijela(string naziv)
        {
            using (var context = new Entities())
            {
                foreach (var item in context.KatalogDijelovas)
                {
                    if (item.NazivDijela.Replace(" ", string.Empty) == naziv)
                    {
                        return false;
                    }
                }
            }
            return true;
        }
        public static int? KolicinaDijelova(Dijelovi dio)
        {
            if (dio == null) return null;
            int? sumaDijelaPoProjektima = 0;
            using (var context = new Entities())
            {
                foreach (var item in context.DijeloviProjektas)
                {
                    if (item.IDDIjela == dio.IDDijela)
                    {
                        sumaDijelaPoProjektima += item.KolicinaDijelovaNaProjektu;
                    }
                }
            }
            return sumaDijelaPoProjektima;
        }

        public static Dijelovi Dio(int serijski)
        {
            Dijelovi dio = new Dijelovi();
            using (var context = new Entities())
            {
                foreach (var item in context.Dijelovis)
                {
                    if (item.SerijskiBrojDijelova == serijski)
                    {
                        dio = item;
                    }
                }
            }
            return dio;
        }
        public static void PodjelaDijelova(Projekt odabraniProjekt, Dijelovi odabraniDio, int kolicina)
        {
            using (var context = new Entities())
            {                
                DijeloviProjekta dijeloviProjekta = new DijeloviProjekta
                {
                    IDProjekta = odabraniProjekt.IDprojekta
                };
                foreach (var item in context.Dijelovis)
                {
                    if (item.IDDijela == odabraniDio.IDDijela)
                    {
                        dijeloviProjekta.IDDIjela = item.IDDijela;
                    }
                }
                if (odabraniDio.KolicinaDijelova > kolicina)
                {
                    dijeloviProjekta.KolicinaDijelovaNaProjektu = kolicina;
                }               
                context.DijeloviProjektas.Add(dijeloviProjekta);
                context.SaveChanges();
            }
        }
        public static void UkloniDioProjekta(Dijelovi odabraniDio, Projekt odabraniProjekt)
        {
            DijeloviProjekta dijeloviProjekta = new DijeloviProjekta();
            using (var context = new Entities())
            {               
                foreach (var item in context.DijeloviProjektas)
                {
                    if (item.IDProjekta == odabraniProjekt.IDprojekta)
                    {
                        dijeloviProjekta = item;
                    }
                }
                context.DijeloviProjektas.Attach(dijeloviProjekta);
                context.DijeloviProjektas.Remove(dijeloviProjekta);
                context.SaveChanges();
            }
        }
    }
    [Serializable]
    internal class PostojiZapis : Exception
    {
        public PostojiZapis()
        {
        }
    }
}
