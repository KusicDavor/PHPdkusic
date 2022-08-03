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
    public partial class FormLogistika : Form
    {
        Projekt projekt;
        Smjestaj smjestaj;

        public FormLogistika(Projekt odabraniProjekt)
        {
            InitializeComponent();
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
            projekt = odabraniProjekt;
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            this.Close();
            NavigacijaDLL.Forme.UpravljanjeProjektima.Close();

        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void toolStripButtonUpravljanjeProjektima_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeProjektima.Show();
            this.Close();
        }

        private void FormLogistika_Load(object sender, EventArgs e)
        {
            listaSmjestajaDataGridView.DataSource = Repozitorij.DohvatiSmjestaje();
            listaSmjestajaDataGridView.Columns["IDSmjestaj"].Visible = false;
            listaSmjestajaDataGridView.Columns["Rezervacijas"].Visible = false;
            listaSmjestajaDataGridView.Columns["Valuta"].Visible = false;
            listaSmjestajaDataGridView.Columns[3].HeaderText = "Cijena po osobi";
            listaSmjestajaDataGridView.Columns[4].HeaderText = "Valuta";


        }

        private void dodajSmjestajButton_Click(object sender, EventArgs e)
        {
            FormDodajSmjestaj form = new FormDodajSmjestaj();
            form.ShowDialog();
            listaSmjestajaDataGridView.DataSource = Repozitorij.DohvatiSmjestaje();
        }

        private void urediSmjestajButton_Click(object sender, EventArgs e)
        {
            Smjestaj odabraniSmjestaj = listaSmjestajaDataGridView.CurrentRow.DataBoundItem as Smjestaj;
            FormUrediSmjestaj form = new FormUrediSmjestaj(odabraniSmjestaj);
            form.ShowDialog();
            listaSmjestajaDataGridView.DataSource = Repozitorij.DohvatiSmjestaje();
        }

        private void izbrisiSmjestajButton_Click(object sender, EventArgs e)
        {
            Smjestaj odabraniSmjestaj = listaSmjestajaDataGridView.CurrentRow.DataBoundItem as Smjestaj;
            Repozitorij.ObrisiSmjestaj(odabraniSmjestaj);
            listaSmjestajaDataGridView.DataSource = Repozitorij.DohvatiSmjestaje();
        }

        private void odaberiSmjestajButton_Click(object sender, EventArgs e)
        {
            Smjestaj odabraniSmjestaj = listaSmjestajaDataGridView.CurrentRow.DataBoundItem as Smjestaj;
            FormRezervacijaSmjestaja form = new FormRezervacijaSmjestaja(odabraniSmjestaj, projekt);
            form.ShowDialog();
            listaSmjestajaDataGridView.DataSource = Repozitorij.DohvatiSmjestaje();
        }

        private void rezervacijeButton_Click(object sender, EventArgs e)
        {
            Smjestaj odabraniSmjestaj = listaSmjestajaDataGridView.CurrentRow.DataBoundItem as Smjestaj;
            FormRezervacije form = new FormRezervacije(projekt, odabraniSmjestaj);
            form.ShowDialog();
        }

        private void FormLogistika_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1014");
        }
    }
}
