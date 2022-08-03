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
    public partial class FormRezervacije : Form
    {
        Projekt odabraniProjekt;
        Rezervacija odabranaRezervacija;
        Smjestaj odabraniSmjestaj;
        public FormRezervacije(Projekt projekt, Smjestaj smjestaj)
        {
            InitializeComponent();
            odabraniProjekt = projekt;
            odabraniSmjestaj = smjestaj;
        }

        private void FormRezervacije_Load(object sender, EventArgs e)
        {
            dgvListaRezervacija.DataSource = Repozitorij.DohvatiRezervacije(odabraniProjekt);
            dgvListaRezervacija.Columns["Smjestaj"].Visible = false;
            dgvListaRezervacija.Columns["ZaposleniciNaProjektus"].Visible = false;
            dgvListaRezervacija.Columns["IDSmjestaj"].Visible = false;
            dgvListaRezervacija.Columns["IDRezervacija"].HeaderText = "Broj rezervacije";
            dgvListaRezervacija.Columns["DatumOd"].HeaderText = "Datum od";
            dgvListaRezervacija.Columns["DatumDo"].HeaderText = "Datum do";


            if (dgvListaRezervacija.Rows.Count.Equals(0))
            {
                
                izbrisiRezervacijuButton.Enabled=false;
            }
            
        }

        

        private void izbrisiRezervacijuButton_Click(object sender, EventArgs e)
        {
            odabranaRezervacija = dgvListaRezervacija.CurrentRow.DataBoundItem as Rezervacija;
            Repozitorij.IzbrisiRezervaciju(odabranaRezervacija);
            dgvListaRezervacija.DataSource = null;
            dgvListaRezervacija.DataSource = Repozitorij.DohvatiRezervacije(odabraniProjekt);
            dgvListaRezervacija.Columns["Smjestaj"].Visible = false;
            dgvListaRezervacija.Columns["ZaposleniciNaProjektus"].Visible = false;

            if (dgvListaRezervacija.Rows.Count.Equals(0))
            {
                
                izbrisiRezervacijuButton.Enabled = false;
            }
        }

        private void zatvoriButton_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void prikaziRezervacijuButton_Click(object sender, EventArgs e)
        {
            odabranaRezervacija = dgvListaRezervacija.CurrentRow.DataBoundItem as Rezervacija;
            FormUrediRezervaciju form = new FormUrediRezervaciju(odabranaRezervacija, odabraniSmjestaj);
            form.ShowDialog();
            dgvListaRezervacija.DataSource = null;
            dgvListaRezervacija.DataSource = Repozitorij.DohvatiRezervacije(odabraniProjekt);
            dgvListaRezervacija.Columns["Smjestaj"].Visible = false;
            dgvListaRezervacija.Columns["ZaposleniciNaProjektus"].Visible = false;
        }

        private void FormRezervacije_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1016");
        }
    }
}
