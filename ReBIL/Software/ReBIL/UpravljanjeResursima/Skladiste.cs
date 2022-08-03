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
    public partial class Skladiste : Form
    {
        public Skladiste()
        {
            InitializeComponent();
            NavigacijaDLL.Forme.Skladiste = this;
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
        }
        private void Osvjezi()
        {
            dgvDijelovi.DataSource = BazaPodataka.DohvatiDijeloveKataloga();
        }
        private void Skladiste_Load(object sender, EventArgs e)
        {
            Osvjezi();
        }

        private void btnPromjeniKolicinu_Click(object sender, EventArgs e)
        {
            int serijski = Convert.ToInt32(dgvDijelovi.CurrentRow.Cells[0].Value);
            if (txtKolicinaDijelova.Text == "")
            {
                labelPoruka.Text = "Unesite tocne podatke";
            }
            else
            {
                int kolicina = Int32.Parse(txtKolicinaDijelova.Text);
                BazaPodataka.UrediKolicinu(serijski, kolicina);
            }
            Osvjezi();
        }
        private void Provjera()
        {
            btnPromjeniKolicinu.Enabled = true;
            {
                labelPoruka.Text = "";

                try
                {
                    int količina = Convert.ToInt32(txtKolicinaDijelova.Text);
                }
                catch (FormatException)
                {
                    labelPoruka.ForeColor = Color.Red;
                    labelPoruka.Text = "Količina treba biti izražena brojem";
                    btnPromjeniKolicinu.Enabled = false;
                }
            }
        }
        private void txtKolicinaDijelova_TextChanged(object sender, EventArgs e)
        {
            Provjera();
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            this.Close();
            NavigacijaDLL.Forme.UpravljanjeResursima.Close();
            NavigacijaDLL.Forme.UpravljanjeDijelovima.Close();
        }

        private void toolStripButtonUpravljanjeResursima_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeResursima.Show();
            this.Close();
            NavigacijaDLL.Forme.UpravljanjeDijelovima.Close();
        }

        private void toolStripButton1_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeDijelovima.Show();
            this.Close();
        }

        private void toolStripButtonZatvori_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void btnOdustani_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.UpravljanjeDijelovima.Show();
            this.Close();
        }
    }
}
