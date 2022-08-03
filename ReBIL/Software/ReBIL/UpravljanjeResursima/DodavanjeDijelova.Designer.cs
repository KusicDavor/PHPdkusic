namespace UpravljanjeResursima
{
    partial class DodavanjeDijelova
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(DodavanjeDijelova));
            this.btnOdustaniDijelovi = new System.Windows.Forms.Button();
            this.btnObrisiDijelove = new System.Windows.Forms.Button();
            this.panelNavigacijskaTraka = new System.Windows.Forms.Panel();
            this.labelPozdrav = new System.Windows.Forms.Label();
            this.pictureBoxReBILLOGO = new System.Windows.Forms.PictureBox();
            this.toolStripNavigacijskaTraka = new System.Windows.Forms.ToolStrip();
            this.toolStripButtonZatvori = new System.Windows.Forms.ToolStripButton();
            this.toolStripButtonGlavniIzbornik = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb = new System.Windows.Forms.ToolStripLabel();
            this.toolStripButtonUpravljanjeResursima = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb3 = new System.Windows.Forms.ToolStripLabel();
            this.toolStripLabelDodavanjeDijelova = new System.Windows.Forms.ToolStripLabel();
            this.dgvListaDijelova = new System.Windows.Forms.DataGridView();
            this.btnDodajDijelove = new System.Windows.Forms.Button();
            this.txtNazivDijela = new System.Windows.Forms.TextBox();
            this.label7 = new System.Windows.Forms.Label();
            this.btnUrediDijelove = new System.Windows.Forms.Button();
            this.labelPoruka = new System.Windows.Forms.Label();
            this.btnDodajProjektu = new System.Windows.Forms.Button();
            this.btnDodajKolicinu = new System.Windows.Forms.Button();
            this.panelNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).BeginInit();
            this.toolStripNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaDijelova)).BeginInit();
            this.SuspendLayout();
            // 
            // btnOdustaniDijelovi
            // 
            this.btnOdustaniDijelovi.Location = new System.Drawing.Point(349, 337);
            this.btnOdustaniDijelovi.Name = "btnOdustaniDijelovi";
            this.btnOdustaniDijelovi.Size = new System.Drawing.Size(116, 42);
            this.btnOdustaniDijelovi.TabIndex = 43;
            this.btnOdustaniDijelovi.Text = "Odustani";
            this.btnOdustaniDijelovi.UseVisualStyleBackColor = true;
            this.btnOdustaniDijelovi.Click += new System.EventHandler(this.btnOdustaniDijelovi_Click);
            // 
            // btnObrisiDijelove
            // 
            this.btnObrisiDijelove.Location = new System.Drawing.Point(349, 220);
            this.btnObrisiDijelove.Name = "btnObrisiDijelove";
            this.btnObrisiDijelove.Size = new System.Drawing.Size(116, 42);
            this.btnObrisiDijelove.TabIndex = 42;
            this.btnObrisiDijelove.Text = "Obriši dijelove";
            this.btnObrisiDijelove.UseVisualStyleBackColor = true;
            this.btnObrisiDijelove.Click += new System.EventHandler(this.btnObrisiDijelove_Click);
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
            this.panelNavigacijskaTraka.TabIndex = 59;
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
            this.toolStripNavigacijskaTraka.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.toolStripButtonZatvori,
            this.toolStripButtonGlavniIzbornik,
            this.toolStripLabelBreadcrumb,
            this.toolStripButtonUpravljanjeResursima,
            this.toolStripLabelBreadcrumb3,
            this.toolStripLabelDodavanjeDijelova});
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
            // toolStripLabelBreadcrumb3
            // 
            this.toolStripLabelBreadcrumb3.Name = "toolStripLabelBreadcrumb3";
            this.toolStripLabelBreadcrumb3.Size = new System.Drawing.Size(15, 28);
            this.toolStripLabelBreadcrumb3.Text = ">";
            // 
            // toolStripLabelDodavanjeDijelova
            // 
            this.toolStripLabelDodavanjeDijelova.Name = "toolStripLabelDodavanjeDijelova";
            this.toolStripLabelDodavanjeDijelova.Size = new System.Drawing.Size(157, 28);
            this.toolStripLabelDodavanjeDijelova.Text = "Dodavanje i brisanje dijelova";
            this.toolStripLabelDodavanjeDijelova.Click += new System.EventHandler(this.toolStripLabelDodavanjeDijelova_Click);
            // 
            // dgvListaDijelova
            // 
            this.dgvListaDijelova.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvListaDijelova.Location = new System.Drawing.Point(487, 107);
            this.dgvListaDijelova.Name = "dgvListaDijelova";
            this.dgvListaDijelova.Size = new System.Drawing.Size(546, 361);
            this.dgvListaDijelova.TabIndex = 60;
            this.dgvListaDijelova.SelectionChanged += new System.EventHandler(this.dgvListaDijelova_SelectionChanged);
            // 
            // btnDodajDijelove
            // 
            this.btnDodajDijelove.Location = new System.Drawing.Point(349, 162);
            this.btnDodajDijelove.Name = "btnDodajDijelove";
            this.btnDodajDijelove.Size = new System.Drawing.Size(116, 42);
            this.btnDodajDijelove.TabIndex = 42;
            this.btnDodajDijelove.Text = "Dodaj dijelove";
            this.btnDodajDijelove.UseVisualStyleBackColor = true;
            this.btnDodajDijelove.Click += new System.EventHandler(this.btnDodajDijelove_Click);
            // 
            // txtNazivDijela
            // 
            this.txtNazivDijela.Location = new System.Drawing.Point(121, 232);
            this.txtNazivDijela.MaxLength = 25;
            this.txtNazivDijela.Name = "txtNazivDijela";
            this.txtNazivDijela.Size = new System.Drawing.Size(200, 20);
            this.txtNazivDijela.TabIndex = 70;
            this.txtNazivDijela.TextChanged += new System.EventHandler(this.txtNazivDijela_TextChanged);
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.Location = new System.Drawing.Point(41, 235);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(64, 13);
            this.label7.TabIndex = 69;
            this.label7.Text = "Naziv dijela:";
            // 
            // btnUrediDijelove
            // 
            this.btnUrediDijelove.Location = new System.Drawing.Point(349, 279);
            this.btnUrediDijelove.Name = "btnUrediDijelove";
            this.btnUrediDijelove.Size = new System.Drawing.Size(116, 42);
            this.btnUrediDijelove.TabIndex = 71;
            this.btnUrediDijelove.Text = "Uredi dijelove";
            this.btnUrediDijelove.UseVisualStyleBackColor = true;
            this.btnUrediDijelove.Click += new System.EventHandler(this.btnUrediDijelove_Click);
            // 
            // labelPoruka
            // 
            this.labelPoruka.AutoSize = true;
            this.labelPoruka.Location = new System.Drawing.Point(174, 176);
            this.labelPoruka.Name = "labelPoruka";
            this.labelPoruka.Size = new System.Drawing.Size(0, 13);
            this.labelPoruka.TabIndex = 73;
            // 
            // btnDodajProjektu
            // 
            this.btnDodajProjektu.Location = new System.Drawing.Point(207, 405);
            this.btnDodajProjektu.Name = "btnDodajProjektu";
            this.btnDodajProjektu.Size = new System.Drawing.Size(114, 42);
            this.btnDodajProjektu.TabIndex = 74;
            this.btnDodajProjektu.Text = "Dodaj projektu";
            this.btnDodajProjektu.UseVisualStyleBackColor = true;
            this.btnDodajProjektu.Click += new System.EventHandler(this.btnDodajProjektu_Click);
            // 
            // btnDodajKolicinu
            // 
            this.btnDodajKolicinu.Location = new System.Drawing.Point(58, 405);
            this.btnDodajKolicinu.Name = "btnDodajKolicinu";
            this.btnDodajKolicinu.Size = new System.Drawing.Size(116, 42);
            this.btnDodajKolicinu.TabIndex = 75;
            this.btnDodajKolicinu.Text = "Skladište";
            this.btnDodajKolicinu.UseVisualStyleBackColor = true;
            this.btnDodajKolicinu.Click += new System.EventHandler(this.btnDodajKolicinu_Click);
            // 
            // DodavanjeDijelova
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1044, 511);
            this.ControlBox = false;
            this.Controls.Add(this.btnDodajKolicinu);
            this.Controls.Add(this.btnDodajProjektu);
            this.Controls.Add(this.labelPoruka);
            this.Controls.Add(this.btnUrediDijelove);
            this.Controls.Add(this.txtNazivDijela);
            this.Controls.Add(this.label7);
            this.Controls.Add(this.dgvListaDijelova);
            this.Controls.Add(this.panelNavigacijskaTraka);
            this.Controls.Add(this.btnOdustaniDijelovi);
            this.Controls.Add(this.btnDodajDijelove);
            this.Controls.Add(this.btnObrisiDijelove);
            this.Name = "DodavanjeDijelova";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Dodavanje i brisanje dijelova";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.DodavanjeDijelova_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.DodavanjeDijelova_HelpRequested);
            this.panelNavigacijskaTraka.ResumeLayout(false);
            this.panelNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).EndInit();
            this.toolStripNavigacijskaTraka.ResumeLayout(false);
            this.toolStripNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaDijelova)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button btnOdustaniDijelovi;
        private System.Windows.Forms.Button btnObrisiDijelove;
        private System.Windows.Forms.Panel panelNavigacijskaTraka;
        private System.Windows.Forms.Label labelPozdrav;
        private System.Windows.Forms.PictureBox pictureBoxReBILLOGO;
        private System.Windows.Forms.ToolStrip toolStripNavigacijskaTraka;
        private System.Windows.Forms.ToolStripButton toolStripButtonZatvori;
        private System.Windows.Forms.ToolStripButton toolStripButtonGlavniIzbornik;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb;
        private System.Windows.Forms.ToolStripButton toolStripButtonUpravljanjeResursima;
        private System.Windows.Forms.ToolStripLabel toolStripLabelDodavanjeDijelova;
        private System.Windows.Forms.DataGridView dgvListaDijelova;
        private System.Windows.Forms.Button btnDodajDijelove;
        private System.Windows.Forms.TextBox txtNazivDijela;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.Button btnUrediDijelove;
        private System.Windows.Forms.Label labelPoruka;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb3;
        private System.Windows.Forms.Button btnDodajProjektu;
        private System.Windows.Forms.Button btnDodajKolicinu;
    }
}