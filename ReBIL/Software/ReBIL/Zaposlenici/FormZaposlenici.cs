using System;
using System.Windows.Forms;

namespace Zaposlenici
{
    public partial class FormZaposlenici : Form
    {
        public FormZaposlenici()
        {
            InitializeComponent();

            NavigacijaDLL.Forme.FormZaposlenici = this;
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
            dgvZaposlenici.DataSource = null;
        }

        private Zaposlenik Odabrani()
        {
            Zaposlenik odabrani = dgvZaposlenici.CurrentRow.DataBoundItem as Zaposlenik;
            return odabrani;
        }

        private void RegistrirajZaposlenikaButton_Click(object sender, EventArgs e)
        {
            FormRegistrirajZaposlenika rz = new FormRegistrirajZaposlenika();
            rz.ShowDialog();
            Osvježi();
        }

        private void PodjelaZaposlenikaButton_Click(object sender, EventArgs e)
        {
            Zaposlenik odabrani = Odabrani();
            FormPodjelaZaposlenika pz = new FormPodjelaZaposlenika(odabrani);
            pz.ShowDialog();
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

        private void FormZaposlenici_Load(object sender, EventArgs e)
        {
            Osvježi();
            dgvZaposlenici.Columns["Oib"].Visible = false;
            dgvZaposlenici.Columns["ZaposleniciNaProjektus"].Visible = false;
        }

        private void Osvježi()
        {
            dgvZaposlenici.DataSource = Repozitorij.DohvatiListuZaposlenika();
        }

        private void ObrišiZaposlenika_Click(object sender, EventArgs e)
        {
            Zaposlenik odabranZ = Odabrani();
            FormObrisiZaposlenika formObrisiZaposlenika = new FormObrisiZaposlenika(odabranZ, null, "Zaposlenici");
            formObrisiZaposlenika.ShowDialog();
            Osvježi();
        }


        private void FormZaposlenici_Shown(object sender, EventArgs e)
        {
            Osvježi();
        }

        private void UrediZaposlenika_Click(object sender, EventArgs e)
        {
            Zaposlenik selektiran = Odabrani();
            FormRegistrirajZaposlenika rz = new FormRegistrirajZaposlenika(selektiran);
            rz.ShowDialog();
            Osvježi();
        }

        private void FormZaposlenici_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1003");
        }
    }
}
