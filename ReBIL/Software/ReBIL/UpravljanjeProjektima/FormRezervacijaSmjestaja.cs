using System;
using System.Collections.Generic;
using System.Drawing;
using System.Windows.Forms;

namespace UpravljanjeProjektima
{
    public partial class FormRezervacijaSmjestaja : Form
    {
        List<Zaposlenik> listaZaposlenika;
        List<Zaposlenik> zaposleniciDGV = new List<Zaposlenik>();
        Zaposlenik odabraniZaposlenik;
        Smjestaj smjestaj;
        Projekt projekt;
        public FormRezervacijaSmjestaja(Smjestaj odabraniSmjestaj, Projekt odabraniProjekt)
        {
            InitializeComponent();
            smjestaj = odabraniSmjestaj;
            projekt = odabraniProjekt;

        }

        private void FormRezervacijaSmjestaja_Load(object sender, EventArgs e)
        {
            rezervacijaSmjestajLabel.Text = smjestaj.Naziv;
            lokacijaRezervacijaSmjestajaLabel.Text = smjestaj.Lokacija;
            cijenaRezervacijaSmjestajaLabel.Text = smjestaj.CijenaPoOsobi.ToString();
            listaZaposlenika = Repozitorij.DohvatiZaposlenikeNaProjektu(projekt);
            rezervacijaSmjestajaZaposlenikComboBox.DataSource = listaZaposlenika;
            rezervacijaSmjestajaIznosLabel.Text = (dgvZaposleniciPridruzeniRezervaciji.RowCount * decimal.Parse(cijenaRezervacijaSmjestajaLabel.Text)).ToString();
            rezervirajSmjestajButton.Enabled = false;
            rezervacijaSmjestajaPlusButton.Enabled = false;
            rezervacijaSmjestajaMinusButton.Enabled = false;
            valutaLabel.Text = smjestaj.OznakeValute.ToString();


        }

        private void rezervacijaSmjestajaPlusButton_Click(object sender, EventArgs e)
        {
            odabraniZaposlenik = rezervacijaSmjestajaZaposlenikComboBox.SelectedItem as Zaposlenik;
            zaposleniciDGV.Add(odabraniZaposlenik);
            dgvZaposleniciPridruzeniRezervaciji.DataSource = null;
            dgvZaposleniciPridruzeniRezervaciji.DataSource = zaposleniciDGV;
            dgvZaposleniciPridruzeniRezervaciji.Columns["ZaposleniciNaProjektus"].Visible = false;
            dgvZaposleniciPridruzeniRezervaciji.Columns["Datum"].Visible = false;
            listaZaposlenika.Remove(odabraniZaposlenik);
            rezervacijaSmjestajaZaposlenikComboBox.DataSource = null;
            rezervacijaSmjestajaZaposlenikComboBox.DataSource = listaZaposlenika;
            rezervacijaSmjestajaIznosLabel.Text = (dgvZaposleniciPridruzeniRezervaciji.RowCount * decimal.Parse(cijenaRezervacijaSmjestajaLabel.Text)).ToString();
            //rezervacijaSmjestajaMinusButton.Enabled = true;
            if (rezervacijaSmjestajaZaposlenikComboBox.SelectedItem == null)
            {
                rezervacijaSmjestajaPlusButton.Enabled = false;
                rezervacijaSmjestajaMinusButton.Enabled = true;
            }


        }

        private void rezervacijaSmjestajaMinusButton_Click(object sender, EventArgs e)
        {
            odabraniZaposlenik = dgvZaposleniciPridruzeniRezervaciji.CurrentRow.DataBoundItem as Zaposlenik;
            listaZaposlenika.Add(odabraniZaposlenik);
            zaposleniciDGV.Remove(odabraniZaposlenik);
            rezervacijaSmjestajaZaposlenikComboBox.DataSource = null;
            rezervacijaSmjestajaZaposlenikComboBox.DataSource = listaZaposlenika;
            dgvZaposleniciPridruzeniRezervaciji.DataSource = null;
            dgvZaposleniciPridruzeniRezervaciji.DataSource = zaposleniciDGV;
            dgvZaposleniciPridruzeniRezervaciji.Columns["ZaposleniciNaProjektus"].Visible = false;
            dgvZaposleniciPridruzeniRezervaciji.Columns["Datum"].Visible = false;
            rezervacijaSmjestajaIznosLabel.Text = (dgvZaposleniciPridruzeniRezervaciji.RowCount * decimal.Parse(cijenaRezervacijaSmjestajaLabel.Text)).ToString();

            

        }

        private void odustaniRezervacijaButton_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void rezervirajSmjestajButton_Click(object sender, EventArgs e)
        {


            int idSmjestaj = smjestaj.IDSmjestaj;
            System.DateTime datumOd = rezervacijaSmjestajaOdDTP.Value;
            System.DateTime datumDo = rezervacijaSmjestajaDoDTP.Value;




            Repozitorij.DodajRezervaciju(datumOd, datumDo, smjestaj, projekt, zaposleniciDGV);
            Close();
        }

        private void rezervacijaSmjestajaZaposlenikComboBox_DropDown(object sender, EventArgs e)
        {
            if (rezervacijaSmjestajaZaposlenikComboBox.Items.Count == 0)
            {
                porukaRezervacijaComboBox.ForeColor = Color.Red;
                porukaRezervacijaComboBox.Text = "Projekt nema dodijeljenih zaposlenika.";

            }

            else
            {
                rezervacijaSmjestajaPlusButton.Enabled = true;


            }
        }

        private void dgvZaposleniciPridruzeniRezervaciji_RowsAdded(object sender, DataGridViewRowsAddedEventArgs e)
        {
            rezervirajSmjestajButton.Enabled = true;
            rezervacijaSmjestajaMinusButton.Enabled = true;
        }

        private void dgvZaposleniciPridruzeniRezervaciji_RowsRemoved(object sender, DataGridViewRowsRemovedEventArgs e)
        {
            if (dgvZaposleniciPridruzeniRezervaciji.Rows.Count == 0)
            {
                rezervirajSmjestajButton.Enabled = false;
                rezervacijaSmjestajaMinusButton.Enabled = false;
            }
        }

        private void FormRezervacijaSmjestaja_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1015");
        }
    }
}
