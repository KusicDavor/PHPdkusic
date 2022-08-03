namespace Zaposlenici
{
    partial class FormPodjelaZaposlenika
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(FormPodjelaZaposlenika));
            this.ZaposleniciNaProjektuLabel = new System.Windows.Forms.Label();
            this.dgvPodijeljeniZaposlenici = new System.Windows.Forms.DataGridView();
            this.ObrišiButton = new System.Windows.Forms.Button();
            this.dgvProjekti = new System.Windows.Forms.DataGridView();
            this.OdaberiZaposlenikaLabel = new System.Windows.Forms.Label();
            this.dgvZaposlenici = new System.Windows.Forms.DataGridView();
            this.PodjelaZaposlenikaButton = new System.Windows.Forms.Button();
            this.OdaberiProjektLabel = new System.Windows.Forms.Label();
            this.panelNavigacijskaTraka = new System.Windows.Forms.Panel();
            this.labelPozdrav = new System.Windows.Forms.Label();
            this.pictureBoxReBILLOGO = new System.Windows.Forms.PictureBox();
            this.toolStripNavigacijskaTraka = new System.Windows.Forms.ToolStrip();
            this.toolStripButtonZatvori = new System.Windows.Forms.ToolStripButton();
            this.toolStripButtonGlavniIzbornik = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb = new System.Windows.Forms.ToolStripLabel();
            this.toolStripButtonZaposlenici = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb2 = new System.Windows.Forms.ToolStripLabel();
            this.toolStripLabelPodjelaZaposlenika = new System.Windows.Forms.ToolStripLabel();
            this.IzlazButton = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.dgvPodijeljeniZaposlenici)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.dgvProjekti)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.dgvZaposlenici)).BeginInit();
            this.panelNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).BeginInit();
            this.toolStripNavigacijskaTraka.SuspendLayout();
            this.SuspendLayout();
            // 
            // ZaposleniciNaProjektuLabel
            // 
            this.ZaposleniciNaProjektuLabel.AutoSize = true;
            this.ZaposleniciNaProjektuLabel.Font = new System.Drawing.Font("Microsoft Sans Serif", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.ZaposleniciNaProjektuLabel.Location = new System.Drawing.Point(395, 85);
            this.ZaposleniciNaProjektuLabel.Name = "ZaposleniciNaProjektuLabel";
            this.ZaposleniciNaProjektuLabel.Size = new System.Drawing.Size(164, 18);
            this.ZaposleniciNaProjektuLabel.TabIndex = 28;
            this.ZaposleniciNaProjektuLabel.Text = "Zaposlenici na projektu:";
            // 
            // dgvPodijeljeniZaposlenici
            // 
            this.dgvPodijeljeniZaposlenici.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvPodijeljeniZaposlenici.Location = new System.Drawing.Point(398, 106);
            this.dgvPodijeljeniZaposlenici.Name = "dgvPodijeljeniZaposlenici";
            this.dgvPodijeljeniZaposlenici.RowHeadersWidth = 51;
            this.dgvPodijeljeniZaposlenici.Size = new System.Drawing.Size(445, 405);
            this.dgvPodijeljeniZaposlenici.TabIndex = 27;
            this.dgvPodijeljeniZaposlenici.SelectionChanged += new System.EventHandler(this.dgvPodijeljeniZaposlenici_SelectionChanged);
            // 
            // ObrišiButton
            // 
            this.ObrišiButton.Location = new System.Drawing.Point(144, 471);
            this.ObrišiButton.Name = "ObrišiButton";
            this.ObrišiButton.Size = new System.Drawing.Size(96, 40);
            this.ObrišiButton.TabIndex = 26;
            this.ObrišiButton.Text = "Obriši";
            this.ObrišiButton.UseVisualStyleBackColor = true;
            this.ObrišiButton.Click += new System.EventHandler(this.ObrišiButton_Click);
            // 
            // dgvProjekti
            // 
            this.dgvProjekti.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvProjekti.Location = new System.Drawing.Point(12, 106);
            this.dgvProjekti.Name = "dgvProjekti";
            this.dgvProjekti.RowHeadersWidth = 51;
            this.dgvProjekti.Size = new System.Drawing.Size(369, 172);
            this.dgvProjekti.TabIndex = 25;
            this.dgvProjekti.SelectionChanged += new System.EventHandler(this.dgvProjekti_SelectionChanged);
            // 
            // OdaberiZaposlenikaLabel
            // 
            this.OdaberiZaposlenikaLabel.AutoSize = true;
            this.OdaberiZaposlenikaLabel.Font = new System.Drawing.Font("Microsoft Sans Serif", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.OdaberiZaposlenikaLabel.Location = new System.Drawing.Point(9, 281);
            this.OdaberiZaposlenikaLabel.Name = "OdaberiZaposlenikaLabel";
            this.OdaberiZaposlenikaLabel.Size = new System.Drawing.Size(147, 18);
            this.OdaberiZaposlenikaLabel.TabIndex = 24;
            this.OdaberiZaposlenikaLabel.Text = "Odaberi zaposlenika:";
            // 
            // dgvZaposlenici
            // 
            this.dgvZaposlenici.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvZaposlenici.Location = new System.Drawing.Point(12, 302);
            this.dgvZaposlenici.Name = "dgvZaposlenici";
            this.dgvZaposlenici.RowHeadersWidth = 51;
            this.dgvZaposlenici.Size = new System.Drawing.Size(369, 163);
            this.dgvZaposlenici.TabIndex = 23;
            this.dgvZaposlenici.SelectionChanged += new System.EventHandler(this.dgvZaposlenici_SelectionChanged);
            // 
            // PodjelaZaposlenikaButton
            // 
            this.PodjelaZaposlenikaButton.Location = new System.Drawing.Point(26, 471);
            this.PodjelaZaposlenikaButton.Name = "PodjelaZaposlenikaButton";
            this.PodjelaZaposlenikaButton.Size = new System.Drawing.Size(96, 40);
            this.PodjelaZaposlenikaButton.TabIndex = 22;
            this.PodjelaZaposlenikaButton.Text = "Dodaj";
            this.PodjelaZaposlenikaButton.UseVisualStyleBackColor = true;
            this.PodjelaZaposlenikaButton.Click += new System.EventHandler(this.PodjelaZaposlenika_Click);
            // 
            // OdaberiProjektLabel
            // 
            this.OdaberiProjektLabel.AutoSize = true;
            this.OdaberiProjektLabel.Font = new System.Drawing.Font("Microsoft Sans Serif", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.OdaberiProjektLabel.Location = new System.Drawing.Point(9, 85);
            this.OdaberiProjektLabel.Name = "OdaberiProjektLabel";
            this.OdaberiProjektLabel.Size = new System.Drawing.Size(113, 18);
            this.OdaberiProjektLabel.TabIndex = 21;
            this.OdaberiProjektLabel.Text = "Odaberi projekt:";
            // 
            // panelNavigacijskaTraka
            // 
            this.panelNavigacijskaTraka.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.panelNavigacijskaTraka.Controls.Add(this.labelPozdrav);
            this.panelNavigacijskaTraka.Controls.Add(this.pictureBoxReBILLOGO);
            this.panelNavigacijskaTraka.Controls.Add(this.toolStripNavigacijskaTraka);
            this.panelNavigacijskaTraka.Location = new System.Drawing.Point(0, 0);
            this.panelNavigacijskaTraka.Name = "panelNavigacijskaTraka";
            this.panelNavigacijskaTraka.Size = new System.Drawing.Size(855, 70);
            this.panelNavigacijskaTraka.TabIndex = 57;
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
            this.pictureBoxReBILLOGO.Image = global::Zaposlenici.Properties.Resources.ReBilLogo;
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
            this.toolStripButtonZaposlenici,
            this.toolStripLabelBreadcrumb2,
            this.toolStripLabelPodjelaZaposlenika});
            this.toolStripNavigacijskaTraka.Location = new System.Drawing.Point(61, 11);
            this.toolStripNavigacijskaTraka.Name = "toolStripNavigacijskaTraka";
            this.toolStripNavigacijskaTraka.Padding = new System.Windows.Forms.Padding(5, 5, 5, 5);
            this.toolStripNavigacijskaTraka.RenderMode = System.Windows.Forms.ToolStripRenderMode.System;
            this.toolStripNavigacijskaTraka.Size = new System.Drawing.Size(792, 41);
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
            // toolStripButtonZaposlenici
            // 
            this.toolStripButtonZaposlenici.DisplayStyle = System.Windows.Forms.ToolStripItemDisplayStyle.Text;
            this.toolStripButtonZaposlenici.Image = ((System.Drawing.Image)(resources.GetObject("toolStripButtonZaposlenici.Image")));
            this.toolStripButtonZaposlenici.ImageTransparentColor = System.Drawing.Color.Magenta;
            this.toolStripButtonZaposlenici.Name = "toolStripButtonZaposlenici";
            this.toolStripButtonZaposlenici.Size = new System.Drawing.Size(71, 28);
            this.toolStripButtonZaposlenici.Text = "Zaposlenici";
            this.toolStripButtonZaposlenici.Click += new System.EventHandler(this.toolStripButtonZaposlenici_Click);
            // 
            // toolStripLabelBreadcrumb2
            // 
            this.toolStripLabelBreadcrumb2.Name = "toolStripLabelBreadcrumb2";
            this.toolStripLabelBreadcrumb2.Size = new System.Drawing.Size(15, 28);
            this.toolStripLabelBreadcrumb2.Text = ">";
            // 
            // toolStripLabelPodjelaZaposlenika
            // 
            this.toolStripLabelPodjelaZaposlenika.Name = "toolStripLabelPodjelaZaposlenika";
            this.toolStripLabelPodjelaZaposlenika.Size = new System.Drawing.Size(110, 28);
            this.toolStripLabelPodjelaZaposlenika.Text = "Podjela zaposlenika";
            // 
            // IzlazButton
            // 
            this.IzlazButton.Location = new System.Drawing.Point(262, 471);
            this.IzlazButton.Name = "IzlazButton";
            this.IzlazButton.Size = new System.Drawing.Size(96, 40);
            this.IzlazButton.TabIndex = 58;
            this.IzlazButton.Text = "Izlaz";
            this.IzlazButton.UseVisualStyleBackColor = true;
            this.IzlazButton.Click += new System.EventHandler(this.IzlazButton_Click);
            // 
            // FormPodjelaZaposlenika
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(855, 523);
            this.ControlBox = false;
            this.Controls.Add(this.IzlazButton);
            this.Controls.Add(this.panelNavigacijskaTraka);
            this.Controls.Add(this.ZaposleniciNaProjektuLabel);
            this.Controls.Add(this.dgvPodijeljeniZaposlenici);
            this.Controls.Add(this.ObrišiButton);
            this.Controls.Add(this.dgvProjekti);
            this.Controls.Add(this.OdaberiZaposlenikaLabel);
            this.Controls.Add(this.dgvZaposlenici);
            this.Controls.Add(this.PodjelaZaposlenikaButton);
            this.Controls.Add(this.OdaberiProjektLabel);
            this.Name = "FormPodjelaZaposlenika";
            this.SizeGripStyle = System.Windows.Forms.SizeGripStyle.Hide;
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "Podjela zaposlenika";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormPodjelaZaposlenika_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormPodjelaZaposlenika_HelpRequested);
            ((System.ComponentModel.ISupportInitialize)(this.dgvPodijeljeniZaposlenici)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.dgvProjekti)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.dgvZaposlenici)).EndInit();
            this.panelNavigacijskaTraka.ResumeLayout(false);
            this.panelNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).EndInit();
            this.toolStripNavigacijskaTraka.ResumeLayout(false);
            this.toolStripNavigacijskaTraka.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label ZaposleniciNaProjektuLabel;
        private System.Windows.Forms.DataGridView dgvPodijeljeniZaposlenici;
        private System.Windows.Forms.Button ObrišiButton;
        private System.Windows.Forms.DataGridView dgvProjekti;
        private System.Windows.Forms.Label OdaberiZaposlenikaLabel;
        private System.Windows.Forms.DataGridView dgvZaposlenici;
        private System.Windows.Forms.Button PodjelaZaposlenikaButton;
        private System.Windows.Forms.Label OdaberiProjektLabel;
        private System.Windows.Forms.Panel panelNavigacijskaTraka;
        private System.Windows.Forms.Label labelPozdrav;
        private System.Windows.Forms.PictureBox pictureBoxReBILLOGO;
        private System.Windows.Forms.ToolStrip toolStripNavigacijskaTraka;
        private System.Windows.Forms.ToolStripButton toolStripButtonZatvori;
        private System.Windows.Forms.ToolStripButton toolStripButtonGlavniIzbornik;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb;
        private System.Windows.Forms.ToolStripButton toolStripButtonZaposlenici;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb2;
        private System.Windows.Forms.ToolStripLabel toolStripLabelPodjelaZaposlenika;
        private System.Windows.Forms.Button IzlazButton;
    }
}