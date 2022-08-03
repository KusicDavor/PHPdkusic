using System;
using System.Drawing;
using System.Windows.Forms;

namespace Zaposlenici
{
    public partial class FormRegistrirajZaposlenika : Form
    {
        public FormRegistrirajZaposlenika()
        {
            InitializeComponent();
        }

        public FormRegistrirajZaposlenika(Zaposlenik selektiran)
        {
            InitializeComponent();
            Zaposlenik odabran = selektiran;
            if (odabran != null)
            {
                RegistrirajZaposlenikaButton.Text = "Ažuriraj podatke";
                oibTextBox.Enabled = false;
            }
            oibTextBox.Text = selektiran.Oib;
            imeTextBox.Text = selektiran.Ime;
            prezimeTextBox.Text = selektiran.Prezime;
            dateTimePickerDatum.Value = selektiran.Datum;

        }

        private void FormRegistrirajZaposlenika_Load(object sender, EventArgs e)
        {
            Poruka.Text = "";
            RegistrirajZaposlenikaButton.Enabled = false;
        }

        private void RegistrirajZaposlenikaButton_Click(object sender, EventArgs e)
        {
            string oib = oibTextBox.Text;
            string ime = imeTextBox.Text;
            string prezime = prezimeTextBox.Text;
            DateTime datum = dateTimePickerDatum.Value;

            Zaposlenik noviZaposlenik = new Zaposlenik();
            noviZaposlenik = Zaposlenik.KreirajZaposlenika(oib, ime, prezime, datum);

            if (RegistrirajZaposlenikaButton.Text == "Ažuriraj podatke")
            {
                Repozitorij.AžurirajZaposlenika(noviZaposlenik);
                Poruka.ForeColor = Color.Green;
                Poruka.Text = "Podaci ažurirani!";
            }

            if (RegistrirajZaposlenikaButton.Text != "Ažuriraj podatke")
            {
                try
                {
                    Repozitorij.RegistrirajZaposlenika(noviZaposlenik);
                    Poruka.ForeColor = Color.Green;
                    Poruka.Text = "Zaposlenik uspješno registriran.";
                }
                catch (Repozitorij.OibPostojiException ex)
                {
                    Poruka.ForeColor = Color.Red;
                    Poruka.Text = "Zaposlenik s tim OIB - om već postoji!";
                }
            }
        }

        private void Izlaz_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void dateTimePickerDatum_ValueChanged(object sender, EventArgs e)
        {
            if (oibTextBox.Text.Length > 15)
            {
                Poruka.ForeColor = Color.Red;
                Poruka.Text = "OIB je predugačak! Maksimalno 15 znamenki.";
                RegistrirajZaposlenikaButton.Enabled = false;
            }
            else if (DateTime.Now.Subtract(dateTimePickerDatum.Value).Days < (18 * 365))
            {
                Poruka.ForeColor = Color.Red;
                Poruka.Text = "Zaposlenik mora biti stariji od 18 godina!";
                RegistrirajZaposlenikaButton.Enabled = false;
            }
            else if (imeTextBox.Text.Length > 30)
            {
                Poruka.ForeColor = Color.Red;
                Poruka.Text = "Ime je predugačko! Maksimalno 30 slova.";
                RegistrirajZaposlenikaButton.Enabled = false;
            }
            else if (prezimeTextBox.Text.Length > 30)
            {
                Poruka.ForeColor = Color.Red;
                Poruka.Text = "Prezime je predugačko! Maksimalno 30 slova.";
                RegistrirajZaposlenikaButton.Enabled = false;
            }
            else if (oibTextBox.Text == "" || oibTextBox.Text == " ")
            {
                Poruka.ForeColor = Color.Red;
                Poruka.Text = "Unesite OIB zaposlenika.";
                RegistrirajZaposlenikaButton.Enabled = false;
            }
            else if (imeTextBox.Text == "" || prezimeTextBox.Text == " ")
            {
                Poruka.ForeColor = Color.Red;
                Poruka.Text = "Unesite ime zaposlenika.";
                RegistrirajZaposlenikaButton.Enabled = false;
            }
            else if (prezimeTextBox.Text == "")
            {
                Poruka.ForeColor = Color.Red;
                Poruka.Text = "Unesite prezime zaposlenika.";
                RegistrirajZaposlenikaButton.Enabled = false;
            }
            else
            {
                Poruka.ForeColor = Color.Green;
                Poruka.Text = "Podaci su validni.";
                RegistrirajZaposlenikaButton.Enabled = true;
            }
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

        private void FormRegistrirajZaposlenika_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1004");
        }
    }
}