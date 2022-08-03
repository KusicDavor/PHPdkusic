namespace UpravljanjeResursima
{
    partial class Skladiste
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Skladiste));
            this.dgvDijelovi = new System.Windows.Forms.DataGridView();
            this.label1 = new System.Windows.Forms.Label();
            this.txtKolicinaDijelova = new System.Windows.Forms.TextBox();
            this.btnPromjeniKolicinu = new System.Windows.Forms.Button();
            this.labelPoruka = new System.Windows.Forms.Label();
            this.btnOdustani = new System.Windows.Forms.Button();
            this.panelNavigacijskaTraka = new System.Windows.Forms.Panel();
            this.labelPozdrav = new System.Windows.Forms.Label();
            this.pictureBoxReBILLOGO = new System.Windows.Forms.PictureBox();
            this.toolStripNavigacijskaTraka = new System.Windows.Forms.ToolStrip();
            this.toolStripButtonZatvori = new System.Windows.Forms.ToolStripButton();
            this.toolStripButtonGlavniIzbornik = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb = new System.Windows.Forms.ToolStripLabel();
            this.toolStripButtonUpravljanjeResursima = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb2 = new System.Windows.Forms.ToolStripLabel();
            this.toolStripButton1 = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb3 = new System.Windows.Forms.ToolStripLabel();
            this.toolStripLabelIzmjenaInformacijaOpreme = new System.Windows.Forms.ToolStripLabel();
            ((System.ComponentModel.ISupportInitialize)(this.dgvDijelovi)).BeginInit();
            this.panelNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).BeginInit();
            this.toolStripNavigacijskaTraka.SuspendLayout();
            this.SuspendLayout();
            // 
            // dgvDijelovi
            // 
            this.dgvDijelovi.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvDijelovi.Location = new System.Drawing.Point(434, 92);
            this.dgvDijelovi.Name = "dgvDijelovi";
            this.dgvDijelovi.Size = new System.Drawing.Size(583, 388);
            this.dgvDijelovi.TabIndex = 0;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(46, 237);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(86, 13);
            this.label1.TabIndex = 1;
            this.label1.Text = "Količina dijelova:";
            // 
            // txtKolicinaDijelova
            // 
            this.txtKolicinaDijelova.Location = new System.Drawing.Point(148, 234);
            this.txtKolicinaDijelova.Name = "txtKolicinaDijelova";
            this.txtKolicinaDijelova.Size = new System.Drawing.Size(178, 20);
            this.txtKolicinaDijelova.TabIndex = 2;
            this.txtKolicinaDijelova.TextChanged += new System.EventHandler(this.txtKolicinaDijelova_TextChanged);
            // 
            // btnPromjeniKolicinu
            // 
            this.btnPromjeniKolicinu.Location = new System.Drawing.Point(97, 312);
            this.btnPromjeniKolicinu.Name = "btnPromjeniKolicinu";
            this.btnPromjeniKolicinu.Size = new System.Drawing.Size(107, 50);
            this.btnPromjeniKolicinu.TabIndex = 3;
            this.btnPromjeniKolicinu.Text = "Promijeni kolicinu";
            this.btnPromjeniKolicinu.UseVisualStyleBackColor = true;
            this.btnPromjeniKolicinu.Click += new System.EventHandler(this.btnPromjeniKolicinu_Click);
            // 
            // labelPoruka
            // 
            this.labelPoruka.AutoSize = true;
            this.labelPoruka.Location = new System.Drawing.Point(204, 169);
            this.labelPoruka.Name = "labelPoruka";
            this.labelPoruka.Size = new System.Drawing.Size(0, 13);
            this.labelPoruka.TabIndex = 4;
            // 
            // btnOdustani
            // 
            this.btnOdustani.Location = new System.Drawing.Point(234, 313);
            this.btnOdustani.Name = "btnOdustani";
            this.btnOdustani.Size = new System.Drawing.Size(107, 49);
            this.btnOdustani.TabIndex = 5;
            this.btnOdustani.Text = "Odustani";
            this.btnOdustani.UseVisualStyleBackColor = true;
            this.btnOdustani.Click += new System.EventHandler(this.btnOdustani_Click);
            // 
            // panelNavigacijskaTraka
            // 
            this.panelNavigacijskaTraka.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.panelNavigacijskaTraka.Controls.Add(this.labelPozdrav);
            this.panelNavigacijskaTraka.Controls.Add(this.pictureBoxReBILLOGO);
            this.panelNavigacijskaTraka.Controls.Add(this.toolStripNavigacijskaTraka);
            this.panelNavigacijskaTraka.Location = new System.Drawing.Point(2, -2);
            this.panelNavigacijskaTraka.Name = "panelNavigacijskaTraka";
            this.panelNavigacijskaTraka.Size = new System.Drawing.Size(1044, 70);
            this.panelNavigacijskaTraka.TabIndex = 71;
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
            this.toolStripButton1,
            this.toolStripLabelBreadcrumb3,
            this.toolStripLabelIzmjenaInformacijaOpreme});
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
            // toolStripButton1
            // 
            this.toolStripButton1.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Text;
            this.toolStripButton1.Image = ((System.Drawing.Image)(resources.GetObject("toolStripButton1.Image")));
            this.toolStripButton1.ImageTransparentColor = System.Drawing.Color.Magenta;
            this.toolStripButton1.Name = "toolStripButton1";
            this.toolStripButton1.Size = new System.Drawing.Size(111, 28);
            this.toolStripButton1.Text = "Dodavanje dijelova";
            this.toolStripButton1.Click += new System.EventHandler(this.toolStripButton1_Click);
            // 
            // toolStripLabelBreadcrumb3
            // 
            this.toolStripLabelBreadcrumb3.Name = "toolStripLabelBreadcrumb3";
            this.toolStripLabelBreadcrumb3.Size = new System.Drawing.Size(15, 28);
            this.toolStripLabelBreadcrumb3.Text = ">";
            // 
            // toolStripLabelIzmjenaInformacijaOpreme
            // 
            this.toolStripLabelIzmjenaInformacijaOpreme.Name = "toolStripLabelIzmjenaInformacijaOpreme";
            this.toolStripLabelIzmjenaInformacijaOpreme.Size = new System.Drawing.Size(53, 28);
            this.toolStripLabelIzmjenaInformacijaOpreme.Text = "Skladiste";
            // 
            // Skladiste
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(1044, 511);
            this.Controls.Add(this.panelNavigacijskaTraka);
            this.Controls.Add(this.btnOdustani);
            this.Controls.Add(this.labelPoruka);
            this.Controls.Add(this.btnPromjeniKolicinu);
            this.Controls.Add(this.txtKolicinaDijelova);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.dgvDijelovi);
            this.Name = "Skladiste";
            this.Text = "Skladiste";
            this.Load += new System.EventHandler(this.Skladiste_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dgvDijelovi)).EndInit();
            this.panelNavigacijskaTraka.ResumeLayout(false);
            this.panelNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).EndInit();
            this.toolStripNavigacijskaTraka.ResumeLayout(false);
            this.toolStripNavigacijskaTraka.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.DataGridView dgvDijelovi;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.TextBox txtKolicinaDijelova;
        private System.Windows.Forms.Button btnPromjeniKolicinu;
        private System.Windows.Forms.Label labelPoruka;
        private System.Windows.Forms.Button btnOdustani;
        private System.Windows.Forms.Panel panelNavigacijskaTraka;
        private System.Windows.Forms.Label labelPozdrav;
        private System.Windows.Forms.PictureBox pictureBoxReBILLOGO;
        private System.Windows.Forms.ToolStrip toolStripNavigacijskaTraka;
        private System.Windows.Forms.ToolStripButton toolStripButtonZatvori;
        private System.Windows.Forms.ToolStripButton toolStripButtonGlavniIzbornik;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb;
        private System.Windows.Forms.ToolStripButton toolStripButtonUpravljanjeResursima;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb2;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb3;
        private System.Windows.Forms.ToolStripLabel toolStripLabelIzmjenaInformacijaOpreme;
        private System.Windows.Forms.ToolStripButton toolStripButton1;
    }
}