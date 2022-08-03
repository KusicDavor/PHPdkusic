namespace UpravljanjeResursima
{
    partial class DodavanjeTransportnihVozila
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(DodavanjeTransportnihVozila));
            this.btnOdustaniVozilo = new System.Windows.Forms.Button();
            this.btnDodajVozilo = new System.Windows.Forms.Button();
            this.txtBrojPolice = new System.Windows.Forms.TextBox();
            this.label7 = new System.Windows.Forms.Label();
            this.txtTablicaVozila = new System.Windows.Forms.TextBox();
            this.label6 = new System.Windows.Forms.Label();
            this.txtKilometraza = new System.Windows.Forms.TextBox();
            this.label5 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.txtBrojSasije = new System.Windows.Forms.TextBox();
            this.label3 = new System.Windows.Forms.Label();
            this.dtGodinaKupnje = new System.Windows.Forms.DateTimePicker();
            this.label2 = new System.Windows.Forms.Label();
            this.panelNavigacijskaTraka = new System.Windows.Forms.Panel();
            this.labelPozdrav = new System.Windows.Forms.Label();
            this.pictureBoxReBILLOGO = new System.Windows.Forms.PictureBox();
            this.toolStripNavigacijskaTraka = new System.Windows.Forms.ToolStrip();
            this.toolStripButtonZatvori = new System.Windows.Forms.ToolStripButton();
            this.toolStripButtonGlavniIzbornik = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb = new System.Windows.Forms.ToolStripLabel();
            this.toolStripButtonUpravljanjeResursima = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb2 = new System.Windows.Forms.ToolStripLabel();
            this.toolStripLabelDodavanjeTransportnihVozilima = new System.Windows.Forms.ToolStripLabel();
            this.dgvListaVozila = new System.Windows.Forms.DataGridView();
            this.btnObrisiVozilo = new System.Windows.Forms.Button();
            this.txtMjesecTehnickog = new System.Windows.Forms.TextBox();
            this.btnUrediVozilo = new System.Windows.Forms.Button();
            this.label1 = new System.Windows.Forms.Label();
            this.txtNazivVozila = new System.Windows.Forms.TextBox();
            this.labelPoruka = new System.Windows.Forms.Label();
            this.porukaLabel = new System.Windows.Forms.Label();
            this.panelNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).BeginInit();
            this.toolStripNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaVozila)).BeginInit();
            this.SuspendLayout();
            // 
            // btnOdustaniVozilo
            // 
            this.btnOdustaniVozilo.Location = new System.Drawing.Point(390, 362);
            this.btnOdustaniVozilo.Name = "btnOdustaniVozilo";
            this.btnOdustaniVozilo.Size = new System.Drawing.Size(116, 42);
            this.btnOdustaniVozilo.TabIndex = 27;
            this.btnOdustaniVozilo.Text = "Odustani";
            this.btnOdustaniVozilo.UseVisualStyleBackColor = true;
            this.btnOdustaniVozilo.Click += new System.EventHandler(this.btnOdustaniVozilo_Click);
            // 
            // btnDodajVozilo
            // 
            this.btnDodajVozilo.Location = new System.Drawing.Point(390, 157);
            this.btnDodajVozilo.Name = "btnDodajVozilo";
            this.btnDodajVozilo.Size = new System.Drawing.Size(116, 42);
            this.btnDodajVozilo.TabIndex = 25;
            this.btnDodajVozilo.Text = "Dodaj vozilo";
            this.btnDodajVozilo.UseVisualStyleBackColor = true;
            this.btnDodajVozilo.Click += new System.EventHandler(this.btnDodajVozilo_Click);
            // 
            // txtBrojPolice
            // 
            this.txtBrojPolice.Location = new System.Drawing.Point(174, 327);
            this.txtBrojPolice.MaxLength = 10;
            this.txtBrojPolice.Name = "txtBrojPolice";
            this.txtBrojPolice.Size = new System.Drawing.Size(200, 20);
            this.txtBrojPolice.TabIndex = 23;
            this.txtBrojPolice.TextChanged += new System.EventHandler(this.txtBrojPolice_TextChanged);
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.Location = new System.Drawing.Point(43, 329);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(110, 13);
            this.label7.TabIndex = 28;
            this.label7.Text = "Broj police osiguranja:";
            // 
            // txtTablicaVozila
            // 
            this.txtTablicaVozila.Location = new System.Drawing.Point(174, 257);
            this.txtTablicaVozila.MaxLength = 10;
            this.txtTablicaVozila.Name = "txtTablicaVozila";
            this.txtTablicaVozila.Size = new System.Drawing.Size(96, 20);
            this.txtTablicaVozila.TabIndex = 21;
            this.txtTablicaVozila.TextChanged += new System.EventHandler(this.txtTablicaVozila_TextChanged);
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Location = new System.Drawing.Point(77, 260);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(75, 13);
            this.label6.TabIndex = 26;
            this.label6.Text = "Tablica vozila:";
            // 
            // txtKilometraza
            // 
            this.txtKilometraza.Location = new System.Drawing.Point(174, 292);
            this.txtKilometraza.MaxLength = 6;
            this.txtKilometraza.Name = "txtKilometraza";
            this.txtKilometraza.Size = new System.Drawing.Size(96, 20);
            this.txtKilometraza.TabIndex = 22;
            this.txtKilometraza.TextChanged += new System.EventHandler(this.txtKilometraza_TextChanged);
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(18, 366);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(138, 13);
            this.label5.TabIndex = 23;
            this.label5.Text = "Mjesec tehničkog pregleda:";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(88, 295);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(64, 13);
            this.label4.TabIndex = 22;
            this.label4.Text = "Kilometraža:";
            // 
            // txtBrojSasije
            // 
            this.txtBrojSasije.Location = new System.Drawing.Point(174, 193);
            this.txtBrojSasije.MaxLength = 17;
            this.txtBrojSasije.Name = "txtBrojSasije";
            this.txtBrojSasije.Size = new System.Drawing.Size(200, 20);
            this.txtBrojSasije.TabIndex = 19;
            this.txtBrojSasije.TextChanged += new System.EventHandler(this.txtBrojSasije_TextChanged);
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Location = new System.Drawing.Point(93, 197);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(57, 13);
            this.label3.TabIndex = 20;
            this.label3.Text = "Broj šasije:";
            // 
            // dtGodinaKupnje
            // 
            this.dtGodinaKupnje.Location = new System.Drawing.Point(174, 225);
            this.dtGodinaKupnje.Name = "dtGodinaKupnje";
            this.dtGodinaKupnje.Size = new System.Drawing.Size(200, 20);
            this.dtGodinaKupnje.TabIndex = 20;
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(75, 229);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(79, 13);
            this.label2.TabIndex = 17;
            this.label2.Text = "Godina kupnje:";
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
            this.toolStripNavigacijskaTraka.ImageScalingSize = new System.Drawing.Size(20, 20);
            this.toolStripNavigacijskaTraka.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.toolStripButtonZatvori,
            this.toolStripButtonGlavniIzbornik,
            this.toolStripLabelBreadcrumb,
            this.toolStripButtonUpravljanjeResursima,
            this.toolStripLabelBreadcrumb2,
            this.toolStripLabelDodavanjeTransportnihVozilima});
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
            // toolStripLabelDodavanjeTransportnihVozilima
            // 
            this.toolStripLabelDodavanjeTransportnihVozilima.Name = "toolStripLabelDodavanjeTransportnihVozilima";
            this.toolStripLabelDodavanjeTransportnihVozilima.Size = new System.Drawing.Size(228, 28);
            this.toolStripLabelDodavanjeTransportnihVozilima.Text = "Dodavanje i brisanje transportnih vozilima";
            // 
            // dgvListaVozila
            // 
            this.dgvListaVozila.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvListaVozila.Location = new System.Drawing.Point(525, 119);
            this.dgvListaVozila.Name = "dgvListaVozila";
            this.dgvListaVozila.RowHeadersWidth = 51;
            this.dgvListaVozila.Size = new System.Drawing.Size(506, 366);
            this.dgvListaVozila.TabIndex = 63;
            this.dgvListaVozila.SelectionChanged += new System.EventHandler(this.dgvListaVozila_SelectionChanged);
            // 
            // btnObrisiVozilo
            // 
            this.btnObrisiVozilo.Location = new System.Drawing.Point(390, 292);
            this.btnObrisiVozilo.Name = "btnObrisiVozilo";
            this.btnObrisiVozilo.Size = new System.Drawing.Size(116, 42);
            this.btnObrisiVozilo.TabIndex = 26;
            this.btnObrisiVozilo.Text = "Obriši vozilo";
            this.btnObrisiVozilo.UseVisualStyleBackColor = true;
            this.btnObrisiVozilo.Click += new System.EventHandler(this.btnObrisiVozilo_Click);
            // 
            // txtMjesecTehnickog
            // 
            this.txtMjesecTehnickog.Location = new System.Drawing.Point(174, 362);
            this.txtMjesecTehnickog.MaxLength = 2;
            this.txtMjesecTehnickog.Name = "txtMjesecTehnickog";
            this.txtMjesecTehnickog.Size = new System.Drawing.Size(96, 20);
            this.txtMjesecTehnickog.TabIndex = 24;
            this.txtMjesecTehnickog.TextChanged += new System.EventHandler(this.txtMjesecTehnickog_TextChanged);
            // 
            // btnUrediVozilo
            // 
            this.btnUrediVozilo.Location = new System.Drawing.Point(390, 225);
            this.btnUrediVozilo.Name = "btnUrediVozilo";
            this.btnUrediVozilo.Size = new System.Drawing.Size(116, 42);
            this.btnUrediVozilo.TabIndex = 25;
            this.btnUrediVozilo.Text = "Uredi vozilo";
            this.btnUrediVozilo.UseVisualStyleBackColor = true;
            this.btnUrediVozilo.Click += new System.EventHandler(this.btnUrediVozilo_Click);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(93, 166);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(67, 13);
            this.label1.TabIndex = 20;
            this.label1.Text = "Naziv vozila:";
            // 
            // txtNazivVozila
            // 
            this.txtNazivVozila.Location = new System.Drawing.Point(174, 163);
            this.txtNazivVozila.MaxLength = 20;
            this.txtNazivVozila.Name = "txtNazivVozila";
            this.txtNazivVozila.Size = new System.Drawing.Size(199, 20);
            this.txtNazivVozila.TabIndex = 65;
            this.txtNazivVozila.TextChanged += new System.EventHandler(this.txtNazivVozila_TextChanged);
            // 
            // labelPoruka
            // 
            this.labelPoruka.AutoSize = true;
            this.labelPoruka.Location = new System.Drawing.Point(213, 130);
            this.labelPoruka.Name = "labelPoruka";
            this.labelPoruka.Size = new System.Drawing.Size(0, 13);
            this.labelPoruka.TabIndex = 66;
            // 
            // porukaLabel
            // 
            this.porukaLabel.AutoSize = true;
            this.porukaLabel.Location = new System.Drawing.Point(150, 472);
            this.porukaLabel.Name = "porukaLabel";
            this.porukaLabel.Size = new System.Drawing.Size(0, 13);
            this.porukaLabel.TabIndex = 67;
            // 
            // DodavanjeTransportnihVozila
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1044, 511);
            this.ControlBox = false;
            this.Controls.Add(this.porukaLabel);
            this.Controls.Add(this.labelPoruka);
            this.Controls.Add(this.txtNazivVozila);
            this.Controls.Add(this.dgvListaVozila);
            this.Controls.Add(this.panelNavigacijskaTraka);
            this.Controls.Add(this.btnOdustaniVozilo);
            this.Controls.Add(this.btnObrisiVozilo);
            this.Controls.Add(this.btnUrediVozilo);
            this.Controls.Add(this.btnDodajVozilo);
            this.Controls.Add(this.txtBrojPolice);
            this.Controls.Add(this.label7);
            this.Controls.Add(this.txtTablicaVozila);
            this.Controls.Add(this.label6);
            this.Controls.Add(this.txtMjesecTehnickog);
            this.Controls.Add(this.txtKilometraza);
            this.Controls.Add(this.label5);
            this.Controls.Add(this.label4);
            this.Controls.Add(this.txtBrojSasije);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.label3);
            this.Controls.Add(this.dtGodinaKupnje);
            this.Controls.Add(this.label2);
            this.Name = "DodavanjeTransportnihVozila";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Dodavanje i brisanje transportnih vozila";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.DodavanjeTransportnihVozila_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.DodavanjeTransportnihVozila_HelpRequested);
            this.panelNavigacijskaTraka.ResumeLayout(false);
            this.panelNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).EndInit();
            this.toolStripNavigacijskaTraka.ResumeLayout(false);
            this.toolStripNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaVozila)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button btnOdustaniVozilo;
        private System.Windows.Forms.Button btnDodajVozilo;
        private System.Windows.Forms.TextBox txtBrojPolice;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.TextBox txtTablicaVozila;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.TextBox txtKilometraza;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.TextBox txtBrojSasije;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.DateTimePicker dtGodinaKupnje;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Panel panelNavigacijskaTraka;
        private System.Windows.Forms.Label labelPozdrav;
        private System.Windows.Forms.PictureBox pictureBoxReBILLOGO;
        private System.Windows.Forms.ToolStrip toolStripNavigacijskaTraka;
        private System.Windows.Forms.ToolStripButton toolStripButtonZatvori;
        private System.Windows.Forms.ToolStripButton toolStripButtonGlavniIzbornik;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb;
        private System.Windows.Forms.ToolStripButton toolStripButtonUpravljanjeResursima;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb2;
        private System.Windows.Forms.ToolStripLabel toolStripLabelDodavanjeTransportnihVozilima;
        private System.Windows.Forms.DataGridView dgvListaVozila;
        private System.Windows.Forms.Button btnObrisiVozilo;
        private System.Windows.Forms.TextBox txtMjesecTehnickog;
        private System.Windows.Forms.Button btnUrediVozilo;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.TextBox txtNazivVozila;
        private System.Windows.Forms.Label labelPoruka;
        private System.Windows.Forms.Label porukaLabel;
    }
}