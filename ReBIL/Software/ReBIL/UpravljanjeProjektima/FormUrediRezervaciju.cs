using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace UpravljanjeProjektima
{
    public partial class FormUrediRezervaciju : Form
    {
        Rezervacija odabranaRezervacija;
        Smjestaj odabraniSmjestaj;
        
        List<Zaposlenik> zaposleniciNaRezervaciji;
        
        public FormUrediRezervaciju(Rezervacija rezervacija, Smjestaj smjestaj)
        {
            InitializeComponent();
            odabranaRezervacija = rezervacija;
            odabraniSmjestaj = smjestaj;
            
        }

        private void FormUrediRezervaciju_Load(object sender, EventArgs e)
        {
            rezervacijaIzmjenaSmjestajLabel.Text = odabraniSmjestaj.Naziv;
            lokacijaIzmjenaRezervacijaSmjestajaLabel.Text = Repozitorij.DohvatiRezervacijaSmjestajLokacija(odabranaRezervacija);
            cijenaIzmjenaRezervacijaSmjestajaLabel.Text = Repozitorij.DohvatiRezervacijaSmjestajCijena(odabranaRezervacija);
            labelDatumOd.Text = odabranaRezervacija.DatumOd.Date.ToShortDateString();
            labelDatumDo.Text = odabranaRezervacija.DatumDo.ToShortDateString();
            zaposleniciNaRezervaciji = Repozitorij.DohvatiZaposlenikeNaRezervaciji(odabranaRezervacija);
            
            dgvZaposleniciPridruzeniIzmjena.DataSource = zaposleniciNaRezervaciji;
            dgvZaposleniciPridruzeniIzmjena.Columns["Datum"].Visible = false;
            dgvZaposleniciPridruzeniIzmjena.Columns["Opremas"].Visible = false;
            dgvZaposleniciPridruzeniIzmjena.Columns["ZaposleniciNaProjektus"].Visible = false;
            valutaLabel.Text = odabraniSmjestaj.OznakeValute.ToString();

            rezervacijaIzmjenaSmjestajaIznosLabel.Text = (dgvZaposleniciPridruzeniIzmjena.RowCount * decimal.Parse(cijenaIzmjenaRezervacijaSmjestajaLabel.Text)).ToString();

        }

        private void zatvoriButton_Click(object sender, EventArgs e)
        {
            Close();
        }
    }
}
