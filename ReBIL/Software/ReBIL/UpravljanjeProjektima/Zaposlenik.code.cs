using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace UpravljanjeProjektima
{
    public partial class Zaposlenik
    {
        public override string ToString()
        {
            return Ime + " " + Prezime;
        }
    }
}
