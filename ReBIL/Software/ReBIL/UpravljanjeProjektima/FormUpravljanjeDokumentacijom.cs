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
    public partial class FormUpravljanjeDokumentacijom : Form
    {

        Projekt odabraniProjekt;
        public FormUpravljanjeDokumentacijom(Projekt projekt)
        {
            InitializeComponent();
            odabraniProjekt = projekt;
        }

        private void FormUpravljanjeRokovima_Load(object sender, EventArgs e)
        {
            dgvListaRokova.DataSource = Repozitorij.DohvatiListuRokova(odabraniProjekt);
            dgvListaRokova.Columns["Projekt"].Visible = false;
            OfarbajDGV();
            provjera();
        }

        private void provjera()
        {
            if (dgvListaRokova.CurrentRow == null)
            {
                urediRokButton.Enabled = false;
                izbrisiRokButton.Enabled = false;
            }
            else
            {
                urediRokButton.Enabled = true;
                izbrisiRokButton.Enabled = true;
            }
        }

        private void dodajRokButton_Click(object sender, EventArgs e)
        {
            FormDodajDokumentaciju form = new FormDodajDokumentaciju(odabraniProjekt);
            form.ShowDialog();
            dgvListaRokova.DataSource = Repozitorij.DohvatiListuRokova(odabraniProjekt);
            OfarbajDGV();
        }

        private void urediRokButton_Click(object sender, EventArgs e)
        {
            Dokumentacija odabraniDokument = dgvListaRokova.CurrentRow.DataBoundItem as Dokumentacija;
            FormDodajDokumentaciju form = new FormDodajDokumentaciju(odabraniDokument, odabraniProjekt);
            form.ShowDialog();
            dgvListaRokova.DataSource = Repozitorij.DohvatiListuRokova(odabraniProjekt);
            OfarbajDGV();
        }

        private void izbrisiRokButton_Click(object sender, EventArgs e)
        {
            Dokumentacija odabraniDokument = dgvListaRokova.CurrentRow.DataBoundItem as Dokumentacija;
            Repozitorij.IzbrisiRok(odabraniDokument);
            dgvListaRokova.DataSource = Repozitorij.DohvatiListuRokova(odabraniProjekt);
            OfarbajDGV();
        }

        private void zatvoriButton_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void dgvListaRokova_SelectionChanged(object sender, EventArgs e)
        {
            provjera();
        }

        private void OfarbajDGV()
        {
            for (int i = 0; i < dgvListaRokova.Rows.Count; i++)
            {
                DateTime datum = DateTime.Parse(dgvListaRokova.Rows[i].Cells[2].Value.ToString());
                string status = dgvListaRokova.Rows[i].Cells[3].Value.ToString();
                if (datum < DateTime.Now && status != "Predana")
                {
                    dgvListaRokova.Rows[i].DefaultCellStyle.BackColor = Color.Red;
                }
            }
        }

        private void FormUpravljanjeDokumentacijom_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1016");
        }
    }
}
