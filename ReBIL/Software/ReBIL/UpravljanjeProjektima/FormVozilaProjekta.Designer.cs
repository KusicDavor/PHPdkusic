namespace UpravljanjeProjektima
{
    partial class FormVozilaProjekta
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(FormVozilaProjekta));
            this.buttonIzlaz = new System.Windows.Forms.Button();
            this.labelNaziv = new System.Windows.Forms.Label();
            this.labelNazivProjekta = new System.Windows.Forms.Label();
            this.dgvListaVozila = new System.Windows.Forms.DataGridView();
            this.DodajVoziloButton = new System.Windows.Forms.Button();
            this.IzbrisiVoziloButton = new System.Windows.Forms.Button();
            this.groupBoxListaVozilaNaProjektu = new System.Windows.Forms.GroupBox();
            this.toolStripLabelVozilaProjeka = new System.Windows.Forms.ToolStripLabel();
            this.toolStripLabelBreadcrumb2 = new System.Windows.Forms.ToolStripLabel();
            this.toolStripLabelBreadcrumb = new System.Windows.Forms.ToolStripLabel();
            this.labelPozdrav = new System.Windows.Forms.Label();
            this.toolStripNavigacijskaTraka = new System.Windows.Forms.ToolStrip();
            this.toolStripButtonZatvori = new System.Windows.Forms.ToolStripButton();
            this.toolStripButtonGlavniIzbornik = new System.Windows.Forms.ToolStripButton();
            this.toolStripButtonUpravljanjeProjektima = new System.Windows.Forms.ToolStripButton();
            this.panelNavigacijskaTraka = new System.Windows.Forms.Panel();
            this.pictureBoxReBILLogo = new System.Windows.Forms.PictureBox();
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaVozila)).BeginInit();
            this.toolStripNavigacijskaTraka.SuspendLayout();
            this.panelNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLogo)).BeginInit();
            this.SuspendLayout();
            // 
            // buttonIzlaz
            // 
            this.buttonIzlaz.Location = new System.Drawing.Point(710, 412);
            this.buttonIzlaz.Name = "buttonIzlaz";
            this.buttonIzlaz.Size = new System.Drawing.Size(86, 23);
            this.buttonIzlaz.TabIndex = 73;
            this.buttonIzlaz.Text = "Izlaz";
            this.buttonIzlaz.UseVisualStyleBackColor = true;
            this.buttonIzlaz.Click += new System.EventHandler(this.buttonIzlaz_Click);
            // 
            // labelNaziv
            // 
            this.labelNaziv.AutoSize = true;
            this.labelNaziv.Font = new System.Drawing.Font("Microsoft Sans Serif", 10F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.labelNaziv.Location = new System.Drawing.Point(694, 128);
            this.labelNaziv.Name = "labelNaziv";
            this.labelNaziv.Size = new System.Drawing.Size(41, 17);
            this.labelNaziv.TabIndex = 71;
            this.labelNaziv.Text = "naziv";
            // 
            // labelNazivProjekta
            // 
            this.labelNazivProjekta.AutoSize = true;
            this.labelNazivProjekta.Location = new System.Drawing.Point(693, 102);
            this.labelNazivProjekta.Name = "labelNazivProjekta";
            this.labelNazivProjekta.Size = new System.Drawing.Size(78, 13);
            this.labelNazivProjekta.TabIndex = 70;
            this.labelNazivProjekta.Text = "Naziv projekta:";
            // 
            // dgvListaVozila
            // 
            this.dgvListaVozila.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvListaVozila.Location = new System.Drawing.Point(32, 102);
            this.dgvListaVozila.Name = "dgvListaVozila";
            this.dgvListaVozila.Size = new System.Drawing.Size(631, 316);
            this.dgvListaVozila.TabIndex = 9;
            this.dgvListaVozila.SelectionChanged += new System.EventHandler(this.dgvListaVozila_SelectionChanged);
            // 
            // DodajVoziloButton
            // 
            this.DodajVoziloButton.Location = new System.Drawing.Point(710, 234);
            this.DodajVoziloButton.Name = "DodajVoziloButton";
            this.DodajVoziloButton.Size = new System.Drawing.Size(86, 23);
            this.DodajVoziloButton.TabIndex = 15;
            this.DodajVoziloButton.Text = "Dodaj vozilo";
            this.DodajVoziloButton.UseVisualStyleBackColor = true;
            this.DodajVoziloButton.Click += new System.EventHandler(this.DodajVoziloButton_Click);
            // 
            // IzbrisiVoziloButton
            // 
            this.IzbrisiVoziloButton.Location = new System.Drawing.Point(710, 263);
            this.IzbrisiVoziloButton.Name = "IzbrisiVoziloButton";
            this.IzbrisiVoziloButton.Size = new System.Drawing.Size(86, 23);
            this.IzbrisiVoziloButton.TabIndex = 17;
            this.IzbrisiVoziloButton.Text = "Izbriši vozilo";
            this.IzbrisiVoziloButton.UseVisualStyleBackColor = true;
            this.IzbrisiVoziloButton.Click += new System.EventHandler(this.IzbrisiVoziloButton_Click);
            // 
            // groupBoxListaVozilaNaProjektu
            // 
            this.groupBoxListaVozilaNaProjektu.Location = new System.Drawing.Point(12, 76);
            this.groupBoxListaVozilaNaProjektu.Name = "groupBoxListaVozilaNaProjektu";
            this.groupBoxListaVozilaNaProjektu.Size = new System.Drawing.Size(669, 359);
            this.groupBoxListaVozilaNaProjektu.TabIndex = 68;
            this.groupBoxListaVozilaNaProjektu.TabStop = false;
            this.groupBoxListaVozilaNaProjektu.Text = "Lista vozila na projektu";
            // 
            // toolStripLabelVozilaProjeka
            // 
            this.toolStripLabelVozilaProjeka.Name = "toolStripLabelVozilaProjeka";
            this.toolStripLabelVozilaProjeka.Size = new System.Drawing.Size(83, 28);
            this.toolStripLabelVozilaProjeka.Text = "Vozila projekta";
            // 
            // toolStripLabelBreadcrumb2
            // 
            this.toolStripLabelBreadcrumb2.Name = "toolStripLabelBreadcrumb2";
            this.toolStripLabelBreadcrumb2.Size = new System.Drawing.Size(15, 28);
            this.toolStripLabelBreadcrumb2.Text = ">";
            // 
            // toolStripLabelBreadcrumb
            // 
            this.toolStripLabelBreadcrumb.Name = "toolStripLabelBreadcrumb";
            this.toolStripLabelBreadcrumb.Size = new System.Drawing.Size(15, 28);
            this.toolStripLabelBreadcrumb.Text = ">";
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
            // toolStripNavigacijskaTraka
            // 
            this.toolStripNavigacijskaTraka.Anchor = System.Windows.Forms.AnchorStyles.None;
            this.toolStripNavigacijskaTraka.AutoSize = false;
            this.toolStripNavigacijskaTraka.Dock = System.Windows.Forms.DockStyle.None;
            this.toolStripNavigacijskaTraka.GripStyle = System.Windows.Forms.ToolStripGripStyle.Hidden;
            this.toolStripNavigacijskaTraka.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.toolStripButtonZatvori,
            this.toolStripButtonGlavniIzbornik,
            this.toolStripLabelBreadcrumb,
            this.toolStripButtonUpravljanjeProjektima,
            this.toolStripLabelBreadcrumb2,
            this.toolStripLabelVozilaProjeka});
            this.toolStripNavigacijskaTraka.Location = new System.Drawing.Point(60, 8);
            this.toolStripNavigacijskaTraka.Name = "toolStripNavigacijskaTraka";
            this.toolStripNavigacijskaTraka.Padding = new System.Windows.Forms.Padding(5);
            this.toolStripNavigacijskaTraka.RenderMode = System.Windows.Forms.ToolStripRenderMode.System;
            this.toolStripNavigacijskaTraka.Size = new System.Drawing.Size(773, 41);
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
            // toolStripButtonUpravljanjeProjektima
            // 
            this.toolStripButtonUpravljanjeProjektima.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Text;
            this.toolStripButtonUpravljanjeProjektima.Image = ((System.Drawing.Image)(resources.GetObject("toolStripButtonUpravljanjeProjektima.Image")));
            this.toolStripButtonUpravljanjeProjektima.ImageTransparentColor = System.Drawing.Color.Magenta;
            this.toolStripButtonUpravljanjeProjektima.Name = "toolStripButtonUpravljanjeProjektima";
            this.toolStripButtonUpravljanjeProjektima.Size = new System.Drawing.Size(130, 28);
            this.toolStripButtonUpravljanjeProjektima.Text = "Upravljanje projektima";
            this.toolStripButtonUpravljanjeProjektima.Click += new System.EventHandler(this.toolStripButtonUpravljanjeProjektima_Click);
            // 
            // panelNavigacijskaTraka
            // 
            this.panelNavigacijskaTraka.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.panelNavigacijskaTraka.Controls.Add(this.labelPozdrav);
            this.panelNavigacijskaTraka.Controls.Add(this.toolStripNavigacijskaTraka);
            this.panelNavigacijskaTraka.Location = new System.Drawing.Point(0, 0);
            this.panelNavigacijskaTraka.Name = "panelNavigacijskaTraka";
            this.panelNavigacijskaTraka.Size = new System.Drawing.Size(837, 70);
            this.panelNavigacijskaTraka.TabIndex = 66;
            // 
            // pictureBoxReBILLogo
            // 
            this.pictureBoxReBILLogo.Image = global::UpravljanjeProjektima.Properties.Resources.ReBilLogo;
            this.pictureBoxReBILLogo.Location = new System.Drawing.Point(3, 3);
            this.pictureBoxReBILLogo.Name = "pictureBoxReBILLogo";
            this.pictureBoxReBILLogo.Size = new System.Drawing.Size(57, 50);
            this.pictureBoxReBILLogo.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBoxReBILLogo.TabIndex = 67;
            this.pictureBoxReBILLogo.TabStop = false;
            // 
            // FormVozilaProjekta
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(837, 447);
            this.ControlBox = false;
            this.Controls.Add(this.dgvListaVozila);
            this.Controls.Add(this.buttonIzlaz);
            this.Controls.Add(this.IzbrisiVoziloButton);
            this.Controls.Add(this.DodajVoziloButton);
            this.Controls.Add(this.labelNaziv);
            this.Controls.Add(this.labelNazivProjekta);
            this.Controls.Add(this.groupBoxListaVozilaNaProjektu);
            this.Controls.Add(this.pictureBoxReBILLogo);
            this.Controls.Add(this.panelNavigacijskaTraka);
            this.Name = "FormVozilaProjekta";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Vozila projekta";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormVozilaProjekta_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormVozilaProjekta_HelpRequested);
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaVozila)).EndInit();
            this.toolStripNavigacijskaTraka.ResumeLayout(false);
            this.toolStripNavigacijskaTraka.PerformLayout();
            this.panelNavigacijskaTraka.ResumeLayout(false);
            this.panelNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLogo)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button buttonIzlaz;
        private System.Windows.Forms.Label labelNaziv;
        private System.Windows.Forms.Label labelNazivProjekta;
        private System.Windows.Forms.DataGridView dgvListaVozila;
        private System.Windows.Forms.Button DodajVoziloButton;
        private System.Windows.Forms.Button IzbrisiVoziloButton;
        private System.Windows.Forms.GroupBox groupBoxListaVozilaNaProjektu;
        private System.Windows.Forms.ToolStripLabel toolStripLabelVozilaProjeka;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb2;
        private System.Windows.Forms.ToolStripButton toolStripButtonUpravljanjeProjektima;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb;
        private System.Windows.Forms.ToolStripButton toolStripButtonGlavniIzbornik;
        private System.Windows.Forms.Label labelPozdrav;
        private System.Windows.Forms.ToolStrip toolStripNavigacijskaTraka;
        private System.Windows.Forms.PictureBox pictureBoxReBILLogo;
        private System.Windows.Forms.Panel panelNavigacijskaTraka;
        private System.Windows.Forms.ToolStripButton toolStripButtonZatvori;
    }
}