using System;
using System.Collections.Generic;
using System.Linq;
using System.Data.Entity;

namespace UpravljanjeProjektima
{
    public class Repozitorij
    {
        public static List<Projekt> DohvatiListuProjekata()
        {
            using (var context = new PI2221_DBEntities7())
            {
                var query = from p in context.Projekts
                            select p;

                return query.ToList();
            }
        }

        public static List<string> DohvatiVoditelje()
        {
            using (var context = new PI2221_DBEntities7())
            {
                var query = from z in context.Zaposleniks
                            select z.Ime + " " + z.Prezime + ", " + z.Oib;

                return query.ToList();
            }
        }

        public static Statistika DohvatiStatistiku(Projekt odabraniProjekt)
        {

            Statistika statistika = new Statistika();

            using (var context = new PI2221_DBEntities7())
            {
                

                statistika.NazivProjekta = odabraniProjekt.ImeProjekta;

                context.Projekts.Attach(odabraniProjekt);

                var brojznp = (from p in context.Projekts
                              where p.IDprojekta == odabraniProjekt.IDprojekta
                              from zp in context.ZaposleniciNaProjektus
                              where zp.IDProjekta == p.IDprojekta
                              select zp).Count();

                statistika.BrojZNP = int.Parse(brojznp.ToString());

                var brojpes = (from p in context.Projekts
                              where p.IDprojekta == odabraniProjekt.IDprojekta
                              from e in p.Eksplozivs
                              select e).Count();

                statistika.BrojPES = int.Parse(brojpes.ToString());

                var brojar = (from p in context.Projekts
                             where p.IDprojekta == odabraniProjekt.IDprojekta
                             from d in p.Dokumentacijas
                             where d.Rok >= DateTime.Now
                             select d).Count();

                statistika.BrojAR = int.Parse(brojar.ToString());

                var brojzr = (from p in context.Projekts
                              where p.IDprojekta == odabraniProjekt.IDprojekta
                              from d in p.Dokumentacijas
                              where d.Rok < DateTime.Now
                              select d).Count();

                statistika.BrojZR = int.Parse(brojzr.ToString());

                var brojrez = (from p in context.Projekts
                               where p.IDprojekta== odabraniProjekt.IDprojekta
                               from zp in p.ZaposleniciNaProjektus
                               from r in zp.Rezervacijas
                               select r).Distinct().Count();

                statistika.BrojRezervacija = int.Parse(brojrez.ToString());


            }
            return statistika;
        }

        public static List<Dokumentacija> DohvatiListuRokova(Projekt odabraniProjekt)
        {
            List<Dokumentacija> dokumentacija = new List<Dokumentacija>();
            using (var context = new PI2221_DBEntities7())
            {
                dokumentacija = context.Dokumentacijas.ToList();
            }

            return dokumentacija;
        }

        public static void DodajDokumentaciju(Dokumentacija dok, Projekt odabrani)
        {
            using (var context = new PI2221_DBEntities7())
            {
                context.Projekts.Attach(odabrani);
                context.Dokumentacijas.Add(dok);
                context.SaveChanges();
            }
        }

        public static void AžurirajDokumentaciju(Dokumentacija odabraniDokument, Dokumentacija ažurirani, Projekt odabraniProjekt)
        {
            using (var context = new PI2221_DBEntities7())
            {
                context.Dokumentacijas.Attach(odabraniDokument);
                odabraniDokument.Naziv = ažurirani.Naziv;
                odabraniDokument.Rok = ažurirani.Rok;
                odabraniDokument.Status = ažurirani.Status;
                context.SaveChanges();
            }
        }

        public static void IzbrisiRok(Dokumentacija odabraniDokument)
        {
            using (var context = new PI2221_DBEntities7())
            {
                context.Dokumentacijas.Attach(odabraniDokument);
                context.Dokumentacijas.Remove(odabraniDokument);
                context.SaveChanges();
            }
        }

        public static void IzmjeniRok(string nazivDokumenta, DateTime datum, string status, Dokumentacija rok)
        {
            using (var context = new PI2221_DBEntities7())
            {
                context.Dokumentacijas.Attach(rok);

                rok.Naziv = nazivDokumenta;
                rok.Rok = datum;
                rok.Status = status;

                context.SaveChanges();
            }

        }

        public static void DodajProjekt(Projekt novi)
        {
            using (var context = new PI2221_DBEntities7())
            {
                context.Projekts.Add(novi);
                context.SaveChanges();
            }
        }

        public static void ObrisiProjekt(Projekt projekt)
        {
            using (var context = new PI2221_DBEntities7())
            {
                context.Projekts.Attach(projekt);
                context.Projekts.Remove(projekt);
                context.SaveChanges();
            }
        }

        public static void AžurirajProjekt(Projekt odabran, Projekt novi)
        {
            using (var context = new PI2221_DBEntities7())
            {
                context.Projekts.Attach(odabran);
                odabran.ImeProjekta = novi.ImeProjekta;
                odabran.VoditeljRadilišta = novi.VoditeljRadilišta;
                context.SaveChanges();
            }
        }

        public static void IzbrisiRezervaciju(Rezervacija odabranaRezervacija)
        {
            using (var context = new PI2221_DBEntities7())
            {
                context.Rezervacijas.Attach(odabranaRezervacija);
                context.Rezervacijas.Remove(odabranaRezervacija);
                context.SaveChanges();
            }
        }

        public static List<Smjestaj> DohvatiSmjestaje()
        {
            List<Smjestaj> smjestaji;
            using (var context = new PI2221_DBEntities7())
            {
                smjestaji = context.Smjestajs.ToList();
                return smjestaji;
            }
        }

        public static List<Zaposlenik> DohvatiMoguceZaposlenike(Projekt projekt, Rezervacija rezervacija)
        {
            List<Zaposlenik> comboBoxZaposlenici = new List<Zaposlenik>();
            List<Zaposlenik> zaposleniciProjekta = new List<Zaposlenik>();
            List<ZaposleniciNaProjektu> zaposleniciNaProjektuBezRezervacije = new List<ZaposleniciNaProjektu>();
            using (var context = new PI2221_DBEntities7())
            {
                context.Configuration.LazyLoadingEnabled = false;
                //ZaposleniciNaProjektus s ucitanim navigacijskim svojstvom Rezervacijas 
                var queryZaposleniciProjektus = (from zp in context.ZaposleniciNaProjektus
                                                      where zp.IDProjekta == projekt.IDprojekta && zp.Rezervacijas.Count == 0
                                                      select zp).Include(zp => zp.Rezervacijas);
                zaposleniciNaProjektuBezRezervacije = queryZaposleniciProjektus.ToList();
                //Zaposlenici na projektu
                var zaposleniciNaProjektu = (from z in context.Zaposleniks
                                             from zp in context.ZaposleniciNaProjektus
                                             where zp.IDProjekta == projekt.IDprojekta && z.Oib == zp.OIB
                                             select z).Include(z => z.ZaposleniciNaProjektus);
                zaposleniciProjekta = zaposleniciNaProjektu.ToList();


                //Pridruzi zaposlenike "zaposleniciNaProjektuBezRezervacije"
                var zaposleniciBezRezervacije = from z in zaposleniciProjekta
                                                from zp in zaposleniciNaProjektuBezRezervacije
                                                where z.Oib == zp.OIB
                                                select z;
                comboBoxZaposlenici = zaposleniciBezRezervacije.ToList();
            }
            return comboBoxZaposlenici;
        }

        public static List<Valuta> DohvatiValute()
        {
            List<Valuta> valute;
            using (var context = new PI2221_DBEntities7())
            {
                valute = context.Valutas.ToList();
                return valute;
            }
        }

        public static void DodajSmjestaj(string naziv, string lokacija, decimal cijena, string oznakaValute, Valuta valuta )
        {
            using (var context = new PI2221_DBEntities7())
            {
                context.Valutas.Attach(valuta);

                Smjestaj noviSmjestaj = new Smjestaj
                {
                    Naziv = naziv,
                    Lokacija = lokacija,
                    CijenaPoOsobi = cijena,
                    OznakeValute = oznakaValute,
                    Valuta = valuta
                    


                };

                context.Smjestajs.Add(noviSmjestaj);
                context.SaveChanges();

            }
        }

        public static void UrediSmjestaj(Smjestaj odabran, string naziv, string lokacija, decimal cijena, string oznakaValute, Valuta valuta)
        {
            using (var context = new PI2221_DBEntities7())
            {
                context.Smjestajs.Attach(odabran);
                context.Valutas.Attach(valuta);

                odabran.Naziv = naziv;
                odabran.Lokacija = lokacija;
                odabran.CijenaPoOsobi = cijena;
                odabran.OznakeValute = oznakaValute;
                odabran.Valuta = valuta;
                context.SaveChanges();
            }
        }

        public static void ObrisiSmjestaj(Smjestaj odabran)
        {
            using (var context = new PI2221_DBEntities7())
            {
                context.Smjestajs.Attach(odabran);
                context.Smjestajs.Remove(odabran);
                context.SaveChanges();
            }
        }
        
        public static List<Zaposlenik> DohvatiZaposlenikeNaProjektu(Projekt projekt)
        {
            List<Zaposlenik> zaposlenici;
            
            using (var context = new PI2221_DBEntities7())
            {
                context.Projekts.Attach(projekt);
                var query = from z in context.ZaposleniciNaProjektus
                            where z.IDProjekta == projekt.IDprojekta
                            select z.Zaposlenik;
                            

                zaposlenici = query.ToList();
                
            }

            return zaposlenici;
            
            
        }

        public static void IzmjeniRezervaciju(DateTime datumOd, DateTime datumDo, List<Zaposlenik> zaposleniciNaRezervaciji, Rezervacija staraRezervacija, Projekt odabraniProjekt, List<Zaposlenik> stariPopis)
        {
            using (var context = new PI2221_DBEntities7())
            {
                var query = from z in context.ZaposleniciNaProjektus
                            where z.IDProjekta == odabraniProjekt.IDprojekta
                            select z;

                List<ZaposleniciNaProjektu> listaZaposlenikaNaProjektu = query.ToList();

                List<ZaposleniciNaProjektu> staraListaZaposlenikaNaProjektuRezervacija = new List<ZaposleniciNaProjektu>();

                for (int i = 0; i < stariPopis.Count; i++)
                {
                    for (int j = 0; j < listaZaposlenikaNaProjektu.Count; j++)
                    {
                        if (listaZaposlenikaNaProjektu[j].OIB == stariPopis[i].Oib)
                            staraListaZaposlenikaNaProjektuRezervacija.Add(listaZaposlenikaNaProjektu[j]);
                    }
                }


               

                

                staraRezervacija.ZaposleniciNaProjektus.Clear();

                context.Rezervacijas.Attach(staraRezervacija);

                

                 foreach (var item in staraListaZaposlenikaNaProjektuRezervacija)
                 {
                     context.ZaposleniciNaProjektus.Attach(item);
                     item.Rezervacijas.Remove(staraRezervacija);
                 }

                 context.SaveChanges();
                

                List<ZaposleniciNaProjektu> listaZaposlenikaNaProjektuRezervacija = new List<ZaposleniciNaProjektu>();

                for (int i = 0; i < zaposleniciNaRezervaciji.Count; i++)
                {
                    for (int j = 0; j < listaZaposlenikaNaProjektu.Count; j++)
                    {
                        if (listaZaposlenikaNaProjektu[j].OIB == zaposleniciNaRezervaciji[i].Oib)
                            listaZaposlenikaNaProjektuRezervacija.Add(listaZaposlenikaNaProjektu[j]);
                    }
                }


                staraRezervacija.DatumOd = datumOd;
                staraRezervacija.DatumDo = datumDo;

                context.SaveChanges();


                foreach (var item in listaZaposlenikaNaProjektuRezervacija)
                {
                    context.ZaposleniciNaProjektus.Attach(item);
                    item.Rezervacijas.Add(staraRezervacija);
                }

                context.SaveChanges();


            }
        }

        public static void DodajRezervaciju(System.DateTime datumOd, System.DateTime datumDo, Smjestaj smjestaj, Projekt odabraniProjekt, List<Zaposlenik> listaZaposlenika)
        {
            using (var context = new PI2221_DBEntities7())
            {
                
                var query = from z in context.ZaposleniciNaProjektus
                            where z.IDProjekta == odabraniProjekt.IDprojekta
                            select z;

                List<ZaposleniciNaProjektu> listaZaposlenikaNaProjektu = query.ToList();
                
                List<ZaposleniciNaProjektu> listaZaposlenikaNaProjektuRezervacija = new List<ZaposleniciNaProjektu>();

                for (int i = 0; i < listaZaposlenika.Count; i++)
                {
                    for (int j = 0; j < listaZaposlenikaNaProjektu.Count; j++)
                    {
                        if(listaZaposlenikaNaProjektu[j].OIB == listaZaposlenika[i].Oib)
                            listaZaposlenikaNaProjektuRezervacija.Add(listaZaposlenikaNaProjektu[j]);
                    }
                }


                context.Smjestajs.Attach(smjestaj);

                Rezervacija novaRezervacija = new Rezervacija();
                novaRezervacija.IDSmjestaj = smjestaj.IDSmjestaj;
                novaRezervacija.DatumOd = datumOd;
                novaRezervacija.DatumDo = datumDo;
                novaRezervacija.Smjestaj = smjestaj;

                context.Rezervacijas.Add(novaRezervacija);
                context.SaveChanges();

                //context.Rezervacijas.Attach(novaRezervacija);
                //novaRezervacija.ZaposleniciNaProjektus = listaZaposlenikaNaProjektuRezervacija;

                foreach (var item in listaZaposlenikaNaProjektuRezervacija)
                {
                    context.ZaposleniciNaProjektus.Attach(item);
                    item.Rezervacijas.Add(novaRezervacija);
                }

                context.SaveChanges();
            }
             
        }
       
        public static List<Rezervacija> DohvatiRezervacije(Projekt projekt)
        {
            List<Rezervacija> listaDohvacenihRezervacija;

            using (var context = new PI2221_DBEntities7())
            {
                
                var query = from z in context.ZaposleniciNaProjektus
                            where z.IDProjekta == projekt.IDprojekta
                            from r in context.Rezervacijas
                            from p in z.Rezervacijas
                            where r.IDRezervacija == p.IDRezervacija
                            select p;
                
                

                listaDohvacenihRezervacija = query.Distinct().ToList();


            }

            return listaDohvacenihRezervacija;
        }

        public static string DohvatiRezervacijaSmjestajLokacija(Rezervacija rezervacija)
        {
            string lokacija = "";
            using (var context = new PI2221_DBEntities7())
            {
                foreach (var item in context.Smjestajs)
                {
                    if (item.IDSmjestaj == rezervacija.IDSmjestaj) lokacija = item.Lokacija;
                }
            }
            return lokacija;
        }

        public static string DohvatiRezervacijaSmjestajCijena(Rezervacija rezervacija)
        {
            string cijena = "";
            using (var context = new PI2221_DBEntities7())
            {
                foreach (var item in context.Smjestajs)
                {
                    if (item.IDSmjestaj == rezervacija.IDSmjestaj) cijena = item.CijenaPoOsobi.ToString();
                }
                return cijena;
            }
        }

        public static List<Zaposlenik> DohvatiZaposlenikeNaRezervaciji(Rezervacija rezervacija)
        {
            
            using (var context = new PI2221_DBEntities7())
            {
                context.Rezervacijas.Attach(rezervacija);

                
                List<ZaposleniciNaProjektu> meduRezultat = new List<ZaposleniciNaProjektu>();
                foreach (var item in rezervacija.ZaposleniciNaProjektus)
                {
                    meduRezultat.Add(item);
                }
                List<string> lista = new List<string>();

                foreach (var item in meduRezultat)
                {
                    lista.Add(item.OIB);
                }

                var query = from z in context.Zaposleniks
                            from p in lista
                            where z.Oib == p
                            select z;






                List < Zaposlenik > result = new List<Zaposlenik>();
                result = query.ToList();
                return result;
            }
        }

        //Podjela vozila po projektima
        public static void DodajVoziloNaProjekt(Projekt projekt, Vozilo odabranoVozilo)
        {
            using (var kontekst = new PI2221_DBEntities7())
            {
                kontekst.Configuration.LazyLoadingEnabled = false;
                List<ZaposleniciNaProjektu> zaposleniciNaProjektus = new List<ZaposleniciNaProjektu>();
                foreach (var item in (kontekst.ZaposleniciNaProjektus).Include(zp => zp.Voziloes))
                {
                    if (item.IDProjekta == projekt.IDprojekta) zaposleniciNaProjektus.Add(item);
                }
                foreach (var vozilo in kontekst.Voziloes)
                {
                    foreach (var zaposlenik in zaposleniciNaProjektus)
                    {
                        if (vozilo.IDVozila == odabranoVozilo.IDVozila)
                        {
                            vozilo.ZaposleniciNaProjektus.Add(zaposlenik);
                        }
                    }
                }
                kontekst.SaveChanges();
            }
        }

        public static List<Vozilo> DohvatiSvaVozilaNaProjektu(List<Vozilo> vozilaDodanaNaProjekt)
        {
            List<Vozilo> svaVozila = new List<Vozilo>();
            List<Vozilo> vozilaBezProjekta = new List<Vozilo>();
            using (var kontekt = new PI2221_DBEntities7())
            {
                var upit = from v in kontekt.Voziloes
                           select v;
                svaVozila = upit.ToList();
            }
            vozilaBezProjekta = svaVozila.Where(v => vozilaDodanaNaProjekt.All(v2 => v2.IDVozila != v.IDVozila)).ToList();
            return vozilaBezProjekta;
        }

        public static List<Vozilo> DohvatiVozilaNaProjektu(Projekt projekt)
        {
            using (var kontekst = new PI2221_DBEntities7())
            {
                var upit = (from z in kontekst.ZaposleniciNaProjektus
                            where z.IDProjekta == projekt.IDprojekta
                            from v in kontekst.Voziloes
                            from l in z.Voziloes
                            where v.IDVozila == l.IDVozila
                            select l).Distinct();
                return upit.ToList();
            }
        }

        public static void IzbrisiVoziloNaProjektu(Projekt projekt, Vozilo odabranoVozilo)
        {
            using (var kontekst = new PI2221_DBEntities7())
            {
                kontekst.Configuration.LazyLoadingEnabled = false;
                List<ZaposleniciNaProjektu> zaposleniciNaProjektus = new List<ZaposleniciNaProjektu>();
                foreach (var item in (kontekst.ZaposleniciNaProjektus).Include(zp => zp.Voziloes))
                {
                    if (item.IDProjekta == projekt.IDprojekta) zaposleniciNaProjektus.Add(item);
                }
                
                foreach (var vozilo in kontekst.Voziloes.Include(v => v.ZaposleniciNaProjektus))
                {
                    foreach (var zaposlenik in zaposleniciNaProjektus)
                    {
                        if (vozilo.IDVozila == odabranoVozilo.IDVozila)
                        {
                            kontekst.Voziloes.Attach(vozilo);
                            vozilo.ZaposleniciNaProjektus.Remove(zaposlenik);
                        }
                    }
                }
                
                kontekst.SaveChanges();
            }
        }
    }   
}
