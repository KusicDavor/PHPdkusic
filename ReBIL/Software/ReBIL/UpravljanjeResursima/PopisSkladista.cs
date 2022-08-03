using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace UpravljanjeResursima
{
    public class PopisSkladista
    {
        public int SerijskiBroj { get; set; }
        public string Naziv { get; set; }
        public int? Kolicina { get; set; }
        public bool Ispravnost { get; set; }

        public PopisSkladista()
        {

        }
    }
}
