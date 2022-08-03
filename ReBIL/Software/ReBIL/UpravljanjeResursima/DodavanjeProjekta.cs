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
    public partial class DodavanjeProjekta : Form
    {
        public Projekt oznaceniProjekt;
        public int oznaceniDioID;
        private decimal Razlika;
        public DodavanjeProjekta()
        {
            InitializeComponent();
            NavigacijaDLL.Forme.UpravljanjeProjektima = this;
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
        }

        private void DodavanjeProjekta_Load(object sender, EventArgs e)
        {
            Osvjezi();
            PostaviNUDProvjera();
        }

        private void btnOdustani_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeDijelovima.Show();
            this.Close();
        }
        private void Osvjezi()
        {
            dgvListaDijelova.DataSource = null;
            dgvListaDijelova.DataSource = BazaPodataka.DohvatiDijeloveKataloga();
            dgvListaProjekata.DataSource = null;
            dgvListaProjekata.DataSource = BazaPodataka.DohvatiProjekte();
            dgvListaProjekata.Columns["IDprojekta"].Visible = false;
            dgvListaProjekata.Columns["Eksplozivs"].Visible = false;
            dgvListaProjekata.Columns["Dokumentacijas"].Visible = false;
            dgvListaProjekata.Columns["DijeloviProjektas"].Visible = false;
            dgvListaProjekata.Columns["ZaposleniciNaProjektus"].Visible = false;
            dgvListaProjekata.Columns["ImeProjekta"].HeaderText = "Ime projekta";
            dgvListaProjekata.Columns["VoditeljRadilišta"].HeaderText = "Voditelj radilišta";
        }

        private void dgvListaProjekata_SelectionChanged(object sender, EventArgs e)
        {
            this.oznaceniProjekt = dgvListaProjekata.CurrentRow.DataBoundItem as Projekt;
            dgvDijeloviNaProjektu.DataSource = null;
            dgvDijeloviNaProjektu.DataSource = BazaPodataka.DijeloviNaProjektu(this.oznaceniProjekt);
            PostaviNUDProvjera();
        }
        private void PostaviNUDProvjera()
        {            
            this.Razlika = Convert.ToDecimal(dgvListaDijelova.CurrentRow.Cells[2].Value) - Convert.ToDecimal(BazaPodataka.KolicinaDijelova(BazaPodataka.Dio(Convert.ToInt32(dgvListaDijelova.CurrentRow.Cells[0].Value))));
            nudKolicina.Maximum = this.Razlika;
        }

        private void dgvListaDijelova_SelectionChanged(object sender, EventArgs e)
        {
            PostaviNUDProvjera();
        }

        private void btnDodaj_Click(object sender, EventArgs e)
        {
            Projekt odabraniProjekt = dgvListaProjekata.CurrentRow.DataBoundItem as Projekt;
            Dijelovi odabraniDio = dgvListaDijelova.CurrentRow.DataBoundItem as Dijelovi;
            if (nudKolicina.Value == 0)
            {
                labelPoruka.Text = "Nije unesena kolicina ili nema na skladištu";
            }
            else
            {
                int _serijski = Convert.ToInt32(dgvListaDijelova.CurrentRow.Cells[0].Value);
                BazaPodataka.PodjelaDijelova(odabraniProjekt, BazaPodataka.Dio(_serijski), Convert.ToInt32(nudKolicina.Value));
                Osvjezi();
                PostaviNUDProvjera();
            }
            PostaviNUDProvjera();
        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            this.Close();
            NavigacijaDLL.Forme.UpravljanjeResursima.Close();
        }

        private void toolStripButtonUpravljanjeResursima_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeResursima.Show();
            this.Close();
            NavigacijaDLL.Forme.UpravljanjeDijelovima.Close();
        }

        private void btnObrisi_Click(object sender, EventArgs e)
        {
            Dijelovi odabraniDio = dgvDijeloviNaProjektu.CurrentRow.DataBoundItem as Dijelovi;
            Projekt odabraniProjekt = dgvListaProjekata.CurrentRow.DataBoundItem as Projekt;
            int _serijski = Convert.ToInt32(dgvDijeloviNaProjektu.CurrentRow.Cells[0].Value);
            BazaPodataka.UkloniDioProjekta(BazaPodataka.Dio(_serijski), odabraniProjekt);
            Osvjezi();
            PostaviNUDProvjera();
        }

        private void toolStripButtonDodavanjeiBrisanjeTransportnihVozilima_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeDijelovima.Show();
            this.Close();
        }
    }
}
