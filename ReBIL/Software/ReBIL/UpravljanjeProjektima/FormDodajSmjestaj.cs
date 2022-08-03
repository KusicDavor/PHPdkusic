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
    public partial class FormDodajSmjestaj : Form
    {
        public FormDodajSmjestaj()
        {
            InitializeComponent();
        }

        private void FormDodajSmjestaj_Load(object sender, EventArgs e)
        {
            valutaNocenjaComboBox.DataSource = Repozitorij.DohvatiValute();
            dodajSmjestajButton.Enabled = false;
        }

        private void odustaniSmjestajButton_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void dodajSmjestajButton_Click(object sender, EventArgs e)
        {
            if (nazivSmjestajaTxtBox.Text == "" || lokacijaSmjestajaTxtBox.Text == "" || cijenaNocenjaTxtBox.Text == "" || valutaNocenjaComboBox.Text == "")
            {
                MessageBox.Show("Nisu uneseni svi potrebni podaci.");
            }

            else
            {
                string naziv = nazivSmjestajaTxtBox.Text;
                string lokacija = lokacijaSmjestajaTxtBox.Text;
                decimal cijena = decimal.Parse(cijenaNocenjaTxtBox.Text);
                string oznakaValute = valutaNocenjaComboBox.Text;
                Valuta valuta = valutaNocenjaComboBox.SelectedItem as Valuta;
                

                Repozitorij.DodajSmjestaj(naziv,lokacija, cijena, oznakaValute, valuta);
                Close();
            }
        }

        private void nazivSmjestajaTxtBox_TextChanged(object sender, EventArgs e)
        {
            
            provjeraBrojevi();
        }

        private void provjera()
        {
            if (nazivSmjestajaTxtBox.Text != "" && lokacijaSmjestajaTxtBox.Text != "" && cijenaNocenjaTxtBox.Text != "")
            {
                dodajSmjestajButton.Enabled = true;
            }
            else
            {
                dodajSmjestajButton.Enabled=false;
            }
        }


        private void lokacijaSmjestajaTxtBox_TextChanged(object sender, EventArgs e)
        {
            
            provjeraBrojevi();
        }

        private void cijenaNocenjaTxtBox_TextChanged(object sender, EventArgs e)
        {
            
            provjeraBrojevi();
            
           
        }

        private void provjeraBrojevi()
        {
            int parsedValue;
            if (!int.TryParse(cijenaNocenjaTxtBox.Text, out parsedValue))
            {
                dodajSmjestajButton.Enabled = false;
            }
            else
            {
                provjera();
            }
        }

        private void FormDodajSmjestaj_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1014");
        }
    }
}
