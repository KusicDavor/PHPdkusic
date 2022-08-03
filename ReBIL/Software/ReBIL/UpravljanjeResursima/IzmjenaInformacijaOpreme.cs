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
    public partial class IzmjenaInformacijaOpreme : Form
    {
        private Oprema selectedOprema;
        public IzmjenaInformacijaOpreme(Oprema oprema)
        {
            InitializeComponent();
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
            selectedOprema = oprema;
        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void toolStripButtonUpravljanjeOpremom_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeOpremom.Show();
            this.Close();
        }

        private void toolStripButtonUpravljanjeResursima_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeResursima.Show();
            this.Close();
            NavigacijaDLL.Forme.UpravljanjeOpremom.Close();
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            this.Close();
            NavigacijaDLL.Forme.UpravljanjeOpremom.Close();
            NavigacijaDLL.Forme.UpravljanjeResursima.Close();
        }

        private void IzmjenaInformacijaOpreme_Load(object sender, EventArgs e)
        {
            TextBoxIzbor();
            txtNazivOpreme.Text = selectedOprema.NazivOpreme.ToString();
            dtDatumKupnje.Text = selectedOprema.DatumKupnje.ToString();
            txtKolicinaOpreme.Text = selectedOprema.KolicinaOpreme.ToString();
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

        private void btnOdustaniAzuriranjeOpreme_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void btnAzurirajOpremu_Click(object sender, EventArgs e)
        {
            if (txtKolicinaOpreme.Text == "" || txtNazivOpreme.Text == "" || dtDatumKupnje.Text == "" || cmbZaduzeniZaposlenik.Text == "")
            {
                labelPoruka.Text = "Nisu uneseni svi podaci";
            }
            else
            {
                string[] OdabraniZaposlenik = cmbZaduzeniZaposlenik.Text.Split(',');
                string OibCombo = OdabraniZaposlenik[0];
                Oprema urediOpremu = new Oprema
                {
                    DatumKupnje = DateTime.Parse(dtDatumKupnje.Text),
                    KolicinaOpreme = Int32.Parse(txtKolicinaOpreme.Text),
                    NazivOpreme = txtNazivOpreme.Text,
                    Oib = OibCombo
                };
                BazaPodataka.UrediOpremu(selectedOprema, urediOpremu);
                NavigacijaDLL.Forme.UpravljanjeOpremom.Show();
                this.Close();
            }
        }

        private void btnOdustaniAzuriranjeOpreme_Click_1(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeOpremom.Show();
            this.Close();
        }

        private void IzmjenaInformacijaOpreme_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1025");
        }

        private void txtKolicinaOpreme_TextChanged(object sender, EventArgs e)
        {
            Provjera();
        }

        private void Provjera()
        {
            btnAzurirajOpremu.Enabled = true;
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
                    btnAzurirajOpremu.Enabled = false;
                }
            }
        }
    }
}
