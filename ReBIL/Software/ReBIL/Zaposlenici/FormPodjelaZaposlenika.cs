using System;
using System.Drawing;
using System.Windows.Forms;

namespace Zaposlenici
{
    public partial class FormPodjelaZaposlenika : Form
    {
        public FormPodjelaZaposlenika(Zaposlenik odabrani)
        {
            InitializeComponent();
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
        }

        private void Osvjezi()
        {
            dgvZaposlenici.DataSource = null;
            dgvProjekti.DataSource = null;
            dgvPodijeljeniZaposlenici.DataSource = null;

            dgvZaposlenici.DataSource = Repozitorij.DohvatiListuZaposlenika();
            dgvZaposlenici.Columns["Oib"].Visible = false;
            dgvZaposlenici.Columns["ZaposleniciNaProjektus"].Visible = false;

            dgvProjekti.DataSource = Repozitorij.DohvatiProjekte();
            dgvProjekti.Columns["ZaposleniciNaProjektus"].Visible = false;
            dgvProjekti.Columns["Dokumentacijas"].Visible = false;
            dgvProjekti.Columns["Eksplozivs"].Visible = false;

            Projekt odabran = dgvProjekti.CurrentRow.DataBoundItem as Projekt;
            dgvPodijeljeniZaposlenici.DataSource = Repozitorij.DohvatiPodjelu(odabran);
            dgvPodijeljeniZaposlenici.Columns["ZaposleniciNaProjektus"].Visible = false;

            PodjelaZaposlenikaButton.Enabled = false;
            ObrišiButton.Enabled = false;
        }

        private void FormPodjelaZaposlenika_Load(object sender, EventArgs e)
        {
            Osvjezi();
        }

        private void PodjelaZaposlenika_Click(object sender, EventArgs e)
        {
            Projekt odabraniP = dgvProjekti.CurrentRow.DataBoundItem as Projekt;
            Zaposlenik odabraniZ = dgvZaposlenici.CurrentRow.DataBoundItem as Zaposlenik;

            if (Repozitorij.ProvjeraPodjele(odabraniP, odabraniZ))
            {
                MessageBox.Show("Odabrani zaposlenik je već dodan na projekt!");
                Osvjezi();
            }
            else
            {
                Repozitorij.Podjela(odabraniP, odabraniZ);
                Osvjezi();
            }
        }

        private void dgvProjekti_SelectionChanged(object sender, EventArgs e)
        {
            Projekt odabran = dgvProjekti.CurrentRow.DataBoundItem as Projekt;
            dgvPodijeljeniZaposlenici.DataSource = Repozitorij.DohvatiPodjelu(odabran);
            dgvPodijeljeniZaposlenici.Columns["ZaposleniciNaProjektus"].Visible = false;
            PodjelaZaposlenikaButton.Enabled = false;
            ObrišiButton.Enabled = false;
        }

        private void ObrišiButton_Click(object sender, EventArgs e)
        {
            
            Zaposlenik odabraniZ = dgvPodijeljeniZaposlenici.CurrentRow.DataBoundItem as Zaposlenik;
            Projekt odabraniP = dgvProjekti.CurrentRow.DataBoundItem as Projekt;
            FormObrisiZaposlenika formObrisiZaposlenika = new FormObrisiZaposlenika(odabraniZ, odabraniP, "Podjela");
            formObrisiZaposlenika.ShowDialog();            
            Osvjezi();
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            NavigacijaDLL.Forme.FormZaposlenici.Close();
            this.Close();
        }

        private void toolStripButtonZaposlenici_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.FormZaposlenici.Show();
            this.Close();
        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void dgvZaposlenici_SelectionChanged(object sender, EventArgs e)
        {
            if (dgvZaposlenici.SelectedRows != null)
            {
                PodjelaZaposlenikaButton.Enabled = true;
            }
        }

        private void dgvPodijeljeniZaposlenici_SelectionChanged(object sender, EventArgs e)
        {
            if (dgvPodijeljeniZaposlenici.SelectedRows != null)
            {
                ObrišiButton.Enabled = true;
            }
        }

        private void IzlazButton_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void FormPodjelaZaposlenika_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1006");
        }
    }
}
