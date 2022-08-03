using System;
using System.Collections.Generic;
using System.Linq;
using System.Windows.Forms;

namespace UpravljanjeResursima
{
    public partial class DodavanjeDijelova : Form
    {
        public DodavanjeDijelova()
        {
            InitializeComponent();
            NavigacijaDLL.Forme.UpravljanjeDijelovima = this;
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            this.Close();
            NavigacijaDLL.Forme.UpravljanjeResursima.Close();
        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void toolStripButtonUpravljanjeResursima_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeResursima.Show();
            this.Close();
        }

        private void Osvjezi()
        {
            dgvListaDijelova.DataSource = BazaPodataka.GetKatalogDijelovas();
            dgvListaDijelova.Columns["Dijelovis"].Visible = false;
            dgvListaDijelova.Columns["SerijskiBrojDIjela"].HeaderText = "Serijski broj dijela";
            dgvListaDijelova.Columns["NazivDijela"].HeaderText = "Naziv dijela";
            btnUrediDijelove.Enabled = false;
            btnObrisiDijelove.Enabled = false;
        }
        private void DodavanjeDijelova_Load(object sender, EventArgs e)
        {
            ValidateTextBoxes();
            OznaciDGV();
            Osvjezi();
        }
        private void btnDodajDijelove_Click(object sender, EventArgs e)
        {
            if (txtNazivDijela.Text == "")
            {
                labelPoruka.Text = "Nisu uneseni svi argumenti, unesi ponovno!";
            }
            else if (BazaPodataka.ProvjeriImeDijela(txtNazivDijela.Text))
            {
                KatalogDijelova noviDijelovi = new KatalogDijelova();
                noviDijelovi.NazivDijela = txtNazivDijela.Text;
                BazaPodataka.DodajUKatalog(noviDijelovi);
                Osvjezi();
                OznaciDGV();
                btnUrediDijelove.Enabled = true;
                btnObrisiDijelove.Enabled = true;
                txtNazivDijela.Text = "";
            }
            else labelPoruka.Text = "Uneseno je krivo";

        }

        private void btnUrediDijelove_Click(object sender, EventArgs e)
        {
            KatalogDijelova urediKatalog = dgvListaDijelova.CurrentRow.DataBoundItem as KatalogDijelova;
            IzmjenaInformacijaDijelova izmjenaInformacijaDijelova = new IzmjenaInformacijaDijelova(urediKatalog);
            izmjenaInformacijaDijelova.Show();
            Osvjezi();
            OznaciDGV();
            this.Hide();
        }
        private void btnObrisiDijelove_Click(object sender, EventArgs e)
        {
            KatalogDijelova obrisiIzKataloga = dgvListaDijelova.CurrentRow.DataBoundItem as KatalogDijelova;
            BazaPodataka.IzbrisiIzKataloga(obrisiIzKataloga);
            Osvjezi();
            OznaciDGV();
        }

        private void btnOdustaniDijelovi_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeResursima.Show();
            this.Close();
        }
        private void OznaciDGV()
        {
            if (dgvListaDijelova.Rows.Count == 0)
            {
                btnUrediDijelove.Enabled = false;
                btnObrisiDijelove.Enabled = false;
            }
            foreach (DataGridViewRow row in dgvListaDijelova.Rows)
            {
                if (row.Selected == false)
                {
                    btnUrediDijelove.Enabled = false;
                    btnObrisiDijelove.Enabled = false;
                }
            }
        }
        private void dgvListaDijelova_SelectionChanged(object sender, EventArgs e)
        {
            btnObrisiDijelove.Enabled = true;
            btnUrediDijelove.Enabled = true;
        }
        private void ValidateTextBoxes()
        {
            if (txtNazivDijela.Text != "")
            {
                btnDodajDijelove.Enabled = true;
            }
            else
            {
                btnDodajDijelove.Enabled = false;
            }
        }

        private void txtNazivDijela_TextChanged(object sender, EventArgs e)
        {
            ValidateTextBoxes();
        }

        private void DodavanjeDijelova_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1009");
        }

        private void btnDodajKolicinu_Click(object sender, EventArgs e)
        {
            Skladiste skladiste = new Skladiste();
            skladiste.Show();
            this.Hide();
        }

        private void btnDodajProjektu_Click(object sender, EventArgs e)
        {
            DodavanjeProjekta dodavanjeProjekta = new DodavanjeProjekta();
            dodavanjeProjekta.Show();
            this.Hide();
        }

        private void toolStripLabelDodavanjeDijelova_Click(object sender, EventArgs e)
        {

        }
    }
}
