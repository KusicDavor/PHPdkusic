using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Zaposlenici
{
    public partial class FormObrisiZaposlenika : Form
    {
        private Zaposlenik odabranZaBrisanje;
        private Projekt projektOdabranogZaposlenika;
        private string Forma { get; set; }
        public FormObrisiZaposlenika(Zaposlenik odabranZ, Projekt odabranP, string forma)
        {
            InitializeComponent();
            this.odabranZaBrisanje = odabranZ;
            this.projektOdabranogZaposlenika = odabranP;
            this.Forma = forma;
        }

        private void NeButton_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void DaButton_Click(object sender, EventArgs e)
        {
            if (this.Forma == "Zaposlenici") Repozitorij.ObrišiZaposlenika(this.odabranZaBrisanje);
            if (this.Forma == "Podjela") Repozitorij.UkloniZaposlenikaSProjekta(this.odabranZaBrisanje, this.projektOdabranogZaposlenika);
            this.Close();
        }

        private void FormObrisiZaposlenika_Load(object sender, EventArgs e)
        {

        }

        private void FormObrisiZaposlenika_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "1005");
        }
    }
}
