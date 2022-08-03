using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using PrijavaDLL;

namespace ReBIL
{
    public partial class FormPrijava : Form
    {
        public FormPrijava()
        {
            InitializeComponent();
            NavigacijaDLL.Forme.FormPrijava = this;
        }

        private void buttonPrijava_Click(object sender, EventArgs e)
        {
            if (PrijavaDLL.Provjera.ProvjeriKorisnickoIme(textBoxKorisnickoIme.Text))
            {
                if (PrijavaDLL.Provjera.ProvjeriUnos(textBoxKorisnickoIme.Text, textBoxLozinka.Text))
                {
                    NavigacijaDLL.Forme.PrijavljeniKorisnik = PrijavaDLL.Provjera.Prijavljeni();
                    FormGlavniIzbornik formGlavniIzbornik = new FormGlavniIzbornik();
                    formGlavniIzbornik.Show();
                    this.Hide();
                }
                else
                {
                    labelObavijest.Text = "Pogresno korisnicko ime ili lozinka!";
                    labelObavijest.ForeColor = Color.Red;
                }
            }
            else
            {
                labelObavijest.Text = "Pogresno korisnicko ime ili lozinka!";
                labelObavijest.ForeColor = Color.Red;
            }
        }

        private void textBoxLozinka_Click(object sender, EventArgs e)
        {
            textBoxLozinka.Text = "";
            labelObavijest.Text = "";
        }

        private void textBoxKorisnickoIme_Click(object sender, EventArgs e)
        {
            textBoxKorisnickoIme.Text = "";
            labelObavijest.Text = "";
        }

        private void FormPrijava_Load(object sender, EventArgs e)
        {
            textBoxLozinka.UseSystemPasswordChar = true;
            labelObavijest.Text = "";
        }

        private void FormPrijava_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "2");
        }
    }
}
