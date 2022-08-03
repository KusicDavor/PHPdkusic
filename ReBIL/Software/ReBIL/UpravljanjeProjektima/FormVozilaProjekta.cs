using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using NavigacijaDLL;

namespace UpravljanjeProjektima
{
    public partial class FormVozilaProjekta : Form
    {
        private Projekt Projekt;
        private List<Vozilo> VozilaDodanaNaProjekt;
        public FormVozilaProjekta(Projekt oznaceniProjekt)
        {
            InitializeComponent();
            NavigacijaDLL.Forme.VozilaProjekta = this;
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
            this.Projekt = oznaceniProjekt;
            this.VozilaDodanaNaProjekt = Repozitorij.DohvatiVozilaNaProjektu(oznaceniProjekt);
        }

        private void buttonIzlaz_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void FormVozilaProjekta_Load(object sender, EventArgs e)
        {
            labelNaziv.Text = this.Projekt.ImeProjekta;
            Osvjezi();
        }
        private void Osvjezi()
        {
            dgvListaVozila.DataSource = null;
            dgvListaVozila.DataSource = Repozitorij.DohvatiVozilaNaProjektu(this.Projekt);
            dgvListaVozila.Columns["IDVozila"].Visible = false;
            dgvListaVozila.Columns["Dijelovis"].Visible = false;
            dgvListaVozila.Columns["ZaposleniciNaProjektus"].Visible = false;
            dgvListaVozila.Columns["BrojSasije"].HeaderText = "Broj šasije";
            dgvListaVozila.Columns["GodinaKupnje"].HeaderText = "Godina kupnje";
            dgvListaVozila.Columns["TablicaVozila"].HeaderText = "Registracija";
            dgvListaVozila.Columns["Kilometraza"].HeaderText = "Kilometraža";
            dgvListaVozila.Columns["BrojPoliceOsiguranja"].HeaderText = "Polica osiguranja";
            dgvListaVozila.Columns["MjesecTehnickogPregleda"].HeaderText = "Mjesec tehničkog pregleda";
        }
        
        private void DodajVoziloButton_Click(object sender, EventArgs e)
        {
            FormDodajVozilo formDodajVozilo = new FormDodajVozilo(this.Projekt);
            formDodajVozilo.ShowDialog();
            Osvjezi();
            Oznaci();
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            NavigacijaDLL.Forme.UpravljanjeProjektima.Close();
            this.Close();
            
            
        }

        private void toolStripButtonUpravljanjeProjektima_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeProjektima.Show();
            this.Close();
        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void IzbrisiVoziloButton_Click(object sender, EventArgs e)
        {
            Vozilo odabranoVozilo = dgvListaVozila.CurrentRow.DataBoundItem as Vozilo;
            Repozitorij.IzbrisiVoziloNaProjektu(this.Projekt, odabranoVozilo);
            Osvjezi();
            Oznaci();
        }

        private void Oznaci()
        {
            foreach (DataGridViewRow row in dgvListaVozila.Rows)
            {
                if (row.Selected == false)
                {
                    IzbrisiVoziloButton.Enabled = false;
                }
            }
        }

        private void dgvListaVozila_SelectionChanged(object sender, EventArgs e)
        {
            IzbrisiVoziloButton.Enabled = true;
        }

        private void FormVozilaProjekta_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1020");
        }
    }
}
