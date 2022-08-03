using System;
using System.Collections.Generic;
using System.Drawing;
using System.Windows.Forms;

namespace UpravljanjeResursima
{
    public partial class UpravljanjeOpremom : Form
    {
        public UpravljanjeOpremom()
        {
            InitializeComponent();
            NavigacijaDLL.Forme.UpravljanjeOpremom = this;
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void toolStripButtonUpravljanjeOpremom_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.DodavanjeTransportnihVozila.Show();
            this.Close();
        }

        private void toolStripButtonUpravljanjeResursima_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeResursima.Show();
            this.Close();
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            this.Close();
            NavigacijaDLL.Forme.UpravljanjeOpremom.Close();
            NavigacijaDLL.Forme.UpravljanjeResursima.Close();
        }

        private void DodavanjeOpreme_Load(object sender, EventArgs e)
        {
            PopunjavanjeTextBoxeva();
            Osvjezi();
            OznaciDGV();
        }

        public void TextBoxIzbor()
        {
            List<Zaposlenik> lista = BazaPodataka.GetZaposlenici();
            List<string> listaCombo = new List<string>();

            foreach (Zaposlenik z in lista)
            {
                listaCombo.Add(z.Ime + " " + z.Prezime + ", " + z.Oib);
            }

            cmbZaduzeniZaposlenik.DataSource = listaCombo;
        }

        private void btnDodajOpremu_Click(object sender, EventArgs e)
        {
            string[] OdabraniZaposlenik = cmbZaduzeniZaposlenik.Text.Split(',');
            string OibCombo = OdabraniZaposlenik[0];
            if (txtKolicinaOpreme.Text == "" || txtNazivOpreme.Text == "" || dtDatumKupnje.Text == "" || cmbZaduzeniZaposlenik.Text == "")
            {
                labelPoruka.Text = "Nisu uneseni svi argumenti, unesi ponovno!";
            }
            else
            {
                Oprema novaOprema = new Oprema();
                novaOprema.Oib = OibCombo;
                novaOprema.DatumKupnje = DateTime.Parse(dtDatumKupnje.Text);
                novaOprema.KolicinaOpreme = Int32.Parse(txtKolicinaOpreme.Text);
                novaOprema.NazivOpreme = txtNazivOpreme.Text;
                BazaPodataka.DodajOpremu(novaOprema);
                Osvjezi();
                OznaciDGV();
            }
            btnUrediOpremu.Enabled = true;
            btnObrisiOpremu.Enabled = true;
            txtKolicinaOpreme.Text = "";
            txtNazivOpreme.Text = "";
        }

        private void btnOdustaniOprema_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeResursima.Show();
            this.Close();
        }
        private void Osvjezi()
        {
            dgvListaOpreme.DataSource = null;
            dgvListaOpreme.DataSource = BazaPodataka.GetOprema();
            dgvListaOpreme.Columns["Zaposlenik"].Visible = false;
            dgvListaOpreme.Columns["IDOpreme"].Visible = false;
            dgvListaOpreme.Columns["Oib"].HeaderText = "Zaduženi zaposlenik";
            dgvListaOpreme.Columns["NazivOpreme"].HeaderText = "Naziv opreme";
            dgvListaOpreme.Columns["DatumKupnje"].HeaderText = "Datum kupnje";
            dgvListaOpreme.Columns["KolicinaOpreme"].HeaderText = "Količina opreme";
            TextBoxIzbor();
        }

        private void btnObrisiOpremu_Click(object sender, EventArgs e)
        {
            Oprema obrisiOpremu = dgvListaOpreme.CurrentRow.DataBoundItem as Oprema;
            BazaPodataka.IzbrisiOpremu(obrisiOpremu);
            Osvjezi();
        }

        private void btnUrediOpremu_Click(object sender, EventArgs e)
        {
            Oprema selectedOprema = dgvListaOpreme.CurrentRow.DataBoundItem as Oprema;
            IzmjenaInformacijaOpreme izmjenaInformacijaOpreme = new IzmjenaInformacijaOpreme(selectedOprema);
            izmjenaInformacijaOpreme.Show();
            this.Hide();
        }
        private void PopunjavanjeTextBoxeva()
        {
            if (txtKolicinaOpreme.Text != "" && txtNazivOpreme.Text != "")
            {
                btnDodajOpremu.Enabled = true;
                Provjera();
            }
            else
            {
                btnDodajOpremu.Enabled = false;
            }
        }
        private void txtNazivOpreme_TextChanged(object sender, EventArgs e)
        {
            PopunjavanjeTextBoxeva();
        }
        private void txtKolicinaOpreme_TextChanged(object sender, EventArgs e)
        {
            PopunjavanjeTextBoxeva();
        }
        private void OznaciDGV()
        {
            if (dgvListaOpreme.Rows.Count == 0)
            {
                btnObrisiOpremu.Enabled = false;
                btnUrediOpremu.Enabled = false;
            }
            foreach (DataGridViewRow row in dgvListaOpreme.Rows)
            {
                if (row.Selected == false)
                {
                    btnObrisiOpremu.Enabled = false;
                    btnUrediOpremu.Enabled = false;
                }
            }
        }
        private void dgvListaOpreme_SelectionChanged(object sender, EventArgs e)
        {
            btnObrisiOpremu.Enabled = true;
            btnUrediOpremu.Enabled = true;
        }

        private void UpravljanjeOpremom_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1010");
        }

        private void Provjera()
        {
            labelPoruka.Text = "";

            try
            {
                int količina = Convert.ToInt32(txtKolicinaOpreme.Text);
            }
            catch (FormatException)
            {
                labelPoruka.ForeColor = Color.Red;
                labelPoruka.Text = "Količina treba biti izražena brojem";
                btnDodajOpremu.Enabled = false;
            }
        }
    }
}
