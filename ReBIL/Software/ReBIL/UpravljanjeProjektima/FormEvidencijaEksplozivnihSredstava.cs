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
    public partial class FormEvidencijaEksplozivnihSredstava : Form
    {
        public FormEvidencijaEksplozivnihSredstava(Projekt odabraniProjekt)
        {
            InitializeComponent();
            labelPozdrav.Text = "Prijavljen: " + NavigacijaDLL.Forme.PrijavljeniKorisnik;
            Eksplozivi.OznaceniProjekt = new EvidencijaEksplozivaDLL.Projekt
            {
                IDprojekta = odabraniProjekt.IDprojekta,
                ImeProjekta = odabraniProjekt.ImeProjekta,
                VoditeljRadilišta = odabraniProjekt.VoditeljRadilišta
            };
        }
        private void FormEvidencijaEksplozivnihSredstava_Load(object sender, EventArgs e)
        {
            labelNaziv.Text = Eksplozivi.OznaceniProjekt.ImeProjekta;
            UrediEksplozivButton.Enabled = false;
            IzbrisiEksplozivButton.Enabled = false;
            Osvjezi();
            Oznaci();
        }

        private void toolStripButtonGlavniIzbornik_Click(object sender, EventArgs e)
        {
            NavigacijaDLL.Forme.GlavniIzbornik.Show();
            this.Close();
            NavigacijaDLL.Forme.UpravljanjeProjektima.Close();
        }

        private void toolStripButtonUpravljanjeProjektima_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void buttonIzlaz_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void DodajESredstvoButton_Click(object sender, EventArgs e)
        {
            FormDodajEksplozivnoSredstvo formDodajEksplozivnoSredstvo = new FormDodajEksplozivnoSredstvo();
            formDodajEksplozivnoSredstvo.ShowDialog();
            Osvjezi();
            Oznaci();
        }
        private void Osvjezi()
        {
            dgvListaEksploziva.DataSource = null;
            dgvListaEksploziva.DataSource = Eksplozivi.DohvatiListuEksploziva();
            dgvListaEksploziva.Columns["IDEksploziv"].Visible = false;
            dgvListaEksploziva.Columns["Projekts"].Visible = false;
            dgvListaEksploziva.Columns["IDProjekta"].Visible = false;
            dgvListaEksploziva.Columns["Tezina"].HeaderText = "Težina";
            dgvListaEksploziva.Columns["Kolicina"].HeaderText = "Količina";
        }

        private void UrediProjektButton_Click(object sender, EventArgs e)
        {
            EvidencijaEksplozivaDLL.Eksploziv oznacenoEksplozivnoSredstvo = dgvListaEksploziva.CurrentRow.DataBoundItem as EvidencijaEksplozivaDLL.Eksploziv;
            FormDodajEksplozivnoSredstvo formDodajEksplozivnoSredstvo = new FormDodajEksplozivnoSredstvo(oznacenoEksplozivnoSredstvo);
            formDodajEksplozivnoSredstvo.ShowDialog();
            Osvjezi();
            Oznaci();
        }

        private void IzbrisiProjektButton_Click(object sender, EventArgs e)
        {
            EvidencijaEksplozivaDLL.Eksploziv oznacenoEksplozivnoSredstvo = dgvListaEksploziva.CurrentRow.DataBoundItem as EvidencijaEksplozivaDLL.Eksploziv;
            ObrisiEksplozivnoSredstvo obrisiEksplozivnoSredstvo = new ObrisiEksplozivnoSredstvo(oznacenoEksplozivnoSredstvo);
            obrisiEksplozivnoSredstvo.ShowDialog();
            Osvjezi();
            Oznaci();
        }

        private void Oznaci()
        {
            foreach (DataGridViewRow row in dgvListaEksploziva.Rows)
            {
                if (row.Selected == false)
                {
                    UrediEksplozivButton.Enabled = false;
                    IzbrisiEksplozivButton.Enabled = false;
                }
            }
            if (dgvListaEksploziva.Rows.Count == 0)
            {
                UrediEksplozivButton.Enabled = false;
                IzbrisiEksplozivButton.Enabled = false;
            }
        }

        private void dgvListaEksploziva_SelectionChanged(object sender, EventArgs e)
        {
            UrediEksplozivButton.Enabled = true;
            IzbrisiEksplozivButton.Enabled = true;
        }

        private void FormEvidencijaEksplozivnihSredstava_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1017");
        }
    }
}
