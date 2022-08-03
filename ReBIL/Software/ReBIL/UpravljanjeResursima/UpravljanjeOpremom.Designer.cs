namespace UpravljanjeResursima
{
    partial class UpravljanjeOpremom
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(UpravljanjeOpremom));
            this.btnOdustaniOprema = new System.Windows.Forms.Button();
            this.btnObrisiOpremu = new System.Windows.Forms.Button();
            this.panelNavigacijskaTraka = new System.Windows.Forms.Panel();
            this.labelPozdrav = new System.Windows.Forms.Label();
            this.pictureBoxReBILLOGO = new System.Windows.Forms.PictureBox();
            this.toolStripNavigacijskaTraka = new System.Windows.Forms.ToolStrip();
            this.toolStripButtonZatvori = new System.Windows.Forms.ToolStripButton();
            this.toolStripButtonGlavniIzbornik = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb = new System.Windows.Forms.ToolStripLabel();
            this.toolStripButtonUpravljanjeResursima = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb2 = new System.Windows.Forms.ToolStripLabel();
            this.toolStripLabelDodavanjeOpreme = new System.Windows.Forms.ToolStripLabel();
            this.btnDodajOpremu = new System.Windows.Forms.Button();
            this.dgvListaOpreme = new System.Windows.Forms.DataGridView();
            this.txtKolicinaOpreme = new System.Windows.Forms.TextBox();
            this.label6 = new System.Windows.Forms.Label();
            this.dtDatumKupnje = new System.Windows.Forms.DateTimePicker();
            this.txtNazivOpreme = new System.Windows.Forms.TextBox();
            this.label2 = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.cmbZaduzeniZaposlenik = new System.Windows.Forms.ComboBox();
            this.label3 = new System.Windows.Forms.Label();
            this.btnUrediOpremu = new System.Windows.Forms.Button();
            this.labelPoruka = new System.Windows.Forms.Label();
            this.panelNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).BeginInit();
            this.toolStripNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaOpreme)).BeginInit();
            this.SuspendLayout();
            // 
            // btnOdustaniOprema
            // 
            this.btnOdustaniOprema.Location = new System.Drawing.Point(352, 384);
            this.btnOdustaniOprema.Name = "btnOdustaniOprema";
            this.btnOdustaniOprema.Size = new System.Drawing.Size(116, 42);
            this.btnOdustaniOprema.TabIndex = 40;
            this.btnOdustaniOprema.Text = "Odustani";
            this.btnOdustaniOprema.UseVisualStyleBackColor = true;
            this.btnOdustaniOprema.Click += new System.EventHandler(this.btnOdustaniOprema_Click);
            // 
            // btnObrisiOpremu
            // 
            this.btnObrisiOpremu.Location = new System.Drawing.Point(352, 316);
            this.btnObrisiOpremu.Name = "btnObrisiOpremu";
            this.btnObrisiOpremu.Size = new System.Drawing.Size(116, 42);
            this.btnObrisiOpremu.TabIndex = 39;
            this.btnObrisiOpremu.Text = "Obriši opremu";
            this.btnObrisiOpremu.UseVisualStyleBackColor = true;
            this.btnObrisiOpremu.Click += new System.EventHandler(this.btnObrisiOpremu_Click);
            // 
            // panelNavigacijskaTraka
            // 
            this.panelNavigacijskaTraka.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.panelNavigacijskaTraka.Controls.Add(this.labelPozdrav);
            this.panelNavigacijskaTraka.Controls.Add(this.pictureBoxReBILLOGO);
            this.panelNavigacijskaTraka.Controls.Add(this.toolStripNavigacijskaTraka);
            this.panelNavigacijskaTraka.Location = new System.Drawing.Point(0, 0);
            this.panelNavigacijskaTraka.Name = "panelNavigacijskaTraka";
            this.panelNavigacijskaTraka.Size = new System.Drawing.Size(1044, 70);
            this.panelNavigacijskaTraka.TabIndex = 62;
            // 
            // labelPozdrav
            // 
            this.labelPozdrav.AutoSize = true;
            this.labelPozdrav.Location = new System.Drawing.Point(70, 52);
            this.labelPozdrav.Name = "labelPozdrav";
            this.labelPozdrav.Size = new System.Drawing.Size(46, 13);
            this.labelPozdrav.TabIndex = 17;
            this.labelPozdrav.Text = "Pozdrav";
            // 
            // pictureBoxReBILLOGO
            // 
            this.pictureBoxReBILLOGO.Image = global::UpravljanjeResursima.Properties.Resources.ReBilLogo;
            this.pictureBoxReBILLOGO.Location = new System.Drawing.Point(3, 3);
            this.pictureBoxReBILLOGO.Name = "pictureBoxReBILLOGO";
            this.pictureBoxReBILLOGO.Size = new System.Drawing.Size(57, 50);
            this.pictureBoxReBILLOGO.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBoxReBILLOGO.TabIndex = 16;
            this.pictureBoxReBILLOGO.TabStop = false;
            // 
            // toolStripNavigacijskaTraka
            // 
            this.toolStripNavigacijskaTraka.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.toolStripNavigacijskaTraka.AutoSize = false;
            this.toolStripNavigacijskaTraka.Dock = System.Windows.Forms.DockStyle.None;
            this.toolStripNavigacijskaTraka.GripStyle = System.Windows.Forms.ToolStripGripStyle.Hidden;
            this.toolStripNavigacijskaTraka.ImageScalingSize = new System.Drawing.Size(24, 24);
            this.toolStripNavigacijskaTraka.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.toolStripButtonZatvori,
            this.toolStripButtonGlavniIzbornik,
            this.toolStripLabelBreadcrumb,
            this.toolStripButtonUpravljanjeResursima,
            this.toolStripLabelBreadcrumb2,
            this.toolStripLabelDodavanjeOpreme});
            this.toolStripNavigacijskaTraka.Location = new System.Drawing.Point(62, 10);
            this.toolStripNavigacijskaTraka.Name = "toolStripNavigacijskaTraka";
            this.toolStripNavigacijskaTraka.Padding = new System.Windows.Forms.Padding(5);
            this.toolStripNavigacijskaTraka.RenderMode = System.Windows.Forms.ToolStripRenderMode.System;
            this.toolStripNavigacijskaTraka.Size = new System.Drawing.Size(980, 41);
            this.toolStripNavigacijskaTraka.Stretch = true;
            this.toolStripNavigacijskaTraka.TabIndex = 15;
            this.toolStripNavigacijskaTraka.Text = "Navigacijska Traka";
            // 
            // toolStripButtonZatvori
            // 
            this.toolStripButtonZatvori.Alignment = System.Windows.Forms.ToolStripItemAlignment.Right;
            this.toolStripButtonZatvori.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Text;
            this.toolStripButtonZatvori.Image = ((System.Drawing.Image)(resources.GetObject("toolStripButtonZatvori.Image")));
            this.toolStripButtonZatvori.ImageTransparentColor = System.Drawing.Color.Magenta;
            this.toolStripButtonZatvori.Name = "toolStripButtonZatvori";
            this.toolStripButtonZatvori.Size = new System.Drawing.Size(48, 28);
            this.toolStripButtonZatvori.Text = "Zatvori";
            this.toolStripButtonZatvori.Click += new System.EventHandler(this.toolStripButtonZatvori_Click);
            // 
            // toolStripButtonGlavniIzbornik
            // 
            this.toolStripButtonGlavniIzbornik.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Text;
            this.toolStripButtonGlavniIzbornik.Image = ((System.Drawing.Image)(resources.GetObject("toolStripButtonGlavniIzbornik.Image")));
            this.toolStripButtonGlavniIzbornik.ImageTransparentColor = System.Drawing.Color.Magenta;
            this.toolStripButtonGlavniIzbornik.Name = "toolStripButtonGlavniIzbornik";
            this.toolStripButtonGlavniIzbornik.Size = new System.Drawing.Size(89, 28);
            this.toolStripButtonGlavniIzbornik.Text = "Glavni Izbornik";
            this.toolStripButtonGlavniIzbornik.Click += new System.EventHandler(this.toolStripButtonGlavniIzbornik_Click);
            // 
            // toolStripLabelBreadcrumb
            // 
            this.toolStripLabelBreadcrumb.Name = "toolStripLabelBreadcrumb";
            this.toolStripLabelBreadcrumb.Size = new System.Drawing.Size(15, 28);
            this.toolStripLabelBreadcrumb.Text = ">";
            // 
            // toolStripButtonUpravljanjeResursima
            // 
            this.toolStripButtonUpravljanjeResursima.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Text;
            this.toolStripButtonUpravljanjeResursima.Image = ((System.Drawing.Image)(resources.GetObject("toolStripButtonUpravljanjeResursima.Image")));
            this.toolStripButtonUpravljanjeResursima.ImageTransparentColor = System.Drawing.Color.Magenta;
            this.toolStripButtonUpravljanjeResursima.Name = "toolStripButtonUpravljanjeResursima";
            this.toolStripButtonUpravljanjeResursima.Size = new System.Drawing.Size(124, 28);
            this.toolStripButtonUpravljanjeResursima.Text = "Upravljanje resursima";
            this.toolStripButtonUpravljanjeResursima.Click += new System.EventHandler(this.toolStripButtonUpravljanjeResursima_Click);
            // 
            // toolStripLabelBreadcrumb2
            // 
            this.toolStripLabelBreadcrumb2.Name = "toolStripLabelBreadcrumb2";
            this.toolStripLabelBreadcrumb2.Size = new System.Drawing.Size(15, 28);
            this.toolStripLabelBreadcrumb2.Text = ">";
            // 
            // toolStripLabelDodavanjeOpreme
            // 
            this.toolStripLabelDodavanjeOpreme.Name = "toolStripLabelDodavanjeOpreme";
            this.toolStripLabelDodavanjeOpreme.Size = new System.Drawing.Size(157, 28);
            this.toolStripLabelDodavanjeOpreme.Text = "Dodavanje i brisanje opreme";
            // 
            // btnDodajOpremu
            // 
            this.btnDodajOpremu.Location = new System.Drawing.Point(352, 193);
            this.btnDodajOpremu.Name = "btnDodajOpremu";
            this.btnDodajOpremu.Size = new System.Drawing.Size(116, 42);
            this.btnDodajOpremu.TabIndex = 39;
            this.btnDodajOpremu.Text = "Dodaj opremu";
            this.btnDodajOpremu.UseVisualStyleBackColor = true;
            this.btnDodajOpremu.Click += new System.EventHandler(this.btnDodajOpremu_Click);
            // 
            // dgvListaOpreme
            // 
            this.dgvListaOpreme.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvListaOpreme.Location = new System.Drawing.Point(487, 107);
            this.dgvListaOpreme.Name = "dgvListaOpreme";
            this.dgvListaOpreme.RowHeadersWidth = 62;
            this.dgvListaOpreme.Size = new System.Drawing.Size(546, 361);
            this.dgvListaOpreme.TabIndex = 63;
            this.dgvListaOpreme.SelectionChanged += new System.EventHandler(this.dgvListaOpreme_SelectionChanged);
            // 
            // txtKolicinaOpreme
            // 
            this.txtKolicinaOpreme.Location = new System.Drawing.Point(130, 316);
            this.txtKolicinaOpreme.Name = "txtKolicinaOpreme";
            this.txtKolicinaOpreme.Size = new System.Drawing.Size(96, 20);
            this.txtKolicinaOpreme.TabIndex = 70;
            this.txtKolicinaOpreme.TextChanged += new System.EventHandler(this.txtKolicinaOpreme_TextChanged);
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(30, 316);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(85, 13);
            this.label6.TabIndex = 69;
            this.label6.Text = "Količina opreme:";
            // 
            // dtDatumKupnje
            // 
            this.dtDatumKupnje.Location = new System.Drawing.Point(130, 281);
            this.dtDatumKupnje.Name = "dtDatumKupnje";
            this.dtDatumKupnje.Size = new System.Drawing.Size(200, 20);
            this.dtDatumKupnje.TabIndex = 68;
            // 
            // txtNazivOpreme
            // 
            this.txtNazivOpreme.Location = new System.Drawing.Point(130, 245);
            this.txtNazivOpreme.MaxLength = 30;
            this.txtNazivOpreme.Name = "txtNazivOpreme";
            this.txtNazivOpreme.Size = new System.Drawing.Size(200, 20);
            this.txtNazivOpreme.TabIndex = 67;
            this.txtNazivOpreme.TextChanged += new System.EventHandler(this.txtNazivOpreme_TextChanged);
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(36, 281);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(76, 13);
            this.label2.TabIndex = 66;
            this.label2.Text = "Datum kupnje:";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(38, 249);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(75, 13);
            this.label1.TabIndex = 65;
            this.label1.Text = "Naziv opreme:";
            // 
            // cmbZaduzeniZaposlenik
            // 
            this.cmbZaduzeniZaposlenik.FormattingEnabled = true;
            this.cmbZaduzeniZaposlenik.Location = new System.Drawing.Point(130, 214);
            this.cmbZaduzeniZaposlenik.Margin = new System.Windows.Forms.Padding(2);
            this.cmbZaduzeniZaposlenik.Name = "cmbZaduzeniZaposlenik";
            this.cmbZaduzeniZaposlenik.Size = new System.Drawing.Size(200, 21);
            this.cmbZaduzeniZaposlenik.TabIndex = 72;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(9, 216);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(107, 13);
            this.label3.TabIndex = 65;
            this.label3.Text = "Zaduženi zaposlenik:";
            // 
            // btnUrediOpremu
            // 
            this.btnUrediOpremu.Location = new System.Drawing.Point(352, 259);
            this.btnUrediOpremu.Name = "btnUrediOpremu";
            this.btnUrediOpremu.Size = new System.Drawing.Size(116, 42);
            this.btnUrediOpremu.TabIndex = 39;
            this.btnUrediOpremu.Text = "Uredi opremu";
            this.btnUrediOpremu.UseVisualStyleBackColor = true;
            this.btnUrediOpremu.Click += new System.EventHandler(this.btnUrediOpremu_Click);
            // 
            // labelPoruka
            // 
            this.labelPoruka.AutoSize = true;
            this.labelPoruka.Location = new System.Drawing.Point(181, 181);
            this.labelPoruka.Name = "labelPoruka";
            this.labelPoruka.Size = new System.Drawing.Size(0, 13);
            this.labelPoruka.TabIndex = 74;
            // 
            // UpravljanjeOpremom
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1044, 511);
            this.ControlBox = false;
            this.Controls.Add(this.labelPoruka);
            this.Controls.Add(this.cmbZaduzeniZaposlenik);
            this.Controls.Add(this.txtKolicinaOpreme);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.dtDatumKupnje);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.txtNazivOpreme);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.dgvListaOpreme);
            this.Controls.Add(this.panelNavigacijskaTraka);
            this.Controls.Add(this.btnOdustaniOprema);
            this.Controls.Add(this.btnUrediOpremu);
            this.Controls.Add(this.btnDodajOpremu);
            this.Controls.Add(this.btnObrisiOpremu);
            this.Name = "UpravljanjeOpremom";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Dodavanje i brisanje opreme";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.DodavanjeOpreme_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.UpravljanjeOpremom_HelpRequested);
            this.panelNavigacijskaTraka.ResumeLayout(false);
            this.panelNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).EndInit();
            this.toolStripNavigacijskaTraka.ResumeLayout(false);
            this.toolStripNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaOpreme)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion
        private System.Windows.Forms.Button btnOdustaniOprema;
        private System.Windows.Forms.Button btnObrisiOpremu;
        private System.Windows.Forms.Panel panelNavigacijskaTraka;
        private System.Windows.Forms.Label labelPozdrav;
        private System.Windows.Forms.PictureBox pictureBoxReBILLOGO;
        private System.Windows.Forms.ToolStrip toolStripNavigacijskaTraka;
        private System.Windows.Forms.ToolStripButton toolStripButtonZatvori;
        private System.Windows.Forms.ToolStripButton toolStripButtonGlavniIzbornik;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb;
        private System.Windows.Forms.ToolStripButton toolStripButtonUpravljanjeResursima;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb2;
        private System.Windows.Forms.ToolStripLabel toolStripLabelDodavanjeOpreme;
        private System.Windows.Forms.Button btnDodajOpremu;
        private System.Windows.Forms.DataGridView dgvListaOpreme;
        private System.Windows.Forms.TextBox txtKolicinaOpreme;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.DateTimePicker dtDatumKupnje;
        private System.Windows.Forms.TextBox txtNazivOpreme;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.ComboBox cmbZaduzeniZaposlenik;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Button btnUrediOpremu;
        private System.Windows.Forms.Label labelPoruka;
    }
}