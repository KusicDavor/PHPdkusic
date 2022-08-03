using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Globalization;

namespace UpravljanjeResursima
{
    public class TransportnoVozilo
    {
        public string VrstaVozila { get; set; }
        public DateTime GodinaKupnje { get; set; }
        public int BrojSasije { get; set; }
        public int Kilometraza { get; set; }
        public string MjesecTehnickogPregleda { get; set; }
        public string TablicaVozila { get; set; }
        public string BrojPoliceOsiguranja { get; set; }

        public TransportnoVozilo(string vrstaVozila, string godinaKupnje, int brojSasije, int kilometraza, string mjesecTehnickogPregleda, string tablicaVozila, string brojPoliceOsiguranja)
        {
            VrstaVozila = vrstaVozila;
            GodinaKupnje = DateTime.ParseExact(godinaKupnje,"dd/MM/yyyy", CultureInfo.CurrentCulture);
            BrojSasije = brojSasije;
            Kilometraza = kilometraza;
            MjesecTehnickogPregleda = mjesecTehnickogPregleda;
            TablicaVozila = tablicaVozila;
            BrojPoliceOsiguranja = brojPoliceOsiguranja;
        }
    }
}
