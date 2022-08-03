using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace UpravljanjeResursima
{
    public partial class IzmjenaInformacijaTransportnihVozila : Form
    {
        private Vozilo selectedVozilo;
        public IzmjenaInformacijaTransportnihVozila(Vozilo vozilo)
        {
            InitializeComponent();
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
            selectedVozilo = vozilo;
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            this.Close();
            NavigacijaDLL.Forme.DodavanjeTransportnihVozila.Close();
            NavigacijaDLL.Forme.UpravljanjeResursima.Close();
        }

        private void toolStripButtonUpravljanjeTransportnimVozilima_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.DodavanjeTransportnihVozila.Show();
            this.Close();
        }

        private void toolStripButtonUpravljanjeResursima_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeResursima.Show();
            this.Close();
            NavigacijaDLL.Forme.DodavanjeTransportnihVozila.Close();
        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }
        private void IzmjenaInformacijaTransportnihVozila_Load(object sender, EventArgs e)
        {          
            txtBrojSasije.Text = selectedVozilo.BrojSasije.ToString();
            txtNazivVozila.Text = selectedVozilo.Naziv.ToString();
            dtGodinaKupnje.Text = selectedVozilo.GodinaKupnje.ToString();            
            txtTablicaVozila.Text = selectedVozilo.TablicaVozila.ToString();
            txtKilometraza.Text = selectedVozilo.Kilometraza.ToString();
            txtBrojPolice.Text = selectedVozilo.BrojPoliceOsiguranja.ToString();
            txtMjesecTehnickog.Text = selectedVozilo.MjesecTehnickogPregleda.ToString();
        }
        private void btnAzurirajInformacijeVozila_Click(object sender, EventArgs e)
        {
            if (txtBrojPolice.Text == "" || txtBrojSasije.Text == "" || txtKilometraza.Text == "" || txtMjesecTehnickog.Text == "" || txtTablicaVozila.Text == "" || dtGodinaKupnje.Text == "")
            {
                labelPoruka.Text = "Nisu uneseni svi podaci, molim upišite sve";
            }
            else
            {
                Vozilo urediVozilo = new Vozilo
                {
                    BrojPoliceOsiguranja = Int32.Parse(txtBrojPolice.Text),
                    Naziv = txtNazivVozila.Text,
                    BrojSasije = txtBrojSasije.Text,
                    Kilometraza = txtKilometraza.Text,
                    MjesecTehnickogPregleda = Int32.Parse(txtMjesecTehnickog.Text),
                    TablicaVozila = txtTablicaVozila.Text,
                    GodinaKupnje = DateTime.Parse(dtGodinaKupnje.Text)
                };
                BazaPodataka.UrediVozilo(selectedVozilo, urediVozilo);
                NavigacijaDLL.Forme.DodavanjeTransportnihVozila.Show();
                this.Close();
            }
        }

        private void btnOdustani_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.DodavanjeTransportnihVozila.Show();
            this.Close();
        }

        private void IzmjenaInformacijaTransportnihVozila_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1024");
        }

        private void Tehnicki()
        {
            btnAzurirajInformacijeVozila.Enabled = true;
            labelPoruka.Text = "";

            try
            {
                int mjesec = Convert.ToInt32(txtMjesecTehnickog.Text);
                if (mjesec > 12 || mjesec < 1) btnAzurirajInformacijeVozila.Enabled = false;
            }
            catch (FormatException)
            {
                labelPoruka.ForeColor = Color.Red;
                labelPoruka.Text = "Mjesec tehničkog pregleda treba biti izražen brojem";
                btnAzurirajInformacijeVozila.Enabled = false;
            }

            try
            {
                int broj = Convert.ToInt32(txtBrojPolice.Text);
            }
            catch (FormatException)
            {
                labelPoruka.ForeColor = Color.Red;
                labelPoruka.Text = "Broj police treba biti izražen brojem";
                btnAzurirajInformacijeVozila.Enabled = false;
            }
        }

        private void txtMjesecTehnickog_TextChanged(object sender, EventArgs e)
        {
            Tehnicki();
        }

        private void txtBrojPolice_TextChanged(object sender, EventArgs e)
        {
            Tehnicki();
        }
    }
}
