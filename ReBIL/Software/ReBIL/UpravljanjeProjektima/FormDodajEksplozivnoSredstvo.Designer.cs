namespace UpravljanjeProjektima
{
    partial class FormDodajEksplozivnoSredstvo
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
            this.labelIDSredstva = new System.Windows.Forms.Label();
            this.labelOznaka = new System.Windows.Forms.Label();
            this.textBoxOznaka = new System.Windows.Forms.TextBox();
            this.labelKolicina = new System.Windows.Forms.Label();
            this.textBoxKolicina = new System.Windows.Forms.TextBox();
            this.radioButtonAktivno = new System.Windows.Forms.RadioButton();
            this.radioButtonNeaktivno = new System.Windows.Forms.RadioButton();
            this.groupBoxStatus = new System.Windows.Forms.GroupBox();
            this.groupBox1 = new System.Windows.Forms.GroupBox();
            this.radioButtonMES = new System.Windows.Forms.RadioButton();
            this.radioButtonNUS = new System.Windows.Forms.RadioButton();
            this.buttonDodaj = new System.Windows.Forms.Button();
            this.buttonOdustani = new System.Windows.Forms.Button();
            this.labelTezina = new System.Windows.Forms.Label();
            this.textBoxTezina = new System.Windows.Forms.TextBox();
            this.labelIDNazivProjekta = new System.Windows.Forms.Label();
            this.porukaLabel = new System.Windows.Forms.Label();
            this.groupBoxStatus.SuspendLayout();
            this.groupBox1.SuspendLayout();
            this.SuspendLayout();
            // 
            // labelIDSredstva
            // 
            this.labelIDSredstva.AutoSize = true;
            this.labelIDSredstva.Location = new System.Drawing.Point(47, 34);
            this.labelIDSredstva.Name = "labelIDSredstva";
            this.labelIDSredstva.Size = new System.Drawing.Size(43, 13);
            this.labelIDSredstva.TabIndex = 0;
            this.labelIDSredstva.Text = "Projekt:";
            // 
            // labelOznaka
            // 
            this.labelOznaka.AutoSize = true;
            this.labelOznaka.Location = new System.Drawing.Point(47, 69);
            this.labelOznaka.Name = "labelOznaka";
            this.labelOznaka.Size = new System.Drawing.Size(47, 13);
            this.labelOznaka.TabIndex = 0;
            this.labelOznaka.Text = "Oznaka:";
            // 
            // textBoxOznaka
            // 
            this.textBoxOznaka.Location = new System.Drawing.Point(111, 66);
            this.textBoxOznaka.MaxLength = 10;
            this.textBoxOznaka.Name = "textBoxOznaka";
            this.textBoxOznaka.Size = new System.Drawing.Size(121, 20);
            this.textBoxOznaka.TabIndex = 1;
            this.textBoxOznaka.TextChanged += new System.EventHandler(this.textBoxOznaka_TextChanged);
            // 
            // labelKolicina
            // 
            this.labelKolicina.AutoSize = true;
            this.labelKolicina.Location = new System.Drawing.Point(47, 106);
            this.labelKolicina.Name = "labelKolicina";
            this.labelKolicina.Size = new System.Drawing.Size(47, 13);
            this.labelKolicina.TabIndex = 0;
            this.labelKolicina.Text = "Količina:";
            // 
            // textBoxKolicina
            // 
            this.textBoxKolicina.Location = new System.Drawing.Point(111, 103);
            this.textBoxKolicina.Name = "textBoxKolicina";
            this.textBoxKolicina.Size = new System.Drawing.Size(121, 20);
            this.textBoxKolicina.TabIndex = 2;
            this.textBoxKolicina.TextChanged += new System.EventHandler(this.textBoxKolicina_TextChanged);
            // 
            // radioButtonAktivno
            // 
            this.radioButtonAktivno.AutoSize = true;
            this.radioButtonAktivno.Location = new System.Drawing.Point(6, 19);
            this.radioButtonAktivno.Name = "radioButtonAktivno";
            this.radioButtonAktivno.Size = new System.Drawing.Size(61, 17);
            this.radioButtonAktivno.TabIndex = 5;
            this.radioButtonAktivno.TabStop = true;
            this.radioButtonAktivno.Text = "Aktivno";
            this.radioButtonAktivno.UseVisualStyleBackColor = true;
            this.radioButtonAktivno.CheckedChanged += new System.EventHandler(this.radioButtonAktivno_CheckedChanged);
            // 
            // radioButtonNeaktivno
            // 
            this.radioButtonNeaktivno.AutoSize = true;
            this.radioButtonNeaktivno.Location = new System.Drawing.Point(103, 19);
            this.radioButtonNeaktivno.Name = "radioButtonNeaktivno";
            this.radioButtonNeaktivno.Size = new System.Drawing.Size(74, 17);
            this.radioButtonNeaktivno.TabIndex = 6;
            this.radioButtonNeaktivno.TabStop = true;
            this.radioButtonNeaktivno.Text = "Neaktivno";
            this.radioButtonNeaktivno.UseVisualStyleBackColor = true;
            this.radioButtonNeaktivno.CheckedChanged += new System.EventHandler(this.radioButtonNeaktivno_CheckedChanged);
            // 
            // groupBoxStatus
            // 
            this.groupBoxStatus.Controls.Add(this.radioButtonAktivno);
            this.groupBoxStatus.Controls.Add(this.radioButtonNeaktivno);
            this.groupBoxStatus.Location = new System.Drawing.Point(49, 179);
            this.groupBoxStatus.Name = "groupBoxStatus";
            this.groupBoxStatus.Size = new System.Drawing.Size(182, 43);
            this.groupBoxStatus.TabIndex = 4;
            this.groupBoxStatus.TabStop = false;
            this.groupBoxStatus.Text = "Status";
            // 
            // groupBox1
            // 
            this.groupBox1.Controls.Add(this.radioButtonMES);
            this.groupBox1.Controls.Add(this.radioButtonNUS);
            this.groupBox1.Location = new System.Drawing.Point(49, 237);
            this.groupBox1.Name = "groupBox1";
            this.groupBox1.Size = new System.Drawing.Size(182, 43);
            this.groupBox1.TabIndex = 7;
            this.groupBox1.TabStop = false;
            this.groupBox1.Text = "Vrsta";
            // 
            // radioButtonMES
            // 
            this.radioButtonMES.AutoSize = true;
            this.radioButtonMES.Location = new System.Drawing.Point(6, 19);
            this.radioButtonMES.Name = "radioButtonMES";
            this.radioButtonMES.Size = new System.Drawing.Size(48, 17);
            this.radioButtonMES.TabIndex = 8;
            this.radioButtonMES.TabStop = true;
            this.radioButtonMES.Text = "MES";
            this.radioButtonMES.UseVisualStyleBackColor = true;
            this.radioButtonMES.CheckedChanged += new System.EventHandler(this.radioButtonMES_CheckedChanged);
            // 
            // radioButtonNUS
            // 
            this.radioButtonNUS.AutoSize = true;
            this.radioButtonNUS.Location = new System.Drawing.Point(103, 19);
            this.radioButtonNUS.Name = "radioButtonNUS";
            this.radioButtonNUS.Size = new System.Drawing.Size(48, 17);
            this.radioButtonNUS.TabIndex = 9;
            this.radioButtonNUS.TabStop = true;
            this.radioButtonNUS.Text = "NUS";
            this.radioButtonNUS.UseVisualStyleBackColor = true;
            this.radioButtonNUS.CheckedChanged += new System.EventHandler(this.radioButtonNUS_CheckedChanged);
            // 
            // buttonDodaj
            // 
            this.buttonDodaj.Location = new System.Drawing.Point(49, 303);
            this.buttonDodaj.Name = "buttonDodaj";
            this.buttonDodaj.Size = new System.Drawing.Size(75, 23);
            this.buttonDodaj.TabIndex = 10;
            this.buttonDodaj.Text = "Dodaj";
            this.buttonDodaj.UseVisualStyleBackColor = true;
            this.buttonDodaj.Click += new System.EventHandler(this.buttonDodaj_Click);
            // 
            // buttonOdustani
            // 
            this.buttonOdustani.Location = new System.Drawing.Point(157, 303);
            this.buttonOdustani.Name = "buttonOdustani";
            this.buttonOdustani.Size = new System.Drawing.Size(75, 23);
            this.buttonOdustani.TabIndex = 11;
            this.buttonOdustani.Text = "Odustani";
            this.buttonOdustani.UseVisualStyleBackColor = true;
            this.buttonOdustani.Click += new System.EventHandler(this.buttonOdustani_Click);
            // 
            // labelTezina
            // 
            this.labelTezina.AutoSize = true;
            this.labelTezina.Location = new System.Drawing.Point(47, 145);
            this.labelTezina.Name = "labelTezina";
            this.labelTezina.Size = new System.Drawing.Size(42, 13);
            this.labelTezina.TabIndex = 0;
            this.labelTezina.Text = "Težina:";
            // 
            // textBoxTezina
            // 
            this.textBoxTezina.Location = new System.Drawing.Point(111, 142);
            this.textBoxTezina.Name = "textBoxTezina";
            this.textBoxTezina.Size = new System.Drawing.Size(121, 20);
            this.textBoxTezina.TabIndex = 3;
            this.textBoxTezina.TextChanged += new System.EventHandler(this.textBoxTezina_TextChanged);
            // 
            // labelIDNazivProjekta
            // 
            this.labelIDNazivProjekta.AutoSize = true;
            this.labelIDNazivProjekta.Location = new System.Drawing.Point(108, 34);
            this.labelIDNazivProjekta.Name = "labelIDNazivProjekta";
            this.labelIDNazivProjekta.Size = new System.Drawing.Size(18, 13);
            this.labelIDNazivProjekta.TabIndex = 0;
            this.labelIDNazivProjekta.Text = "ID";
            // 
            // porukaLabel
            // 
            this.porukaLabel.AutoSize = true;
            this.porukaLabel.Location = new System.Drawing.Point(90, 337);
            this.porukaLabel.Name = "porukaLabel";
            this.porukaLabel.Size = new System.Drawing.Size(0, 13);
            this.porukaLabel.TabIndex = 12;
            // 
            // FormDodajEksplozivnoSredstvo
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(282, 359);
            this.ControlBox = false;
            this.Controls.Add(this.porukaLabel);
            this.Controls.Add(this.buttonOdustani);
            this.Controls.Add(this.buttonDodaj);
            this.Controls.Add(this.groupBox1);
            this.Controls.Add(this.groupBoxStatus);
            this.Controls.Add(this.textBoxTezina);
            this.Controls.Add(this.textBoxKolicina);
            this.Controls.Add(this.labelTezina);
            this.Controls.Add(this.textBoxOznaka);
            this.Controls.Add(this.labelKolicina);
            this.Controls.Add(this.labelOznaka);
            this.Controls.Add(this.labelIDNazivProjekta);
            this.Controls.Add(this.labelIDSredstva);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.Fixed3D;
            this.Name = "FormDodajEksplozivnoSredstvo";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "Dodaj eksplozivno sredstvo";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormDodajEksplozivnoSredstvo_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormDodajEksplozivnoSredstvo_HelpRequested);
            this.groupBoxStatus.ResumeLayout(false);
            this.groupBoxStatus.PerformLayout();
            this.groupBox1.ResumeLayout(false);
            this.groupBox1.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label labelIDSredstva;
        private System.Windows.Forms.Label labelOznaka;
        private System.Windows.Forms.TextBox textBoxOznaka;
        private System.Windows.Forms.Label labelKolicina;
        private System.Windows.Forms.TextBox textBoxKolicina;
        private System.Windows.Forms.RadioButton radioButtonAktivno;
        private System.Windows.Forms.RadioButton radioButtonNeaktivno;
        private System.Windows.Forms.GroupBox groupBoxStatus;
        private System.Windows.Forms.GroupBox groupBox1;
        private System.Windows.Forms.RadioButton radioButtonMES;
        private System.Windows.Forms.RadioButton radioButtonNUS;
        private System.Windows.Forms.Button buttonDodaj;
        private System.Windows.Forms.Button buttonOdustani;
        private System.Windows.Forms.Label labelTezina;
        private System.Windows.Forms.TextBox textBoxTezina;
        private System.Windows.Forms.Label labelIDNazivProjekta;
        private System.Windows.Forms.Label porukaLabel;
    }
}