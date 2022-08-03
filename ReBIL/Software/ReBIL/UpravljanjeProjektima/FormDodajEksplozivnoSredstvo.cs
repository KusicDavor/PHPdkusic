using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using EvidencijaEksplozivaDLL;

namespace UpravljanjeProjektima
{
    public partial class FormDodajEksplozivnoSredstvo : Form
    {
        EvidencijaEksplozivaDLL.Eksploziv OznaceniEksploziv;
        public FormDodajEksplozivnoSredstvo()
        {
            InitializeComponent();
            buttonDodaj.Enabled = false;
        }
        public FormDodajEksplozivnoSredstvo(EvidencijaEksplozivaDLL.Eksploziv oznaceniEksploziv)
        {
            InitializeComponent();
            buttonDodaj.Enabled = false;
            this.OznaceniEksploziv = oznaceniEksploziv;
            buttonDodaj.Text = "Uredi";
            textBoxOznaka.Text = oznaceniEksploziv.Oznaka;
            textBoxKolicina.Text = oznaceniEksploziv.Kolicina.ToString();
            textBoxTezina.Text = oznaceniEksploziv.Tezina.ToString();
            if (oznaceniEksploziv.Status == "Aktivan") radioButtonAktivno.Checked = true;
            else if (oznaceniEksploziv.Status == "Neaktivan") radioButtonNeaktivno.Checked = true;
            if (oznaceniEksploziv.Vrsta == "MES") radioButtonMES.Checked = true;
            else if (oznaceniEksploziv.Vrsta == "NUS") radioButtonNUS.Checked = true;

        }

        private void FormDodajEksplozivnoSredstvo_Load(object sender, EventArgs e)
        {
            labelIDNazivProjekta.Text = Eksplozivi.OznaceniProjekt.ImeProjekta;
        }

        private void buttonOdustani_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void buttonDodaj_Click(object sender, EventArgs e)
        {
            EvidencijaEksplozivaDLL.Eksploziv noviEksploziv = new EvidencijaEksplozivaDLL.Eksploziv();
            noviEksploziv.IDProjekta = Eksplozivi.OznaceniProjekt.IDprojekta;
            noviEksploziv.Oznaka = textBoxOznaka.Text;
            noviEksploziv.Kolicina = decimal.Parse(textBoxKolicina.Text);
            noviEksploziv.Tezina = decimal.Parse(textBoxTezina.Text);
            if (radioButtonAktivno.Checked) noviEksploziv.Status = "Aktivan";
            if (radioButtonNeaktivno.Checked) noviEksploziv.Status = "Neaktivan";
            if (radioButtonMES.Checked) noviEksploziv.Vrsta = "MES";
            if (radioButtonNUS.Checked) noviEksploziv.Vrsta = "NUS";

            if (buttonDodaj.Text == "Uredi")
            {
                Eksplozivi.AzurirajEksplozivnoSredstvo(noviEksploziv, this.OznaceniEksploziv);
            }
            else
            {
                Eksplozivi.DodajEksplozivnoSredstvo(noviEksploziv);
            }
            this.Close();
        }

        private void FormDodajEksplozivnoSredstvo_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1022");
        }

        private void textBoxKolicina_TextChanged(object sender, EventArgs e)
        {
            Provjera2();
        }

        private void Provjera()
        {
            porukaLabel.Text = "";

            try
            {
                decimal količina = Convert.ToDecimal(textBoxKolicina.Text);
            }
            catch (Exception)
            {
                porukaLabel.ForeColor = Color.Red;
                porukaLabel.Text = "Količina treba biti izražena brojem";
                buttonDodaj.Enabled = false;
            }

            try
            {
                decimal težina = Convert.ToDecimal(textBoxTezina.Text);
            }
            catch (Exception)
            {
                porukaLabel.ForeColor = Color.Red;
                porukaLabel.Text = "Težina treba biti izražena brojem";
                buttonDodaj.Enabled = false;
            }
        }

        private void Provjera2()
        {
            if (textBoxOznaka.Text != "" && textBoxKolicina.Text != "" && textBoxTezina.Text != "")
            {
                if (Provjera3() == true)
                {
                    buttonDodaj.Enabled = true;
                    Provjera();
                }
            }
        }

        private bool Provjera3()
        {
            bool rez = false;
            if (radioButtonAktivno.Checked)
            {
                rez = true;
            }

            if (radioButtonNeaktivno.Checked)
            {
                rez = true;
            }

            if (radioButtonNeaktivno.Checked)
            {
                rez = true;
            }

            if (radioButtonNUS.Checked)
            {
                rez = true;
            }

            return rez;
        }

        private void textBoxTezina_TextChanged(object sender, EventArgs e)
        {
            Provjera2();
        }

        private void radioButtonAktivno_CheckedChanged(object sender, EventArgs e)
        {
            Provjera2();
        }

        private void radioButtonNeaktivno_CheckedChanged(object sender, EventArgs e)
        {
            Provjera2();
        }

        private void radioButtonMES_CheckedChanged(object sender, EventArgs e)
        {
            Provjera2();
        }

        private void radioButtonNUS_CheckedChanged(object sender, EventArgs e)
        {
            Provjera2();
        }

        private void textBoxOznaka_TextChanged(object sender, EventArgs e)
        {
            Provjera2();
        }
    }
}
