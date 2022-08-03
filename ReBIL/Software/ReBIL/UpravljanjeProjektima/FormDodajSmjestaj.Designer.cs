namespace UpravljanjeProjektima
{
    partial class FormDodajSmjestaj
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
            this.nazivSmjestajaLabel = new System.Windows.Forms.Label();
            this.nazivSmjestajaTxtBox = new System.Windows.Forms.TextBox();
            this.lokacijaSmjestajaLabel = new System.Windows.Forms.Label();
            this.lokacijaSmjestajaTxtBox = new System.Windows.Forms.TextBox();
            this.cijenaNocenjaLabel = new System.Windows.Forms.Label();
            this.cijenaNocenjaTxtBox = new System.Windows.Forms.TextBox();
            this.valutaLabel = new System.Windows.Forms.Label();
            this.valutaNocenjaComboBox = new System.Windows.Forms.ComboBox();
            this.dodajSmjestajButton = new System.Windows.Forms.Button();
            this.odustaniSmjestajButton = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // nazivSmjestajaLabel
            // 
            this.nazivSmjestajaLabel.AutoSize = true;
            this.nazivSmjestajaLabel.Location = new System.Drawing.Point(18, 19);
            this.nazivSmjestajaLabel.Name = "nazivSmjestajaLabel";
            this.nazivSmjestajaLabel.Size = new System.Drawing.Size(83, 13);
            this.nazivSmjestajaLabel.TabIndex = 1;
            this.nazivSmjestajaLabel.Text = "Naziv smještaja:";
            // 
            // nazivSmjestajaTxtBox
            // 
            this.nazivSmjestajaTxtBox.Location = new System.Drawing.Point(21, 46);
            this.nazivSmjestajaTxtBox.Name = "nazivSmjestajaTxtBox";
            this.nazivSmjestajaTxtBox.Size = new System.Drawing.Size(100, 20);
            this.nazivSmjestajaTxtBox.TabIndex = 2;
            this.nazivSmjestajaTxtBox.TextChanged += new System.EventHandler(this.nazivSmjestajaTxtBox_TextChanged);
            // 
            // lokacijaSmjestajaLabel
            // 
            this.lokacijaSmjestajaLabel.AutoSize = true;
            this.lokacijaSmjestajaLabel.Location = new System.Drawing.Point(21, 84);
            this.lokacijaSmjestajaLabel.Name = "lokacijaSmjestajaLabel";
            this.lokacijaSmjestajaLabel.Size = new System.Drawing.Size(50, 13);
            this.lokacijaSmjestajaLabel.TabIndex = 3;
            this.lokacijaSmjestajaLabel.Text = "Lokacija:";
            // 
            // lokacijaSmjestajaTxtBox
            // 
            this.lokacijaSmjestajaTxtBox.Location = new System.Drawing.Point(24, 115);
            this.lokacijaSmjestajaTxtBox.Name = "lokacijaSmjestajaTxtBox";
            this.lokacijaSmjestajaTxtBox.Size = new System.Drawing.Size(100, 20);
            this.lokacijaSmjestajaTxtBox.TabIndex = 4;
            this.lokacijaSmjestajaTxtBox.TextChanged += new System.EventHandler(this.lokacijaSmjestajaTxtBox_TextChanged);
            // 
            // cijenaNocenjaLabel
            // 
            this.cijenaNocenjaLabel.AutoSize = true;
            this.cijenaNocenjaLabel.Location = new System.Drawing.Point(24, 174);
            this.cijenaNocenjaLabel.Name = "cijenaNocenjaLabel";
            this.cijenaNocenjaLabel.Size = new System.Drawing.Size(123, 13);
            this.cijenaNocenjaLabel.TabIndex = 5;
            this.cijenaNocenjaLabel.Text = "Cijena noćenja po osobi:";
            // 
            // cijenaNocenjaTxtBox
            // 
            this.cijenaNocenjaTxtBox.Location = new System.Drawing.Point(27, 206);
            this.cijenaNocenjaTxtBox.Name = "cijenaNocenjaTxtBox";
            this.cijenaNocenjaTxtBox.Size = new System.Drawing.Size(100, 20);
            this.cijenaNocenjaTxtBox.TabIndex = 6;
            this.cijenaNocenjaTxtBox.TextChanged += new System.EventHandler(this.cijenaNocenjaTxtBox_TextChanged);
            // 
            // valutaLabel
            // 
            this.valutaLabel.AutoSize = true;
            this.valutaLabel.Location = new System.Drawing.Point(161, 174);
            this.valutaLabel.Name = "valutaLabel";
            this.valutaLabel.Size = new System.Drawing.Size(40, 13);
            this.valutaLabel.TabIndex = 7;
            this.valutaLabel.Text = "Valuta:";
            // 
            // valutaNocenjaComboBox
            // 
            this.valutaNocenjaComboBox.FormattingEnabled = true;
            this.valutaNocenjaComboBox.Location = new System.Drawing.Point(164, 206);
            this.valutaNocenjaComboBox.Name = "valutaNocenjaComboBox";
            this.valutaNocenjaComboBox.Size = new System.Drawing.Size(50, 21);
            this.valutaNocenjaComboBox.TabIndex = 8;
            // 
            // dodajSmjestajButton
            // 
            this.dodajSmjestajButton.Location = new System.Drawing.Point(27, 266);
            this.dodajSmjestajButton.Name = "dodajSmjestajButton";
            this.dodajSmjestajButton.Size = new System.Drawing.Size(94, 23);
            this.dodajSmjestajButton.TabIndex = 9;
            this.dodajSmjestajButton.Text = "Dodaj smještaj";
            this.dodajSmjestajButton.UseVisualStyleBackColor = true;
            this.dodajSmjestajButton.Click += new System.EventHandler(this.dodajSmjestajButton_Click);
            // 
            // odustaniSmjestajButton
            // 
            this.odustaniSmjestajButton.Location = new System.Drawing.Point(164, 266);
            this.odustaniSmjestajButton.Name = "odustaniSmjestajButton";
            this.odustaniSmjestajButton.Size = new System.Drawing.Size(75, 23);
            this.odustaniSmjestajButton.TabIndex = 10;
            this.odustaniSmjestajButton.Text = "Odustani";
            this.odustaniSmjestajButton.UseVisualStyleBackColor = true;
            this.odustaniSmjestajButton.Click += new System.EventHandler(this.odustaniSmjestajButton_Click);
            // 
            // FormDodajSmjestaj
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(292, 331);
            this.ControlBox = false;
            this.Controls.Add(this.odustaniSmjestajButton);
            this.Controls.Add(this.dodajSmjestajButton);
            this.Controls.Add(this.valutaNocenjaComboBox);
            this.Controls.Add(this.valutaLabel);
            this.Controls.Add(this.cijenaNocenjaTxtBox);
            this.Controls.Add(this.cijenaNocenjaLabel);
            this.Controls.Add(this.lokacijaSmjestajaTxtBox);
            this.Controls.Add(this.lokacijaSmjestajaLabel);
            this.Controls.Add(this.nazivSmjestajaTxtBox);
            this.Controls.Add(this.nazivSmjestajaLabel);
            this.Name = "FormDodajSmjestaj";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "Dodavanje novog smještaja";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormDodajSmjestaj_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormDodajSmjestaj_HelpRequested);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion
        private System.Windows.Forms.Label nazivSmjestajaLabel;
        private System.Windows.Forms.TextBox nazivSmjestajaTxtBox;
        private System.Windows.Forms.Label lokacijaSmjestajaLabel;
        private System.Windows.Forms.TextBox lokacijaSmjestajaTxtBox;
        private System.Windows.Forms.Label cijenaNocenjaLabel;
        private System.Windows.Forms.TextBox cijenaNocenjaTxtBox;
        private System.Windows.Forms.Label valutaLabel;
        private System.Windows.Forms.ComboBox valutaNocenjaComboBox;
        private System.Windows.Forms.Button dodajSmjestajButton;
        private System.Windows.Forms.Button odustaniSmjestajButton;
    }
}