namespace UpravljanjeProjektima
{
    partial class FormLogistika
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(FormLogistika));
            this.rezervacijeButton = new System.Windows.Forms.Button();
            this.odaberiSmjestajButton = new System.Windows.Forms.Button();
            this.izbrisiSmjestajButton = new System.Windows.Forms.Button();
            this.urediSmjestajButton = new System.Windows.Forms.Button();
            this.dodajSmjestajButton = new System.Windows.Forms.Button();
            this.label1 = new System.Windows.Forms.Label();
            this.listaSmjestajaDataGridView = new System.Windows.Forms.DataGridView();
            this.panelNavigacijskaTraka = new System.Windows.Forms.Panel();
            this.pictureBoxReBILLogo = new System.Windows.Forms.PictureBox();
            this.labelPozdrav = new System.Windows.Forms.Label();
            this.toolStripNavigacijskaTraka = new System.Windows.Forms.ToolStrip();
            this.toolStripButtonZatvori = new System.Windows.Forms.ToolStripButton();
            this.toolStripButtonGlavniIzbornik = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb = new System.Windows.Forms.ToolStripLabel();
            this.toolStripButtonUpravljanjeProjektima = new System.Windows.Forms.ToolStripButton();
            this.toolStripLabelBreadcrumb2 = new System.Windows.Forms.ToolStripLabel();
            this.toolStripLabelLogistika = new System.Windows.Forms.ToolStripLabel();
            ((System.ComponentModel.ISupportInitialize)(this.listaSmjestajaDataGridView)).BeginInit();
            this.panelNavigacijskaTraka.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLogo)).BeginInit();
            this.toolStripNavigacijskaTraka.SuspendLayout();
            this.SuspendLayout();
            // 
            // rezervacijeButton
            // 
            this.rezervacijeButton.Location = new System.Drawing.Point(149, 377);
            this.rezervacijeButton.Name = "rezervacijeButton";
            this.rezervacijeButton.Size = new System.Drawing.Size(96, 23);
            this.rezervacijeButton.TabIndex = 13;
            this.rezervacijeButton.Text = "Rezervacije";
            this.rezervacijeButton.UseVisualStyleBackColor = true;
            this.rezervacijeButton.Click += new System.EventHandler(this.rezervacijeButton_Click);
            // 
            // odaberiSmjestajButton
            // 
            this.odaberiSmjestajButton.Location = new System.Drawing.Point(12, 377);
            this.odaberiSmjestajButton.Name = "odaberiSmjestajButton";
            this.odaberiSmjestajButton.Size = new System.Drawing.Size(103, 23);
            this.odaberiSmjestajButton.TabIndex = 12;
            this.odaberiSmjestajButton.Text = "Rezerviraj smještaj";
            this.odaberiSmjestajButton.UseVisualStyleBackColor = true;
            this.odaberiSmjestajButton.Click += new System.EventHandler(this.odaberiSmjestajButton_Click);
            // 
            // izbrisiSmjestajButton
            // 
            this.izbrisiSmjestajButton.Location = new System.Drawing.Point(571, 163);
            this.izbrisiSmjestajButton.Name = "izbrisiSmjestajButton";
            this.izbrisiSmjestajButton.Size = new System.Drawing.Size(90, 23);
            this.izbrisiSmjestajButton.TabIndex = 11;
            this.izbrisiSmjestajButton.Text = "Izbriši smještaj";
            this.izbrisiSmjestajButton.UseVisualStyleBackColor = true;
            this.izbrisiSmjestajButton.Click += new System.EventHandler(this.izbrisiSmjestajButton_Click);
            // 
            // urediSmjestajButton
            // 
            this.urediSmjestajButton.Location = new System.Drawing.Point(571, 134);
            this.urediSmjestajButton.Name = "urediSmjestajButton";
            this.urediSmjestajButton.Size = new System.Drawing.Size(90, 23);
            this.urediSmjestajButton.TabIndex = 10;
            this.urediSmjestajButton.Text = "Uredi smještaj";
            this.urediSmjestajButton.UseVisualStyleBackColor = true;
            this.urediSmjestajButton.Click += new System.EventHandler(this.urediSmjestajButton_Click);
            // 
            // dodajSmjestajButton
            // 
            this.dodajSmjestajButton.Location = new System.Drawing.Point(571, 105);
            this.dodajSmjestajButton.Name = "dodajSmjestajButton";
            this.dodajSmjestajButton.Size = new System.Drawing.Size(90, 23);
            this.dodajSmjestajButton.TabIndex = 9;
            this.dodajSmjestajButton.Text = "Dodaj smještaj";
            this.dodajSmjestajButton.UseVisualStyleBackColor = true;
            this.dodajSmjestajButton.Click += new System.EventHandler(this.dodajSmjestajButton_Click);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(12, 84);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(72, 13);
            this.label1.TabIndex = 8;
            this.label1.Text = "Lista smješaja";
            // 
            // listaSmjestajaDataGridView
            // 
            this.listaSmjestajaDataGridView.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.listaSmjestajaDataGridView.Location = new System.Drawing.Point(12, 105);
            this.listaSmjestajaDataGridView.Name = "listaSmjestajaDataGridView";
            this.listaSmjestajaDataGridView.RowHeadersWidth = 51;
            this.listaSmjestajaDataGridView.Size = new System.Drawing.Size(553, 242);
            this.listaSmjestajaDataGridView.TabIndex = 7;
            // 
            // panelNavigacijskaTraka
            // 
            this.panelNavigacijskaTraka.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.panelNavigacijskaTraka.Controls.Add(this.pictureBoxReBILLogo);
            this.panelNavigacijskaTraka.Controls.Add(this.labelPozdrav);
            this.panelNavigacijskaTraka.Controls.Add(this.toolStripNavigacijskaTraka);
            this.panelNavigacijskaTraka.Location = new System.Drawing.Point(0, 0);
            this.panelNavigacijskaTraka.Name = "panelNavigacijskaTraka";
            this.panelNavigacijskaTraka.Size = new System.Drawing.Size(694, 70);
            this.panelNavigacijskaTraka.TabIndex = 60;
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
            this.toolStripNavigacijskaTraka.ImageScalingSize = new System.Drawing.Size(20, 20);
            this.toolStripNavigacijskaTraka.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.toolStripButtonZatvori,
            this.toolStripButtonGlavniIzbornik,
            this.toolStripLabelBreadcrumb,
            this.toolStripButtonUpravljanjeProjektima,
            this.toolStripLabelBreadcrumb2,
            this.toolStripLabelLogistika});
            this.toolStripNavigacijskaTraka.Location = new System.Drawing.Point(61, 9);
            this.toolStripNavigacijskaTraka.Name = "toolStripNavigacijskaTraka";
            this.toolStripNavigacijskaTraka.Padding = new System.Windows.Forms.Padding(5);
            this.toolStripNavigacijskaTraka.RenderMode = System.Windows.Forms.ToolStripRenderMode.System;
            this.toolStripNavigacijskaTraka.Size = new System.Drawing.Size(631, 41);
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
            // toolStripLabelLogistika
            // 
            this.toolStripLabelLogistika.Name = "toolStripLabelLogistika";
            this.toolStripLabelLogistika.Size = new System.Drawing.Size(54, 28);
            this.toolStripLabelLogistika.Text = "Logistika";
            // 
            // FormLogistika
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(694, 421);
            this.ControlBox = false;
            this.Controls.Add(this.panelNavigacijskaTraka);
            this.Controls.Add(this.rezervacijeButton);
            this.Controls.Add(this.odaberiSmjestajButton);
            this.Controls.Add(this.izbrisiSmjestajButton);
            this.Controls.Add(this.urediSmjestajButton);
            this.Controls.Add(this.dodajSmjestajButton);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.listaSmjestajaDataGridView);
            this.Name = "FormLogistika";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "Logistika";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormLogistika_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormLogistika_HelpRequested);
            ((System.ComponentModel.ISupportInitialize)(this.listaSmjestajaDataGridView)).EndInit();
            this.panelNavigacijskaTraka.ResumeLayout(false);
            this.panelNavigacijskaTraka.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLogo)).EndInit();
            this.toolStripNavigacijskaTraka.ResumeLayout(false);
            this.toolStripNavigacijskaTraka.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button rezervacijeButton;
        private System.Windows.Forms.Button odaberiSmjestajButton;
        private System.Windows.Forms.Button izbrisiSmjestajButton;
        private System.Windows.Forms.Button urediSmjestajButton;
        private System.Windows.Forms.Button dodajSmjestajButton;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.DataGridView listaSmjestajaDataGridView;
        private System.Windows.Forms.Panel panelNavigacijskaTraka;
        private System.Windows.Forms.PictureBox pictureBoxReBILLogo;
        private System.Windows.Forms.Label labelPozdrav;
        private System.Windows.Forms.ToolStrip toolStripNavigacijskaTraka;
        private System.Windows.Forms.ToolStripButton toolStripButtonZatvori;
        private System.Windows.Forms.ToolStripButton toolStripButtonGlavniIzbornik;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb;
        private System.Windows.Forms.ToolStripLabel toolStripLabelLogistika;
        private System.Windows.Forms.ToolStripButton toolStripButtonUpravljanjeProjektima;
        private System.Windows.Forms.ToolStripLabel toolStripLabelBreadcrumb2;
    }
}