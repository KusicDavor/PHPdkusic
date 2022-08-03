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
    public partial class FormStatistika : Form
    {
        Projekt odabraniProjekt;
        public FormStatistika(Projekt projekt)
        {
            InitializeComponent();
            odabraniProjekt = projekt;
        }

        private void zatvoriStatistikaButton_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void FormStatistika_Load(object sender, EventArgs e)
        {
            Statistika statistika;
            statistika =  Repozitorij.DohvatiStatistiku(odabraniProjekt);

            labelNazivProjekta.Text = statistika.NazivProjekta;
            labelZNP.Text = statistika.BrojZNP.ToString();
            labelBPES.Text = statistika.BrojPES.ToString();
            labelBAR.Text = statistika.BrojAR.ToString();
            labelBZR.Text = statistika.BrojZR.ToString();
            labelBR.Text = statistika.BrojRezervacija.ToString();
            
        }

        private void FormStatistika_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1023");
        }
    }
}
