using System;
using System.Collections.Generic;
using System.Drawing;
using System.Windows.Forms;

namespace UpravljanjeResursima
{
    public partial class DodavanjeTransportnihVozila : Form
    {
        public DodavanjeTransportnihVozila()
        {
            InitializeComponent();
            NavigacijaDLL.Forme.DodavanjeTransportnihVozila = this;
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void toolStripButtonUpravljanjeResursima_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeResursima.Show();
            this.Close();
            NavigacijaDLL.Forme.DodavanjeTransportnihVozila.Close();
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            this.Close();
            NavigacijaDLL.Forme.UpravljanjeResursima.Close();
        }

        private void DodavanjeTransportnihVozila_Load(object sender, EventArgs e)
        {
            PopunjeniTextBoxevi();
            Osvjezi();
            OznaciDGV();
        }        

        private void btnDodajVozilo_Click(object sender, EventArgs e)
        {
            if (txtBrojPolice.Text == "" || txtBrojSasije.Text == "" || txtKilometraza.Text == "" || txtMjesecTehnickog.Text == "" || txtNazivVozila.Text == "" || txtTablicaVozila.Text == "" || dtGodinaKupnje.Text == "" || dtGodinaKupnje.Text == "")
            {
                labelPoruka.Text = "Nisu uneseni svi argumenti, unesi ponovno!";
            }
            else           
            {
                Vozilo novoVozilo = new Vozilo();
                novoVozilo.Naziv = txtNazivVozila.Text;
                novoVozilo.BrojSasije = txtBrojSasije.Text;
                novoVozilo.GodinaKupnje = DateTime.Parse(dtGodinaKupnje.Text);
                novoVozilo.TablicaVozila = txtTablicaVozila.Text;
                novoVozilo.Kilometraza = txtKilometraza.Text;
                novoVozilo.BrojPoliceOsiguranja = Int32.Parse(txtBrojPolice.Text);
                novoVozilo.MjesecTehnickogPregleda = Int32.Parse(txtMjesecTehnickog.Text);
                BazaPodataka.DodajVozilo(novoVozilo);
                Osvjezi();
                OznaciDGV();
            }
            btnObrisiVozilo.Enabled = true;
            txtBrojPolice.Text = "";
            txtBrojSasije.Text = "";
            txtKilometraza.Text = "";
            txtNazivVozila.Text = "";
            txtMjesecTehnickog.Text = "";
            txtTablicaVozila.Text = "";
            porukaLabel.Text = "";
        }
        
        private void btnObrisiVozilo_Click(object sender, EventArgs e)
        {
            Vozilo obrisiVozilo = dgvListaVozila.CurrentRow.DataBoundItem as Vozilo;
            BazaPodataka.IzbrisiVozilo(obrisiVozilo);
            Osvjezi();
            btnUrediVozilo.Enabled = false;
            btnObrisiVozilo.Enabled = false;
        }
        private void Osvjezi()
        {
            dgvListaVozila.DataSource = null;
            dgvListaVozila.DataSource = BazaPodataka.GetVozilos();
            dgvListaVozila.Columns["Dijelovis"].Visible = false;
            dgvListaVozila.Columns["ZaposleniciNaProjektus"].Visible = false;
            dgvListaVozila.Columns["IDVozila"].Visible = false;
            dgvListaVozila.Columns["BrojSasije"].HeaderText = "Broj šasije";
            dgvListaVozila.Columns["GodinaKupnje"].HeaderText = "Godina kupnje";
            dgvListaVozila.Columns["TablicaVozila"].HeaderText = "Registracija";
            dgvListaVozila.Columns["Kilometraza"].HeaderText = "Kilometraža";
            dgvListaVozila.Columns["BrojPoliceOsiguranja"].HeaderText = "Polica osiguranja";
            dgvListaVozila.Columns["MjesecTehnickogPregleda"].HeaderText = "Mjesec tehničkog pregleda";
        }

        private void btnOdustaniVozilo_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeResursima.Show();
            this.Close();
        }
        private void btnUpravljanjeDijelovima_Click(object sender, EventArgs e)
        {
            DodavanjeDijelova dodavanjeDijelova = new DodavanjeDijelova();
            dodavanjeDijelova.Show();
            Osvjezi();
            this.Hide();
        }

        private void btnUrediVozilo_Click(object sender, EventArgs e)
        {
            Vozilo selectedVozilo = dgvListaVozila.CurrentRow.DataBoundItem as Vozilo;
            IzmjenaInformacijaTransportnihVozila izmjenaInformacijaTransportnihVozila = new IzmjenaInformacijaTransportnihVozila(selectedVozilo);
            izmjenaInformacijaTransportnihVozila.ShowDialog();
            Osvjezi();
            OznaciDGV();
        }       
        private void PopunjeniTextBoxevi()
        {
            if (txtBrojPolice.Text != "" && txtBrojSasije.Text != "" && txtKilometraza.Text != "" && txtMjesecTehnickog.Text != "" && txtNazivVozila.Text != "" && txtTablicaVozila.Text != "" )
            {
                btnDodajVozilo.Enabled = true;
            }
            else
            {
                btnDodajVozilo.Enabled = false;
            }
        }
        private void txtNazivVozila_TextChanged(object sender, EventArgs e)
        {
            PopunjeniTextBoxevi();
        }

        private void txtBrojSasije_TextChanged(object sender, EventArgs e)
        {
            PopunjeniTextBoxevi();
        }
        private void txtTablicaVozila_TextChanged(object sender, EventArgs e)
        {
            PopunjeniTextBoxevi();
        }
        private void txtKilometraza_TextChanged(object sender, EventArgs e)
        {
            PopunjeniTextBoxevi();
        }
        private void txtBrojPolice_TextChanged(object sender, EventArgs e)
        {
            PopunjeniTextBoxevi();
            Tehnicki();
        }
        private void txtMjesecTehnickog_TextChanged(object sender, EventArgs e)
        {
            PopunjeniTextBoxevi();
            if (txtMjesecTehnickog.Text != "") Tehnicki();
        }
        private void OznaciDGV()
        {
            if (dgvListaVozila.Rows.Count == 0)
            {
                btnObrisiVozilo.Enabled = false;
                btnUrediVozilo.Enabled = false;
            }
            foreach (DataGridViewRow row in dgvListaVozila.Rows)
            {
                if (row.Selected == false)
                {
                    btnObrisiVozilo.Enabled = false;
                    btnUrediVozilo.Enabled = false;
                }
            }
        }
        private void dgvListaVozila_SelectionChanged(object sender, EventArgs e)
        {
            btnUrediVozilo.Enabled = true;
            btnObrisiVozilo.Enabled = true;
        }

        private void DodavanjeTransportnihVozila_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1008");
        }

        private void Tehnicki()
        {
            porukaLabel.Text = "";

            try
            {
                int mjesec = Convert.ToInt32(txtMjesecTehnickog.Text);
                if (mjesec > 12 || mjesec < 1) btnDodajVozilo.Enabled = false;
            }
            catch (FormatException)
            {
                porukaLabel.ForeColor = Color.Red;
                porukaLabel.Text = "Mjesec tehničkog pregleda treba biti izražen brojem";
                btnDodajVozilo.Enabled = false;
            }

            try
            {
                int broj = Convert.ToInt32(txtBrojPolice.Text);
            }
            catch (FormatException)
            {
                porukaLabel.ForeColor = Color.Red;
                porukaLabel.Text = "Broj police treba biti izražen brojem";
                btnDodajVozilo.Enabled = false;
            }
        }
    }
}
