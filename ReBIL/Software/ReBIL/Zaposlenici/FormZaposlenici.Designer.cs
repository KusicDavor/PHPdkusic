namespace Zaposlenici
{
    partial class FormZaposlenici
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(FormZaposlenici));
            this.PodjelaZaposlenikaButton = new System.Windows.Forms.Button();
            this.RegistrirajZaposlenikaButton = new System.Windows.Forms.Button();
            this.popisZaposlenikaLabel = new System.Windows.Forms.Label();
            this.dgvZaposlenici = new System.Windows.Forms.DataGridView();
            this.panelNavigacijskaTraka = new System.Windows.Forms.Panel();
            this.labelPozdrav = new System.Windows.Forms.Label();
            this.pictureBoxReBILLOGO = new System.Windows.Forms.PictureBox();
            this.toolStripNavigacijskaTraka = new System.Windows.Forms.ToolStrip();
            this.toolStripButtonZatvori = new System.Windows.Forms.ToolStripButton();
            this.toolStripButtonGlavniIzbornik = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb = new System.Windows.Forms.ToolStripLabel();
            this.toolStripLabelZaposlenici = new System.Windows.Forms.ToolStripLabel();
            this.ObrišiZaposlenikaButton = new System.Windows.Forms.Button();
            this.UrediZaposlenikaButton = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.dgvZaposlenici)).BeginInit();
            this.panelNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).BeginInit();
            this.toolStripNavigacijskaTraka.SuspendLayout();
            this.SuspendLayout();
            // 
            // PodjelaZaposlenikaButton
            // 
            this.PodjelaZaposlenikaButton.Location = new System.Drawing.Point(547, 389);
            this.PodjelaZaposlenikaButton.Name = "PodjelaZaposlenikaButton";
            this.PodjelaZaposlenikaButton.Size = new System.Drawing.Size(128, 35);
            this.PodjelaZaposlenikaButton.TabIndex = 8;
            this.PodjelaZaposlenikaButton.Text = "Podjela zaposlenika";
            this.PodjelaZaposlenikaButton.UseVisualStyleBackColor = true;
            this.PodjelaZaposlenikaButton.Click += new System.EventHandler(this.PodjelaZaposlenikaButton_Click);
            // 
            // RegistrirajZaposlenikaButton
            // 
            this.RegistrirajZaposlenikaButton.Location = new System.Drawing.Point(547, 263);
            this.RegistrirajZaposlenikaButton.Name = "RegistrirajZaposlenikaButton";
            this.RegistrirajZaposlenikaButton.Size = new System.Drawing.Size(128, 35);
            this.RegistrirajZaposlenikaButton.TabIndex = 7;
            this.RegistrirajZaposlenikaButton.Text = "Registriraj zaposlenika";
            this.RegistrirajZaposlenikaButton.UseVisualStyleBackColor = true;
            this.RegistrirajZaposlenikaButton.Click += new System.EventHandler(this.RegistrirajZaposlenikaButton_Click);
            // 
            // popisZaposlenikaLabel
            // 
            this.popisZaposlenikaLabel.AutoSize = true;
            this.popisZaposlenikaLabel.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.popisZaposlenikaLabel.Location = new System.Drawing.Point(20, 89);
            this.popisZaposlenikaLabel.Name = "popisZaposlenikaLabel";
            this.popisZaposlenikaLabel.Size = new System.Drawing.Size(184, 24);
            this.popisZaposlenikaLabel.TabIndex = 6;
            this.popisZaposlenikaLabel.Text = "Popis zaposlenika:";
            // 
            // dgvZaposlenici
            // 
            this.dgvZaposlenici.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvZaposlenici.Location = new System.Drawing.Point(25, 128);
            this.dgvZaposlenici.Name = "dgvZaposlenici";
            this.dgvZaposlenici.RowHeadersWidth = 51;
            this.dgvZaposlenici.Size = new System.Drawing.Size(509, 296);
            this.dgvZaposlenici.TabIndex = 5;
            // 
            // panelNavigacijskaTraka
            // 
            this.panelNavigacijskaTraka.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.panelNavigacijskaTraka.Controls.Add(this.labelPozdrav);
            this.panelNavigacijskaTraka.Controls.Add(this.pictureBoxReBILLOGO);
            this.panelNavigacijskaTraka.Controls.Add(this.toolStripNavigacijskaTraka);
            this.panelNavigacijskaTraka.Location = new System.Drawing.Point(0, 0);
            this.panelNavigacijskaTraka.Name = "panelNavigacijskaTraka";
            this.panelNavigacijskaTraka.Size = new System.Drawing.Size(686, 70);
            this.panelNavigacijskaTraka.TabIndex = 58;
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
            this.toolStripLabelZaposlenici});
            this.toolStripNavigacijskaTraka.Location = new System.Drawing.Point(61, 10);
            this.toolStripNavigacijskaTraka.Name = "toolStripNavigacijskaTraka";
            this.toolStripNavigacijskaTraka.Padding = new System.Windows.Forms.Padding(5, 5, 5, 5);
            this.toolStripNavigacijskaTraka.RenderMode = System.Windows.Forms.ToolStripRenderMode.System;
            this.toolStripNavigacijskaTraka.Size = new System.Drawing.Size(622, 41);
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
            // toolStripLabelZaposlenici
            // 
            this.toolStripLabelZaposlenici.Name = "toolStripLabelZaposlenici";
            this.toolStripLabelZaposlenici.Size = new System.Drawing.Size(67, 28);
            this.toolStripLabelZaposlenici.Text = "Zaposlenici";
            // 
            // ObrišiZaposlenikaButton
            // 
            this.ObrišiZaposlenikaButton.Location = new System.Drawing.Point(547, 169);
            this.ObrišiZaposlenikaButton.Name = "ObrišiZaposlenikaButton";
            this.ObrišiZaposlenikaButton.Size = new System.Drawing.Size(128, 35);
            this.ObrišiZaposlenikaButton.TabIndex = 10;
            this.ObrišiZaposlenikaButton.Text = "Obriši zaposlenika";
            this.ObrišiZaposlenikaButton.UseVisualStyleBackColor = true;
            this.ObrišiZaposlenikaButton.Click += new System.EventHandler(this.ObrišiZaposlenika_Click);
            // 
            // UrediZaposlenikaButton
            // 
            this.UrediZaposlenikaButton.Location = new System.Drawing.Point(547, 128);
            this.UrediZaposlenikaButton.Name = "UrediZaposlenikaButton";
            this.UrediZaposlenikaButton.Size = new System.Drawing.Size(128, 35);
            this.UrediZaposlenikaButton.TabIndex = 11;
            this.UrediZaposlenikaButton.Text = "Uredi zaposlenika";
            this.UrediZaposlenikaButton.UseVisualStyleBackColor = true;
            this.UrediZaposlenikaButton.Click += new System.EventHandler(this.UrediZaposlenika_Click);
            // 
            // FormZaposlenici
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(686, 442);
            this.ControlBox = false;
            this.Controls.Add(this.panelNavigacijskaTraka);
            this.Controls.Add(this.UrediZaposlenikaButton);
            this.Controls.Add(this.ObrišiZaposlenikaButton);
            this.Controls.Add(this.PodjelaZaposlenikaButton);
            this.Controls.Add(this.RegistrirajZaposlenikaButton);
            this.Controls.Add(this.popisZaposlenikaLabel);
            this.Controls.Add(this.dgvZaposlenici);
            this.MaximizeBox = false;
            this.MinimizeBox = false;
            this.Name = "FormZaposlenici";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Zaposlenici";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormZaposlenici_Load);
            this.Shown += new System.EventHandler(this.FormZaposlenici_Shown);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormZaposlenici_HelpRequested);
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
        private System.Windows.Forms.Button PodjelaZaposlenikaButton;
        private System.Windows.Forms.Button RegistrirajZaposlenikaButton;
        private System.Windows.Forms.Label popisZaposlenikaLabel;
        private System.Windows.Forms.DataGridView dgvZaposlenici;
        private System.Windows.Forms.Panel panelNavigacijskaTraka;
        private System.Windows.Forms.Label labelPozdrav;
        private System.Windows.Forms.PictureBox pictureBoxReBILLOGO;
        private System.Windows.Forms.ToolStrip toolStripNavigacijskaTraka;
        private System.Windows.Forms.ToolStripButton toolStripButtonZatvori;
        private System.Windows.Forms.ToolStripButton toolStripButtonGlavniIzbornik;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb;
        private System.Windows.Forms.ToolStripLabel toolStripLabelZaposlenici;
        private System.Windows.Forms.Button ObrišiZaposlenikaButton;
        private System.Windows.Forms.Button UrediZaposlenikaButton;
    }
}

