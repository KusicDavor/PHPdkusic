using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Zaposlenici
{
    public partial class Zaposlenik
    {
        public static Zaposlenik KreirajZaposlenika(string oib, string ime, string prezime, DateTime datumRođenja)
        {
            Zaposlenik novi = new Zaposlenik();
            novi.Oib = oib;
            novi.Ime = ime;
            novi.Prezime = prezime;
            novi.Datum = datumRođenja;

            return novi;
        }
    }
}
