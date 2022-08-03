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
    public partial class FormDodajDokumentaciju : Form
    {
        Projekt odabraniProjekt;
        private Dokumentacija odabraniDokument;

        public FormDodajDokumentaciju(Projekt projekt)
        {
            InitializeComponent();
            odabraniProjekt = projekt;
        }

        public FormDodajDokumentaciju(Dokumentacija dokumentacija, Projekt projekt)
        {
            InitializeComponent();
            odabraniProjekt = projekt;
            odabraniDokument = dokumentacija;
            dokumentacijaDodavanjeTxtBox.Text = dokumentacija.Naziv;
            rokDodavanjeDTP.Value = dokumentacija.Rok;

            if (odabraniDokument.Status == "U izradi")
            {
                uIzradiDodavanjeRadioButton.Checked = true;
            }
            else if (odabraniDokument.Status == "Izradena")
            {
                izradenaDodavanjeRadioButton.Checked = true;
            }
            else
            {
                predanaDodavanjeRadioButton.Checked = true;
            }

            dodajDokumentacijuButton.Text = "Ažuriraj dokumentaciju";
        }

        private void dodajRokButton_Click(object sender, EventArgs e)
        {
            if (dodajDokumentacijuButton.Text == "Dodaj dokumentaciju")
            {
                string nazivDokumenta = dokumentacijaDodavanjeTxtBox.Text;
                System.DateTime datum = rokDodavanjeDTP.Value;
                string status = null;

                if (uIzradiDodavanjeRadioButton.Checked)
                {
                    status = uIzradiDodavanjeRadioButton.Text;
                }
                else if (izradenaDodavanjeRadioButton.Checked)
                {
                    status = izradenaDodavanjeRadioButton.Text;
                }
                else if (predanaDodavanjeRadioButton.Checked)
                {
                    status = predanaDodavanjeRadioButton.Text;
                }

                Dokumentacija dokument = new Dokumentacija
                {
                    Naziv = nazivDokumenta,
                    Rok = datum,
                    Status = status,
                    Projekt = odabraniProjekt
                };

                Repozitorij.DodajDokumentaciju(dokument, odabraniProjekt);
                Close();
            } else
            {
                string nazivDokumenta = dokumentacijaDodavanjeTxtBox.Text;
                System.DateTime datum = rokDodavanjeDTP.Value;
                string status = null;

                if (uIzradiDodavanjeRadioButton.Checked)
                {
                    status = uIzradiDodavanjeRadioButton.Text;
                }
                else if (izradenaDodavanjeRadioButton.Checked)
                {
                    status = izradenaDodavanjeRadioButton.Text;
                }
                else if (predanaDodavanjeRadioButton.Checked)
                {
                    status = predanaDodavanjeRadioButton.Text;
                }

                Dokumentacija ažurirani = new Dokumentacija
                {
                    Naziv = nazivDokumenta,
                    Rok = datum,
                    Status = status,
                    Projekt = odabraniProjekt
                };

                Repozitorij.AžurirajDokumentaciju(odabraniDokument, ažurirani, odabraniProjekt);
                Close();
            }
           
        }

        private void odustaniDodavanjeButton_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void dokumentacijaDodavanjeTxtBox_TextChanged(object sender, EventArgs e)
        {
            provjera();
        }

        private void provjera()
        {
            if (dokumentacijaDodavanjeTxtBox.Text != "" && (uIzradiDodavanjeRadioButton.Checked ||  izradenaDodavanjeRadioButton.Checked || predanaDodavanjeRadioButton.Checked) )
            {
                dodajDokumentacijuButton.Enabled = true;
            }
            else
            {
                dodajDokumentacijuButton.Enabled = false;
            }
        }

        private void FormDodajDokumentaciju_Load(object sender, EventArgs e)
        {
            dodajDokumentacijuButton.Enabled = false;
            provjera();
        }

        private void uIzradiDodavanjeRadioButton_CheckedChanged(object sender, EventArgs e)
        {
            provjera();
        }

        private void izradenaDodavanjeRadioButton_CheckedChanged(object sender, EventArgs e)
        {
            provjera();
        }

        private void predanaDodavanjeRadioButton_CheckedChanged(object sender, EventArgs e)
        {
            provjera();
        }

        private void FormDodajDokumentaciju_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1018");
        }
    }
}
