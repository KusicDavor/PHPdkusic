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
    public partial class ObrisiEksplozivnoSredstvo : Form
    {
        EvidencijaEksplozivaDLL.Eksploziv OznaceniEksploziv;
        public ObrisiEksplozivnoSredstvo(EvidencijaEksplozivaDLL.Eksploziv oznaceniEksploziv)
        {
            InitializeComponent();
            this.OznaceniEksploziv = oznaceniEksploziv;
        }

        private void NeButton_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void DaButton_Click(object sender, EventArgs e)
        {
            EvidencijaEksplozivaDLL.Eksplozivi.IzbrisiSredstvo(this.OznaceniEksploziv);
            this.Close();
        }

        private void ObrisiEksplozivnoSredstvo_HelpRequested(object sender, HelpEventArgs hlpevent)
        {
            string path = AppDomain.CurrentDomain.BaseDirectory;
            string newPath = path.Replace("bin\\Debug\\", "Resources\\HELP.chm");
            Help.ShowHelp(this, newPath, HelpNavigator.TopicId, "5555");
        }
    }
}
