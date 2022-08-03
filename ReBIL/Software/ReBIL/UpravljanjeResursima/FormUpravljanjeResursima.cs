using System;
using System.Windows.Forms;

namespace UpravljanjeResursima
{
    public partial class FormUpravljanjeResursima : Form
    {
        public FormUpravljanjeResursima()
        {
            InitializeComponent();
            NavigacijaDLL.Forme.UpravljanjeResursima = this;
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            this.Close();
        }

        private void buttonUpravljanjeVozilima_Click(object sender, EventArgs e)
        {
            DodavanjeTransportnihVozila dodavanjeTransportnihVozila = new DodavanjeTransportnihVozila();
            dodavanjeTransportnihVozila.Show();
            this.Hide();
        }
        private void FormUpravljanjeResursima_Load(object sender, EventArgs e)
        {
           
        }

        private void btnUpravljanjeOpremom_Click(object sender, EventArgs e)
        {
            UpravljanjeOpremom upravljanjeOpremom = new UpravljanjeOpremom();
            upravljanjeOpremom.Show();
            this.Hide();
        }

        private void FormUpravljanjeResursima_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1007");
        }

        private void btnUpravljanjeOpremom_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1007");
        }

        private void btnUpravljanjeDIjelovima_Click(object sender, EventArgs e)
        {
            DodavanjeDijelova dodavanjeDijelova = new DodavanjeDijelova();
            dodavanjeDijelova.Show();
            this.Hide();
        }
    }
}
