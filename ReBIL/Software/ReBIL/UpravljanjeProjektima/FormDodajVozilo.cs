using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.Entity;

namespace UpravljanjeProjektima
{
    public partial class FormDodajVozilo : Form
    {
        private Projekt OznaceniProjekt;
        private List<Vozilo> VozilaDodanaNaProjekt;
        public FormDodajVozilo(Projekt oznaceniProjekt)
        {
            InitializeComponent();
            this.OznaceniProjekt = oznaceniProjekt;
            this.VozilaDodanaNaProjekt = Repozitorij.DohvatiVozilaNaProjektu(oznaceniProjekt);
        }

        private void FormDodajVozilo_Load(object sender, EventArgs e)
        {
            dataGridViewVozila.DataSource = Repozitorij.DohvatiSvaVozilaNaProjektu(this.VozilaDodanaNaProjekt);
            dataGridViewVozila.Columns["IDVozila"].Visible = false;
            dataGridViewVozila.Columns["Dijelovis"].Visible = false;
            dataGridViewVozila.Columns["ZaposleniciNaProjektus"].Visible = false;
            dataGridViewVozila.Columns["BrojSasije"].HeaderText = "Broj šasije";
            dataGridViewVozila.Columns["GodinaKupnje"].HeaderText = "Godina kupnje";
            dataGridViewVozila.Columns["TablicaVozila"].HeaderText = "Registracija";
            dataGridViewVozila.Columns["Kilometraza"].HeaderText = "Kilometraža";
            dataGridViewVozila.Columns["BrojPoliceOsiguranja"].HeaderText = "Polica osiguranja";
            dataGridViewVozila.Columns["MjesecTehnickogPregleda"].HeaderText = "Mjesec tehničkog pregleda";
            Oznaci();
        }

        private void buttonDodaj_Click(object sender, EventArgs e)
        {
            Vozilo odabrnoVozilo = dataGridViewVozila.CurrentRow.DataBoundItem as Vozilo;
            Repozitorij.DodajVoziloNaProjekt(this.OznaceniProjekt, odabrnoVozilo);
            this.Close();
        }

        private void buttonOdustani_Click(object sender, EventArgs e)
        {
            this.Close();
        }
        private void Oznaci()
        {
            if (dataGridViewVozila.Rows.Count == 0) buttonDodaj.Enabled = false; 
        }

        private void dataGridViewVozila_SelectionChanged(object sender, EventArgs e)
        {
            buttonDodaj.Enabled = true;
        }

        private void groupBoxVozila_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1021");
        }
    }
}
