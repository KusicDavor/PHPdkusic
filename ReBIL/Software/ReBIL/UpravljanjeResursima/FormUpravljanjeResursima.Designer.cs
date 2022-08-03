namespace UpravljanjeResursima
{
    partial class FormUpravljanjeResursima
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(FormUpravljanjeResursima));
            this.btnUpravljanjeVozilima = new System.Windows.Forms.Button();
            this.panelNavigacijskaTraka = new System.Windows.Forms.Panel();
            this.labelPozdrav = new System.Windows.Forms.Label();
            this.pictureBoxReBILLOGO = new System.Windows.Forms.PictureBox();
            this.toolStripNavigacijskaTraka = new System.Windows.Forms.ToolStrip();
            this.toolStripButtonZatvori = new System.Windows.Forms.ToolStripButton();
            this.toolStripButtonGlavniIzbornik = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb = new System.Windows.Forms.ToolStripLabel();
            this.toolStripLabelUpravljanjeResursima = new System.Windows.Forms.ToolStripLabel();
            this.btnUpravljanjeOpremom = new System.Windows.Forms.Button();
            this.pictureBox2 = new System.Windows.Forms.PictureBox();
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.btnUpravljanjeDIjelovima = new System.Windows.Forms.Button();
            this.pictureBox3 = new System.Windows.Forms.PictureBox();
            this.panelNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).BeginInit();
            this.toolStripNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox2)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox3)).BeginInit();
            this.SuspendLayout();
            // 
            // btnUpravljanjeVozilima
            // 
            this.btnUpravljanjeVozilima.Location = new System.Drawing.Point(33, 233);
            this.btnUpravljanjeVozilima.Name = "btnUpravljanjeVozilima";
            this.btnUpravljanjeVozilima.Size = new System.Drawing.Size(130, 42);
            this.btnUpravljanjeVozilima.TabIndex = 6;
            this.btnUpravljanjeVozilima.Text = "Upravljanje transportnim vozilima";
            this.btnUpravljanjeVozilima.UseVisualStyleBackColor = true;
            this.btnUpravljanjeVozilima.Click += new System.EventHandler(this.buttonUpravljanjeVozilima_Click);
            // 
            // panelNavigacijskaTraka
            // 
            this.panelNavigacijskaTraka.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.panelNavigacijskaTraka.Controls.Add(this.labelPozdrav);
            this.panelNavigacijskaTraka.Controls.Add(this.pictureBoxReBILLOGO);
            this.panelNavigacijskaTraka.Controls.Add(this.toolStripNavigacijskaTraka);
            this.panelNavigacijskaTraka.Location = new System.Drawing.Point(0, 0);
            this.panelNavigacijskaTraka.Name = "panelNavigacijskaTraka";
            this.panelNavigacijskaTraka.Size = new System.Drawing.Size(770, 70);
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
            this.toolStripNavigacijskaTraka.ImageScalingSize = new System.Drawing.Size(24, 24);
            this.toolStripNavigacijskaTraka.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.toolStripButtonZatvori,
            this.toolStripButtonGlavniIzbornik,
            this.toolStripLabelBreadcrumb,
            this.toolStripLabelUpravljanjeResursima});
            this.toolStripNavigacijskaTraka.Location = new System.Drawing.Point(228, 8);
            this.toolStripNavigacijskaTraka.Name = "toolStripNavigacijskaTraka";
            this.toolStripNavigacijskaTraka.Padding = new System.Windows.Forms.Padding(5);
            this.toolStripNavigacijskaTraka.RenderMode = System.Windows.Forms.ToolStripRenderMode.System;
            this.toolStripNavigacijskaTraka.Size = new System.Drawing.Size(530, 41);
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
            // toolStripLabelUpravljanjeResursima
            // 
            this.toolStripLabelUpravljanjeResursima.Name = "toolStripLabelUpravljanjeResursima";
            this.toolStripLabelUpravljanjeResursima.Size = new System.Drawing.Size(120, 28);
            this.toolStripLabelUpravljanjeResursima.Text = "Upravljanje resursima";
            // 
            // btnUpravljanjeOpremom
            // 
            this.btnUpravljanjeOpremom.Location = new System.Drawing.Point(269, 233);
            this.btnUpravljanjeOpremom.Name = "btnUpravljanjeOpremom";
            this.btnUpravljanjeOpremom.Size = new System.Drawing.Size(130, 42);
            this.btnUpravljanjeOpremom.TabIndex = 62;
            this.btnUpravljanjeOpremom.Text = "Upravljanje opremom";
            this.btnUpravljanjeOpremom.UseVisualStyleBackColor = true;
            this.btnUpravljanjeOpremom.Click += new System.EventHandler(this.btnUpravljanjeOpremom_Click);
            this.btnUpravljanjeOpremom.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.btnUpravljanjeOpremom_HelpRequested);
            // 
            // pictureBox2
            // 
            this.pictureBox2.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox2.Image")));
            this.pictureBox2.Location = new System.Drawing.Point(269, 96);
            this.pictureBox2.Name = "pictureBox2";
            this.pictureBox2.Size = new System.Drawing.Size(130, 117);
            this.pictureBox2.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox2.TabIndex = 64;
            this.pictureBox2.TabStop = false;
            // 
            // pictureBox1
            // 
            this.pictureBox1.Image = global::UpravljanjeResursima.Properties.Resources.dodavanje_vozila1;
            this.pictureBox1.Location = new System.Drawing.Point(33, 96);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(130, 117);
            this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox1.TabIndex = 63;
            this.pictureBox1.TabStop = false;
            // 
            // btnUpravljanjeDIjelovima
            // 
            this.btnUpravljanjeDIjelovima.Location = new System.Drawing.Point(499, 233);
            this.btnUpravljanjeDIjelovima.Name = "btnUpravljanjeDIjelovima";
            this.btnUpravljanjeDIjelovima.Size = new System.Drawing.Size(130, 42);
            this.btnUpravljanjeDIjelovima.TabIndex = 62;
            this.btnUpravljanjeDIjelovima.Text = "Upravljanje dijelovima";
            this.btnUpravljanjeDIjelovima.UseVisualStyleBackColor = true;
            this.btnUpravljanjeDIjelovima.Click += new System.EventHandler(this.btnUpravljanjeDIjelovima_Click);
            this.btnUpravljanjeDIjelovima.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.btnUpravljanjeOpremom_HelpRequested);
            // 
            // pictureBox3
            // 
            this.pictureBox3.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox3.Image")));
            this.pictureBox3.Location = new System.Drawing.Point(499, 96);
            this.pictureBox3.Name = "pictureBox3";
            this.pictureBox3.Size = new System.Drawing.Size(130, 117);
            this.pictureBox3.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox3.TabIndex = 64;
            this.pictureBox3.TabStop = false;
            // 
            // FormUpravljanjeResursima
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(782, 311);
            this.ControlBox = false;
            this.Controls.Add(this.pictureBox3);
            this.Controls.Add(this.pictureBox2);
            this.Controls.Add(this.pictureBox1);
            this.Controls.Add(this.btnUpravljanjeDIjelovima);
            this.Controls.Add(this.btnUpravljanjeOpremom);
            this.Controls.Add(this.panelNavigacijskaTraka);
            this.Controls.Add(this.btnUpravljanjeVozilima);
            this.Name = "FormUpravljanjeResursima";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Upravljanje resursima";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormUpravljanjeResursima_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormUpravljanjeResursima_HelpRequested);
            this.panelNavigacijskaTraka.ResumeLayout(false);
            this.panelNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).EndInit();
            this.toolStripNavigacijskaTraka.ResumeLayout(false);
            this.toolStripNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox2)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox3)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion
        private System.Windows.Forms.Button btnUpravljanjeVozilima;
        private System.Windows.Forms.Panel panelNavigacijskaTraka;
        private System.Windows.Forms.Label labelPozdrav;
        private System.Windows.Forms.PictureBox pictureBoxReBILLOGO;
        private System.Windows.Forms.ToolStrip toolStripNavigacijskaTraka;
        private System.Windows.Forms.ToolStripButton toolStripButtonZatvori;
        private System.Windows.Forms.ToolStripButton toolStripButtonGlavniIzbornik;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb;
        private System.Windows.Forms.ToolStripLabel toolStripLabelUpravljanjeResursima;
        private System.Windows.Forms.Button btnUpravljanjeOpremom;
        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.PictureBox pictureBox2;
        private System.Windows.Forms.Button btnUpravljanjeDIjelovima;
        private System.Windows.Forms.PictureBox pictureBox3;
    }
}

