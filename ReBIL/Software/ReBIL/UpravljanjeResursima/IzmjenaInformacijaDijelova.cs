using System;
using System.Collections.Generic;
using System.Drawing;
using System.Windows.Forms;

namespace UpravljanjeResursima
{
    public partial class IzmjenaInformacijaDijelova : Form
    {
        private KatalogDijelova selectedKatalog;
        public IzmjenaInformacijaDijelova(KatalogDijelova katalog)
        {
            InitializeComponent();
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
            selectedKatalog = katalog;
        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void toolStripButtonUpravljanjeDijelovima_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeDijelovima.Show();
            this.Close();
        }

        private void toolStripButtonUpravljanjeResursima_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeResursima.Show();
            this.Close();
            NavigacijaDLL.Forme.UpravljanjeDijelovima.Close();
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            this.Close();
            NavigacijaDLL.Forme.UpravljanjeDijelovima.Close();
            NavigacijaDLL.Forme.UpravljanjeResursima.Close();
        }

        private void IzmjenaInformacijaDijelova_Load(object sender, EventArgs e)
        {
            txtNazivDijela.Text = selectedKatalog.NazivDijela.ToString();
        }

        private void btnAzurirajDijelove_Click(object sender, EventArgs e)
        {
            if (txtNazivDijela.Text == "" )
            {
                labelPoruka.Text = "Pogrešno uneseni podaci, molim upišite sve";
            }
            else
            {
                KatalogDijelova urediKatalog = new KatalogDijelova
                {
                    NazivDijela = txtNazivDijela.Text
                };
                BazaPodataka.UrediKatalog(selectedKatalog, urediKatalog);
                DodavanjeDijelova dodavanjeDijelova = new DodavanjeDijelova();
                dodavanjeDijelova.Show();
                this.Close();
            }
        }
        private void btnOdustaniAzuriranjeDijelova_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeDijelovima.Show();
            this.Close();
        }

        private void IzmjenaInformacijaDijelova_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1026");
        }
        private void txtNazivDijela_TextChanged(object sender, EventArgs e)
        {
            if (txtNazivDijela.Text == "")
            {
                btnAzurirajDijelove.Enabled = false;
            }
            Provjera();
        }

        private void Provjera()
        {
            if (txtNazivDijela.Text != "")
            {
                btnAzurirajDijelove.Enabled = true;
            }
        }
    }
}
