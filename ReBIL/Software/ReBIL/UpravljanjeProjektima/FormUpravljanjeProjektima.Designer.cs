namespace UpravljanjeProjektima
{
    partial class FormUpravljanjeProjektima
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(FormUpravljanjeProjektima));
            this.IzbrisiProjektButton = new System.Windows.Forms.Button();
            this.UrediProjektButton = new System.Windows.Forms.Button();
            this.DodajProjektButton = new System.Windows.Forms.Button();
            this.StatistikaButton = new System.Windows.Forms.Button();
            this.EvidencijaEksSredstavaButton = new System.Windows.Forms.Button();
            this.EvidencijaRokovaButton = new System.Windows.Forms.Button();
            this.LogistikaButton = new System.Windows.Forms.Button();
            this.dgvListaProjekata = new System.Windows.Forms.DataGridView();
            this.panelNavigacijskaTraka = new System.Windows.Forms.Panel();
            this.labelPozdrav = new System.Windows.Forms.Label();
            this.toolStripNavigacijskaTraka = new System.Windows.Forms.ToolStrip();
            this.toolStripButtonZatvori = new System.Windows.Forms.ToolStripButton();
            this.toolStripButtonGlavniIzbornik = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb = new System.Windows.Forms.ToolStripLabel();
            this.toolStripLabelUpravljanjeProjektima = new System.Windows.Forms.ToolStripLabel();
            this.pictureBoxReBILLogo = new System.Windows.Forms.PictureBox();
            this.groupBoxListaProjekata = new System.Windows.Forms.GroupBox();
            this.groupBoxOstaleOpcije = new System.Windows.Forms.GroupBox();
            this.buttonVozila = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaProjekata)).BeginInit();
            this.panelNavigacijskaTraka.SuspendLayout();
            this.toolStripNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLogo)).BeginInit();
            this.groupBoxListaProjekata.SuspendLayout();
            this.groupBoxOstaleOpcije.SuspendLayout();
            this.SuspendLayout();
            // 
            // IzbrisiProjektButton
            // 
            this.IzbrisiProjektButton.Location = new System.Drawing.Point(307, 175);
            this.IzbrisiProjektButton.Name = "IzbrisiProjektButton";
            this.IzbrisiProjektButton.Size = new System.Drawing.Size(86, 23);
            this.IzbrisiProjektButton.TabIndex = 17;
            this.IzbrisiProjektButton.Text = "Izbriši projekt";
            this.IzbrisiProjektButton.UseVisualStyleBackColor = true;
            this.IzbrisiProjektButton.Click += new System.EventHandler(this.IzbrisiProjektButton_Click);
            // 
            // UrediProjektButton
            // 
            this.UrediProjektButton.Location = new System.Drawing.Point(307, 105);
            this.UrediProjektButton.Name = "UrediProjektButton";
            this.UrediProjektButton.Size = new System.Drawing.Size(86, 23);
            this.UrediProjektButton.TabIndex = 16;
            this.UrediProjektButton.Text = "Uredi projekt";
            this.UrediProjektButton.UseVisualStyleBackColor = true;
            this.UrediProjektButton.Click += new System.EventHandler(this.UrediProjektButton_Click);
            // 
            // DodajProjektButton
            // 
            this.DodajProjektButton.Location = new System.Drawing.Point(307, 36);
            this.DodajProjektButton.Name = "DodajProjektButton";
            this.DodajProjektButton.Size = new System.Drawing.Size(86, 23);
            this.DodajProjektButton.TabIndex = 15;
            this.DodajProjektButton.Text = "Dodaj projekt";
            this.DodajProjektButton.UseVisualStyleBackColor = true;
            this.DodajProjektButton.Click += new System.EventHandler(this.DodajProjektButton_Click);
            // 
            // StatistikaButton
            // 
            this.StatistikaButton.Location = new System.Drawing.Point(47, 175);
            this.StatistikaButton.Name = "StatistikaButton";
            this.StatistikaButton.Size = new System.Drawing.Size(102, 23);
            this.StatistikaButton.TabIndex = 14;
            this.StatistikaButton.Text = "Statistika";
            this.StatistikaButton.UseVisualStyleBackColor = true;
            this.StatistikaButton.Click += new System.EventHandler(this.StatistikaButton_Click);
            // 
            // EvidencijaEksSredstavaButton
            // 
            this.EvidencijaEksSredstavaButton.Location = new System.Drawing.Point(26, 141);
            this.EvidencijaEksSredstavaButton.Name = "EvidencijaEksSredstavaButton";
            this.EvidencijaEksSredstavaButton.Size = new System.Drawing.Size(143, 23);
            this.EvidencijaEksSredstavaButton.TabIndex = 13;
            this.EvidencijaEksSredstavaButton.Text = "Evidencija eks. sredstava";
            this.EvidencijaEksSredstavaButton.UseVisualStyleBackColor = true;
            this.EvidencijaEksSredstavaButton.Click += new System.EventHandler(this.EvidencijaEksSredstavaButton_Click);
            // 
            // EvidencijaRokovaButton
            // 
            this.EvidencijaRokovaButton.Location = new System.Drawing.Point(26, 36);
            this.EvidencijaRokovaButton.Name = "EvidencijaRokovaButton";
            this.EvidencijaRokovaButton.Size = new System.Drawing.Size(147, 23);
            this.EvidencijaRokovaButton.TabIndex = 12;
            this.EvidencijaRokovaButton.Text = "Evidencija dokumentacije";
            this.EvidencijaRokovaButton.UseVisualStyleBackColor = true;
            this.EvidencijaRokovaButton.Click += new System.EventHandler(this.EvidencijaRokovaButton_Click);
            // 
            // LogistikaButton
            // 
            this.LogistikaButton.Location = new System.Drawing.Point(47, 70);
            this.LogistikaButton.Name = "LogistikaButton";
            this.LogistikaButton.Size = new System.Drawing.Size(102, 23);
            this.LogistikaButton.TabIndex = 11;
            this.LogistikaButton.Text = "Logistika";
            this.LogistikaButton.UseVisualStyleBackColor = true;
            this.LogistikaButton.Click += new System.EventHandler(this.LogistikaButton_Click);
            // 
            // dgvListaProjekata
            // 
            this.dgvListaProjekata.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvListaProjekata.Location = new System.Drawing.Point(10, 19);
            this.dgvListaProjekata.Name = "dgvListaProjekata";
            this.dgvListaProjekata.Size = new System.Drawing.Size(257, 197);
            this.dgvListaProjekata.TabIndex = 9;
            this.dgvListaProjekata.SelectionChanged += new System.EventHandler(this.dgvListaProjekata_SelectionChanged);
            // 
            // panelNavigacijskaTraka
            // 
            this.panelNavigacijskaTraka.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.panelNavigacijskaTraka.Controls.Add(this.labelPozdrav);
            this.panelNavigacijskaTraka.Controls.Add(this.toolStripNavigacijskaTraka);
            this.panelNavigacijskaTraka.Location = new System.Drawing.Point(0, 0);
            this.panelNavigacijskaTraka.Name = "panelNavigacijskaTraka";
            this.panelNavigacijskaTraka.Size = new System.Drawing.Size(656, 70);
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
            this.toolStripLabelUpravljanjeProjektima});
            this.toolStripNavigacijskaTraka.Location = new System.Drawing.Point(64, 9);
            this.toolStripNavigacijskaTraka.Name = "toolStripNavigacijskaTraka";
            this.toolStripNavigacijskaTraka.Padding = new System.Windows.Forms.Padding(5);
            this.toolStripNavigacijskaTraka.RenderMode = System.Windows.Forms.ToolStripRenderMode.System;
            this.toolStripNavigacijskaTraka.Size = new System.Drawing.Size(591, 41);
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
            // toolStripLabelUpravljanjeProjektima
            // 
            this.toolStripLabelUpravljanjeProjektima.Name = "toolStripLabelUpravljanjeProjektima";
            this.toolStripLabelUpravljanjeProjektima.Size = new System.Drawing.Size(126, 28);
            this.toolStripLabelUpravljanjeProjektima.Text = "Upravljanje projektima";
            // 
            // pictureBoxReBILLogo
            // 
            this.pictureBoxReBILLogo.Image = global::UpravljanjeProjektima.Properties.Resources.ReBilLogo;
            this.pictureBoxReBILLogo.Location = new System.Drawing.Point(3, 3);
            this.pictureBoxReBILLogo.Name = "pictureBoxReBILLogo";
            this.pictureBoxReBILLogo.Size = new System.Drawing.Size(57, 50);
            this.pictureBoxReBILLogo.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBoxReBILLogo.TabIndex = 18;
            this.pictureBoxReBILLogo.TabStop = false;
            // 
            // groupBoxListaProjekata
            // 
            this.groupBoxListaProjekata.Controls.Add(this.dgvListaProjekata);
            this.groupBoxListaProjekata.Controls.Add(this.DodajProjektButton);
            this.groupBoxListaProjekata.Controls.Add(this.IzbrisiProjektButton);
            this.groupBoxListaProjekata.Controls.Add(this.UrediProjektButton);
            this.groupBoxListaProjekata.Location = new System.Drawing.Point(6, 76);
            this.groupBoxListaProjekata.Name = "groupBoxListaProjekata";
            this.groupBoxListaProjekata.Size = new System.Drawing.Size(427, 230);
            this.groupBoxListaProjekata.TabIndex = 60;
            this.groupBoxListaProjekata.TabStop = false;
            this.groupBoxListaProjekata.Text = "Lista projekata:";
            // 
            // groupBoxOstaleOpcije
            // 
            this.groupBoxOstaleOpcije.Controls.Add(this.buttonVozila);
            this.groupBoxOstaleOpcije.Controls.Add(this.EvidencijaRokovaButton);
            this.groupBoxOstaleOpcije.Controls.Add(this.LogistikaButton);
            this.groupBoxOstaleOpcije.Controls.Add(this.EvidencijaEksSredstavaButton);
            this.groupBoxOstaleOpcije.Controls.Add(this.StatistikaButton);
            this.groupBoxOstaleOpcije.Location = new System.Drawing.Point(448, 76);
            this.groupBoxOstaleOpcije.Name = "groupBoxOstaleOpcije";
            this.groupBoxOstaleOpcije.Size = new System.Drawing.Size(200, 230);
            this.groupBoxOstaleOpcije.TabIndex = 61;
            this.groupBoxOstaleOpcije.TabStop = false;
            this.groupBoxOstaleOpcije.Text = "Ostale opcije:";
            // 
            // buttonVozila
            // 
            this.buttonVozila.Location = new System.Drawing.Point(47, 106);
            this.buttonVozila.Name = "buttonVozila";
            this.buttonVozila.Size = new System.Drawing.Size(102, 23);
            this.buttonVozila.TabIndex = 15;
            this.buttonVozila.Text = "Vozila";
            this.buttonVozila.UseVisualStyleBackColor = true;
            this.buttonVozila.Click += new System.EventHandler(this.buttonVozila_Click);
            // 
            // FormUpravljanjeProjektima
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(656, 315);
            this.ControlBox = false;
            this.Controls.Add(this.groupBoxOstaleOpcije);
            this.Controls.Add(this.pictureBoxReBILLogo);
            this.Controls.Add(this.panelNavigacijskaTraka);
            this.Controls.Add(this.groupBoxListaProjekata);
            this.Name = "FormUpravljanjeProjektima";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Upravljanje projektima";
            this.Load += new System.EventHandler(this.FormUpravljanjeProjektima_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormUpravljanjeProjektima_HelpRequested);
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaProjekata)).EndInit();
            this.panelNavigacijskaTraka.ResumeLayout(false);
            this.panelNavigacijskaTraka.PerformLayout();
            this.toolStripNavigacijskaTraka.ResumeLayout(false);
            this.toolStripNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLogo)).EndInit();
            this.groupBoxListaProjekata.ResumeLayout(false);
            this.groupBoxOstaleOpcije.ResumeLayout(false);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Button IzbrisiProjektButton;
        private System.Windows.Forms.Button UrediProjektButton;
        private System.Windows.Forms.Button DodajProjektButton;
        private System.Windows.Forms.Button StatistikaButton;
        private System.Windows.Forms.Button EvidencijaEksSredstavaButton;
        private System.Windows.Forms.Button EvidencijaRokovaButton;
        private System.Windows.Forms.Button LogistikaButton;
        private System.Windows.Forms.DataGridView dgvListaProjekata;
        private System.Windows.Forms.Panel panelNavigacijskaTraka;
        private System.Windows.Forms.Label labelPozdrav;
        private System.Windows.Forms.ToolStrip toolStripNavigacijskaTraka;
        private System.Windows.Forms.ToolStripButton toolStripButtonZatvori;
        private System.Windows.Forms.ToolStripButton toolStripButtonGlavniIzbornik;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb;
        private System.Windows.Forms.PictureBox pictureBoxReBILLogo;
        private System.Windows.Forms.ToolStripLabel toolStripLabelUpravljanjeProjektima;
        private System.Windows.Forms.GroupBox groupBoxListaProjekata;
        private System.Windows.Forms.GroupBox groupBoxOstaleOpcije;
        private System.Windows.Forms.Button buttonVozila;
    }
}

