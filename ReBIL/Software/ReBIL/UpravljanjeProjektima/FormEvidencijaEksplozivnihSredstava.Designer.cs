namespace UpravljanjeProjektima
{
    partial class FormEvidencijaEksplozivnihSredstava
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(FormEvidencijaEksplozivnihSredstava));
            this.panelNavigacijskaTraka = new System.Windows.Forms.Panel();
            this.labelPozdrav = new System.Windows.Forms.Label();
            this.toolStripNavigacijskaTraka = new System.Windows.Forms.ToolStrip();
            this.toolStripButtonGlavniIzbornik = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb = new System.Windows.Forms.ToolStripLabel();
            this.toolStripButtonUpravljanjeProjektima = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb2 = new System.Windows.Forms.ToolStripLabel();
            this.toolStripLabelEksplozivnaSredstva = new System.Windows.Forms.ToolStripLabel();
            this.pictureBoxReBILLogo = new System.Windows.Forms.PictureBox();
            this.groupBoxListaESredstava = new System.Windows.Forms.GroupBox();
            this.buttonIzlaz = new System.Windows.Forms.Button();
            this.dgvListaEksploziva = new System.Windows.Forms.DataGridView();
            this.DodajESredstvoButton = new System.Windows.Forms.Button();
            this.IzbrisiEksplozivButton = new System.Windows.Forms.Button();
            this.UrediEksplozivButton = new System.Windows.Forms.Button();
            this.labelNazivProjekta = new System.Windows.Forms.Label();
            this.labelNaziv = new System.Windows.Forms.Label();
            this.panelNavigacijskaTraka.SuspendLayout();
            this.toolStripNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLogo)).BeginInit();
            this.groupBoxListaESredstava.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaEksploziva)).BeginInit();
            this.SuspendLayout();
            // 
            // panelNavigacijskaTraka
            // 
            this.panelNavigacijskaTraka.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.panelNavigacijskaTraka.Controls.Add(this.labelPozdrav);
            this.panelNavigacijskaTraka.Controls.Add(this.toolStripNavigacijskaTraka);
            this.panelNavigacijskaTraka.Location = new System.Drawing.Point(0, 0);
            this.panelNavigacijskaTraka.Name = "panelNavigacijskaTraka";
            this.panelNavigacijskaTraka.Size = new System.Drawing.Size(709, 70);
            this.panelNavigacijskaTraka.TabIndex = 60;
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
            this.toolStripButtonGlavniIzbornik,
            this.toolStripLabelBreadcrumb,
            this.toolStripButtonUpravljanjeProjektima,
            this.toolStripLabelBreadcrumb2,
            this.toolStripLabelEksplozivnaSredstva});
            this.toolStripNavigacijskaTraka.Location = new System.Drawing.Point(90, 9);
            this.toolStripNavigacijskaTraka.Name = "toolStripNavigacijskaTraka";
            this.toolStripNavigacijskaTraka.Padding = new System.Windows.Forms.Padding(5);
            this.toolStripNavigacijskaTraka.RenderMode = System.Windows.Forms.ToolStripRenderMode.System;
            this.toolStripNavigacijskaTraka.Size = new System.Drawing.Size(602, 41);
            this.toolStripNavigacijskaTraka.Stretch = true;
            this.toolStripNavigacijskaTraka.TabIndex = 15;
            this.toolStripNavigacijskaTraka.Text = "Navigacijska Traka";
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
            // toolStripLabelBreadcrumb2
            // 
            this.toolStripLabelBreadcrumb2.Name = "toolStripLabelBreadcrumb2";
            this.toolStripLabelBreadcrumb2.Size = new System.Drawing.Size(15, 28);
            this.toolStripLabelBreadcrumb2.Text = ">";
            // 
            // toolStripLabelEksplozivnaSredstva
            // 
            this.toolStripLabelEksplozivnaSredstva.Name = "toolStripLabelEksplozivnaSredstva";
            this.toolStripLabelEksplozivnaSredstva.Size = new System.Drawing.Size(114, 28);
            this.toolStripLabelEksplozivnaSredstva.Text = "Eksplozivna sredstva";
            // 
            // pictureBoxReBILLogo
            // 
            this.pictureBoxReBILLogo.Image = global::UpravljanjeProjektima.Properties.Resources.ReBilLogo;
            this.pictureBoxReBILLogo.Location = new System.Drawing.Point(3, 3);
            this.pictureBoxReBILLogo.Name = "pictureBoxReBILLogo";
            this.pictureBoxReBILLogo.Size = new System.Drawing.Size(57, 50);
            this.pictureBoxReBILLogo.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBoxReBILLogo.TabIndex = 61;
            this.pictureBoxReBILLogo.TabStop = false;
            // 
            // groupBoxListaESredstava
            // 
            this.groupBoxListaESredstava.Controls.Add(this.buttonIzlaz);
            this.groupBoxListaESredstava.Controls.Add(this.dgvListaEksploziva);
            this.groupBoxListaESredstava.Controls.Add(this.DodajESredstvoButton);
            this.groupBoxListaESredstava.Controls.Add(this.IzbrisiEksplozivButton);
            this.groupBoxListaESredstava.Controls.Add(this.UrediEksplozivButton);
            this.groupBoxListaESredstava.Location = new System.Drawing.Point(21, 110);
            this.groupBoxListaESredstava.Name = "groupBoxListaESredstava";
            this.groupBoxListaESredstava.Size = new System.Drawing.Size(672, 185);
            this.groupBoxListaESredstava.TabIndex = 62;
            this.groupBoxListaESredstava.TabStop = false;
            this.groupBoxListaESredstava.Text = "Lista eksplozivnih sredstava:";
            // 
            // buttonIzlaz
            // 
            this.buttonIzlaz.Location = new System.Drawing.Point(559, 143);
            this.buttonIzlaz.Name = "buttonIzlaz";
            this.buttonIzlaz.Size = new System.Drawing.Size(86, 23);
            this.buttonIzlaz.TabIndex = 65;
            this.buttonIzlaz.Text = "Izlaz";
            this.buttonIzlaz.UseVisualStyleBackColor = true;
            this.buttonIzlaz.Click += new System.EventHandler(this.buttonIzlaz_Click);
            // 
            // dgvListaEksploziva
            // 
            this.dgvListaEksploziva.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvListaEksploziva.Location = new System.Drawing.Point(6, 23);
            this.dgvListaEksploziva.Name = "dgvListaEksploziva";
            this.dgvListaEksploziva.Size = new System.Drawing.Size(526, 150);
            this.dgvListaEksploziva.TabIndex = 9;
            this.dgvListaEksploziva.SelectionChanged += new System.EventHandler(this.dgvListaEksploziva_SelectionChanged);
            // 
            // DodajESredstvoButton
            // 
            this.DodajESredstvoButton.Location = new System.Drawing.Point(559, 23);
            this.DodajESredstvoButton.Name = "DodajESredstvoButton";
            this.DodajESredstvoButton.Size = new System.Drawing.Size(86, 23);
            this.DodajESredstvoButton.TabIndex = 15;
            this.DodajESredstvoButton.Text = "Dodaj sredstvo";
            this.DodajESredstvoButton.UseVisualStyleBackColor = true;
            this.DodajESredstvoButton.Click += new System.EventHandler(this.DodajESredstvoButton_Click);
            // 
            // IzbrisiEksplozivButton
            // 
            this.IzbrisiEksplozivButton.Location = new System.Drawing.Point(559, 103);
            this.IzbrisiEksplozivButton.Name = "IzbrisiEksplozivButton";
            this.IzbrisiEksplozivButton.Size = new System.Drawing.Size(86, 23);
            this.IzbrisiEksplozivButton.TabIndex = 17;
            this.IzbrisiEksplozivButton.Text = "Izbriši";
            this.IzbrisiEksplozivButton.UseVisualStyleBackColor = true;
            this.IzbrisiEksplozivButton.Click += new System.EventHandler(this.IzbrisiProjektButton_Click);
            // 
            // UrediEksplozivButton
            // 
            this.UrediEksplozivButton.Location = new System.Drawing.Point(559, 62);
            this.UrediEksplozivButton.Name = "UrediEksplozivButton";
            this.UrediEksplozivButton.Size = new System.Drawing.Size(86, 23);
            this.UrediEksplozivButton.TabIndex = 16;
            this.UrediEksplozivButton.Text = "Uredi";
            this.UrediEksplozivButton.UseVisualStyleBackColor = true;
            this.UrediEksplozivButton.Click += new System.EventHandler(this.UrediProjektButton_Click);
            // 
            // labelNazivProjekta
            // 
            this.labelNazivProjekta.AutoSize = true;
            this.labelNazivProjekta.Location = new System.Drawing.Point(39, 83);
            this.labelNazivProjekta.Name = "labelNazivProjekta";
            this.labelNazivProjekta.Size = new System.Drawing.Size(78, 13);
            this.labelNazivProjekta.TabIndex = 63;
            this.labelNazivProjekta.Text = "Naziv projekta:";
            // 
            // labelNaziv
            // 
            this.labelNaziv.AutoSize = true;
            this.labelNaziv.Font = new System.Drawing.Font("Microsoft Sans Serif", 10F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.labelNaziv.Location = new System.Drawing.Point(121, 81);
            this.labelNaziv.Name = "labelNaziv";
            this.labelNaziv.Size = new System.Drawing.Size(41, 17);
            this.labelNaziv.TabIndex = 64;
            this.labelNaziv.Text = "naziv";
            // 
            // FormEvidencijaEksplozivnihSredstava
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(719, 313);
            this.ControlBox = false;
            this.Controls.Add(this.labelNaziv);
            this.Controls.Add(this.labelNazivProjekta);
            this.Controls.Add(this.groupBoxListaESredstava);
            this.Controls.Add(this.pictureBoxReBILLogo);
            this.Controls.Add(this.panelNavigacijskaTraka);
            this.Name = "FormEvidencijaEksplozivnihSredstava";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "Evidencija eksplozivnih sredstava";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormEvidencijaEksplozivnihSredstava_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormEvidencijaEksplozivnihSredstava_HelpRequested);
            this.panelNavigacijskaTraka.ResumeLayout(false);
            this.panelNavigacijskaTraka.PerformLayout();
            this.toolStripNavigacijskaTraka.ResumeLayout(false);
            this.toolStripNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLogo)).EndInit();
            this.groupBoxListaESredstava.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaEksploziva)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Panel panelNavigacijskaTraka;
        private System.Windows.Forms.Label labelPozdrav;
        private System.Windows.Forms.ToolStrip toolStripNavigacijskaTraka;
        private System.Windows.Forms.ToolStripButton toolStripButtonGlavniIzbornik;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb;
        private System.Windows.Forms.ToolStripLabel toolStripLabelEksplozivnaSredstva;
        private System.Windows.Forms.PictureBox pictureBoxReBILLogo;
        private System.Windows.Forms.GroupBox groupBoxListaESredstava;
        private System.Windows.Forms.DataGridView dgvListaEksploziva;
        private System.Windows.Forms.Button DodajESredstvoButton;
        private System.Windows.Forms.Button IzbrisiEksplozivButton;
        private System.Windows.Forms.Button UrediEksplozivButton;
        private System.Windows.Forms.Label labelNazivProjekta;
        private System.Windows.Forms.Label labelNaziv;
        private System.Windows.Forms.Button buttonIzlaz;
        private System.Windows.Forms.ToolStripButton toolStripButtonUpravljanjeProjektima;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb2;
    }
}