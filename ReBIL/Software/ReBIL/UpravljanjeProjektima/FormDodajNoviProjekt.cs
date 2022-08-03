using System;
using System.Drawing;
using System.Windows.Forms;

namespace UpravljanjeProjektima
{
    public partial class FormDodajNoviProjekt : Form
    {
        private Projekt odabran = new Projekt();
        public FormDodajNoviProjekt()
        {
            InitializeComponent();
            DohvatiCombo();
        }

        public FormDodajNoviProjekt(Projekt selektiran)
        {
            InitializeComponent();
            odabran = selektiran;
            NazivProjektaTxtBox.Text = selektiran.ImeProjekta;
            VoditeljCombo.Text = selektiran.VoditeljRadilišta;
        }

        private void OdustaniProjektButton_Click(object sender, EventArgs e)
        {
            Close();
            NavigacijaDLL.Forme.UpravljanjeProjektima.Show();
        }

        private void FormDodajNoviProjekt_Load(object sender, EventArgs e)
        {
            if (odabran.IDprojekta != 0)
            {
                DodajProjektButton.Text = "Ažuriraj";
            }
            else
            {
                DodajProjektButton.Text = "Dodaj";
            }

            DodajProjektButton.Enabled = false;
        }

        private void DohvatiCombo()
        {
            VoditeljCombo.DataSource = Repozitorij.DohvatiVoditelje();
        }

        private void DodajProjektButton_Click(object sender, EventArgs e)
        {
            if (DodajProjektButton.Text == "Ažuriraj")
            {
                Projekt novi = new Projekt();
                string voditeljIme = VoditeljCombo.Text.Split(',')[0];
                novi.ImeProjekta = NazivProjektaTxtBox.Text;
                novi.VoditeljRadilišta = voditeljIme;
                Repozitorij.AžurirajProjekt(odabran, novi);
                Close();
            }
            else
            {
                string voditeljIme = VoditeljCombo.Text.Split(',')[0];
                string voditeljOIB = VoditeljCombo.Text.Split(',')[1];

                Projekt novi = new Projekt();
                novi.ImeProjekta = NazivProjektaTxtBox.Text;
                novi.VoditeljRadilišta = voditeljIme;

                Repozitorij.DodajProjekt(novi);
                Close();
            }
        }

        private void VoditeljCombo_Click(object sender, EventArgs e)
        {
            DohvatiCombo();
        }

        private void NazivProjektaTxtBox_TextChanged(object sender, EventArgs e)
        {
            if (NazivProjektaTxtBox.Text.Length <= 0)
            {
                PorukaLabel.ForeColor = Color.Red;
                PorukaLabel.Text = "Unesite ime projekta!";
            }
            else
            {
                PorukaLabel.Text = "";
                DodajProjektButton.Enabled = true;
            }
        }

        private void FormDodajNoviProjekt_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1012");
        }
    }
}
