using System;
using System.Windows.Forms;
using NavigacijaDLL;

namespace UpravljanjeProjektima
{
    public partial class FormUpravljanjeProjektima : Form
    {
        public FormUpravljanjeProjektima()
        {
            InitializeComponent();
            NavigacijaDLL.Forme.UpravljanjeProjektima = this;
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            this.Close();
        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void FormUpravljanjeProjektima_Load(object sender, EventArgs e)
        {
            Osvjezi();
        }

        private void LogistikaButton_Click(object sender, EventArgs e)
        {
            Projekt odabraniProjekt = dgvListaProjekata.CurrentRow.DataBoundItem as Projekt;
            FormLogistika fl = new FormLogistika(odabraniProjekt);
            NavigacijaDLL.Forme.UpravljanjeProjektima.Hide();
            fl.ShowDialog();
        }

        private void Osvjezi()
        {
            dgvListaProjekata.DataSource = null;
            dgvListaProjekata.DataSource = Repozitorij.DohvatiListuProjekata();
            dgvListaProjekata.Columns["IDprojekta"].Visible = false;
            dgvListaProjekata.Columns["ImeProjekta"].HeaderText = "Ime projekta";
            dgvListaProjekata.Columns["VoditeljRadilišta"].HeaderText = "Voditelj radilišta";
            dgvListaProjekata.Columns["Eksplozivs"].Visible = false;
            dgvListaProjekata.Columns["Dokumentacijas"].Visible = false;
            dgvListaProjekata.Columns["ZaposleniciNaProjektus"].Visible = false;
            UrediProjektButton.Enabled = false;
            IzbrisiProjektButton.Enabled = false;
            EvidencijaRokovaButton.Enabled = false;
            LogistikaButton.Enabled = false;
            buttonVozila.Enabled = false;
            EvidencijaEksSredstavaButton.Enabled = false;
            StatistikaButton.Enabled = false;
        }

        private void DodajProjektButton_Click(object sender, EventArgs e)
        {
            FormDodajNoviProjekt np = new FormDodajNoviProjekt();
            np.ShowDialog();
            Osvjezi();
        }

        private void UrediProjektButton_Click(object sender, EventArgs e)
        {
            Projekt selektiran = dgvListaProjekata.CurrentRow.DataBoundItem as Projekt;
            FormDodajNoviProjekt np = new FormDodajNoviProjekt(selektiran);
            np.Text = "Uredi projekt";
            np.ShowDialog();
            Osvjezi();
        }

        private void IzbrisiProjektButton_Click(object sender, EventArgs e)
        {
            Projekt selektiran = dgvListaProjekata.CurrentRow.DataBoundItem as Projekt;
            Repozitorij.ObrisiProjekt(selektiran);
            Osvjezi();
        }

        private void EvidencijaRokovaButton_Click(object sender, EventArgs e)
        {
            Projekt odabraniProjekt = dgvListaProjekata.CurrentRow.DataBoundItem as Projekt;
            FormUpravljanjeDokumentacijom form = new FormUpravljanjeDokumentacijom(odabraniProjekt);
            form.ShowDialog();
        }

        private void EvidencijaEksSredstavaButton_Click(object sender, EventArgs e)
        {
            Projekt odabraniProjekt = dgvListaProjekata.CurrentRow.DataBoundItem as Projekt;
            FormEvidencijaEksplozivnihSredstava formEvidencijaEksplozivnihSredstava = new FormEvidencijaEksplozivnihSredstava(odabraniProjekt);
            formEvidencijaEksplozivnihSredstava.ShowDialog();

        }

        private void StatistikaButton_Click(object sender, EventArgs e)
        {
            Projekt odabraniProjekt = dgvListaProjekata.CurrentRow.DataBoundItem as Projekt;
            FormStatistika form = new FormStatistika(odabraniProjekt);
            form.ShowDialog();
        }

        private void dgvListaProjekata_SelectionChanged(object sender, EventArgs e)
        {
            UrediProjektButton.Enabled = true;
            IzbrisiProjektButton.Enabled = true;
            EvidencijaRokovaButton.Enabled = true;
            LogistikaButton.Enabled = true;
            buttonVozila.Enabled = true;
            EvidencijaEksSredstavaButton.Enabled = true;
            StatistikaButton.Enabled = true;
        }

        private void dgvListaProjekata_RowsRemoved(object sender, DataGridViewRowsRemovedEventArgs e)
        {
            if (dgvListaProjekata.Rows.Count == 0)
            {
                UrediProjektButton.Enabled = false;
                IzbrisiProjektButton.Enabled = false;
                EvidencijaRokovaButton.Enabled = false;
                LogistikaButton.Enabled = false;
                buttonVozila.Enabled = false;
                EvidencijaEksSredstavaButton.Enabled = false;
                StatistikaButton.Enabled = false;
            }
        }

        private void buttonVozila_Click(object sender, EventArgs e)
        {
            
            Projekt odabraniProjekt = dgvListaProjekata.CurrentRow.DataBoundItem as Projekt;
            FormVozilaProjekta formVozilaProjekta = new FormVozilaProjekta(odabraniProjekt);
            formVozilaProjekta.Show();
            
        }

        private void FormUpravljanjeProjektima_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1011");
        }
    }
}
