using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Zaposlenici
{
    public class ListaZ
    {
        public List<Zaposlenik> lista { get; set; }

        public ListaZ()
        {
            lista = new List<Zaposlenik>();
            lista.Add(new Zaposlenik(184297538, "Ivan", "Horvat", "12/08/1986"));
            lista.Add(new Zaposlenik(615299097, "Dražen", "Martinović", "16/12/1995"));
            lista.Add(new Zaposlenik(467821952, "Ivica", "Lončar", "08/10/1989"));
            lista.Add(new Zaposlenik(573274873, "Bruno", "Marić", "24/12/1982"));
            lista.Add(new Zaposlenik(406236884, "Krešimir", "Kovač", "09/02/1988"));
        }

        public List<Zaposlenik> DohvatiListu()
        {
            return lista;
        }
    }
}
