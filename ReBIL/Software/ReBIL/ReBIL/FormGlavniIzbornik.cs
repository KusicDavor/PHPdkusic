using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using Zaposlenici;
using UpravljanjeProjektima;
using UpravljanjeResursima;

namespace ReBIL
{
    public partial class FormGlavniIzbornik : Form
    {
        public FormGlavniIzbornik()
        {
            InitializeComponent();
            NavigacijaDLL.Forme.GlavniIzbornik = this;
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
        }

        private void GlavniIzbornik_FormClosing(object sender, FormClosingEventArgs e)
        {
            Application.Exit();
        }

        private void buttonZaposlenici_Click(object sender, EventArgs e)
        {
            FormZaposlenici formZaposlenici = new FormZaposlenici();
            formZaposlenici.Show();
            this.Hide();
        }

        private void buttonUpravljanjeResursima_Click(object sender, EventArgs e)
        {
            FormUpravljanjeResursima upravljanjeResursima = new FormUpravljanjeResursima();
            upravljanjeResursima.Show();
            this.Hide();
        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void buttonUpravljanjeProjektima_Click(object sender, EventArgs e)
        {
            FormUpravljanjeProjektima formUpravljanjeProjektima = new FormUpravljanjeProjektima();
            formUpravljanjeProjektima.Show();
            this.Hide();
        }

        private void FormGlavniIzbornik_Load(object sender, EventArgs e)
        {

        }

        private void FormGlavniIzbornik_Load_1(object sender, EventArgs e)
        {

        }

        private void FormGlavniIzbornik_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "3");
        }
    }
}
