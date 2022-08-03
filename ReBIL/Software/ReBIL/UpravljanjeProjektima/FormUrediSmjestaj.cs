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
    public partial class FormUrediSmjestaj : Form
    {
        private Smjestaj odabraniSmjestaj;
        public FormUrediSmjestaj(Smjestaj smjestaj)
        {
            InitializeComponent();
            odabraniSmjestaj = smjestaj;
        }

        private void FormUrediSmjestaj_Load(object sender, EventArgs e)
        {
            PopuniVaute();
            nazivUrediSmjestajaTxtBox.Text = odabraniSmjestaj.Naziv.ToString();
            lokacijaUrediSmjestajaTxtBox.Text = odabraniSmjestaj.Lokacija.ToString();
            cijenaUrediNocenjaTxtBox.Text = odabraniSmjestaj.CijenaPoOsobi.ToString();
        }

        private void PopuniVaute()
        {
            List<Valuta> valute;
            valute = Repozitorij.DohvatiValute();
            
            valutaUrediNocenjaComboBox.DataSource = valute;

            for (int i = 0; i < valutaUrediNocenjaComboBox.Items.Count; i++)
            {
                if((valutaUrediNocenjaComboBox.Items[i] as Valuta).OznakaValute == odabraniSmjestaj.OznakeValute)
                {
                    valutaUrediNocenjaComboBox.SelectedIndex = i;
                    break;
                }
            }
        }

        private void odustaniUrediSmjestajButton_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void izmijeniSmjestajButton_Click(object sender, EventArgs e)
        {
            if (nazivUrediSmjestajaTxtBox.Text == "" || lokacijaUrediSmjestajaTxtBox.Text == "" || cijenaUrediNocenjaTxtBox.Text == "" || valutaUrediNocenjaComboBox.Text == "")
            {
                MessageBox.Show("Nisu uneseni svi potrebni podaci.");
            }

            else
            {
                string naziv = nazivUrediSmjestajaTxtBox.Text;
                string lokacija = lokacijaUrediSmjestajaTxtBox.Text;
                decimal cijena = decimal.Parse(cijenaUrediNocenjaTxtBox.Text);
                string oznakaValute = valutaUrediNocenjaComboBox.Text;
                Valuta valuta = valutaUrediNocenjaComboBox.SelectedItem as Valuta;


                Repozitorij.UrediSmjestaj(odabraniSmjestaj, naziv, lokacija, cijena, oznakaValute, valuta);
                Close();
            }
        }

        private void nazivUrediSmjestajaTxtBox_TextChanged(object sender, EventArgs e)
        {
            provjeraBrojevi();
        }

        private void provjera()
        {
            if (nazivUrediSmjestajaTxtBox.Text != "" && lokacijaUrediSmjestajaTxtBox.Text != "" && cijenaUrediNocenjaTxtBox.Text != "")
            {
                izmijeniSmjestajButton.Enabled = true;
            }
            else
            {
                izmijeniSmjestajButton.Enabled = false;
            }
        }

        private void provjeraBrojevi()
        {
            int parsedValue;
            if (!int.TryParse(cijenaUrediNocenjaTxtBox.Text, out parsedValue))
            {
                izmijeniSmjestajButton.Enabled = false;
            }
            else
            {
                provjera();
            }
        }

        private void lokacijaUrediSmjestajaTxtBox_TextChanged(object sender, EventArgs e)
        {
            provjeraBrojevi();
        }

        private void cijenaUrediNocenjaTxtBox_TextChanged(object sender, EventArgs e)
        {
            provjeraBrojevi();
        }

        private void FormUrediSmjestaj_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "6666");
        }
    }
}
