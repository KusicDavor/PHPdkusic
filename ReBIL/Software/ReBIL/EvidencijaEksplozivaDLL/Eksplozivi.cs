using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace EvidencijaEksplozivaDLL
{
    public class Eksplozivi
    {
        public static Projekt OznaceniProjekt;
        public static List<Eksploziv> DohvatiListuEksploziva()
        {
            using (var kontekst = new EntitiesEksplozivi())
            {
                var upit = from u in kontekst.Eksplozivs
                           where u.IDProjekta == OznaceniProjekt.IDprojekta
                           select u;
                return upit.ToList();
            }
        }
        public static void DodajEksplozivnoSredstvo(Eksploziv novoSredstvo)
        {
            using (var kontekst = new EntitiesEksplozivi())
            {
                kontekst.Eksplozivs.Add(novoSredstvo);
                kontekst.SaveChanges();
            }
        }

        public static void AzurirajEksplozivnoSredstvo(Eksploziv noviPodaci, Eksploziv stariPodaci)
        {
            using (var kontekst = new EntitiesEksplozivi())
            {
                kontekst.Eksplozivs.Attach(stariPodaci);
                stariPodaci.Oznaka = noviPodaci.Oznaka;
                stariPodaci.Status = noviPodaci.Status;
                stariPodaci.Vrsta = noviPodaci.Vrsta;
                stariPodaci.Tezina = noviPodaci.Tezina;
                stariPodaci.Kolicina = noviPodaci.Kolicina;
                kontekst.SaveChanges();
            }
        }
        public static void IzbrisiSredstvo(Eksploziv oznaceniEksploziv)
        {
            using (var kontekst = new EntitiesEksplozivi())
            {
                kontekst.Eksplozivs.Attach(oznaceniEksploziv);
                kontekst.Eksplozivs.Remove(oznaceniEksploziv);
                kontekst.SaveChanges();
            }
        }
    }
}
