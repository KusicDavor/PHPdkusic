namespace UpravljanjeProjektima
{
    partial class FormUrediSmjestaj
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
            this.odustaniUrediSmjestajButton = new System.Windows.Forms.Button();
            this.izmijeniSmjestajButton = new System.Windows.Forms.Button();
            this.valutaUrediNocenjaComboBox = new System.Windows.Forms.ComboBox();
            this.valutaUrediLabel = new System.Windows.Forms.Label();
            this.cijenaUrediNocenjaTxtBox = new System.Windows.Forms.TextBox();
            this.cijenaUrediNocenjaLabel = new System.Windows.Forms.Label();
            this.lokacijaUrediSmjestajaTxtBox = new System.Windows.Forms.TextBox();
            this.lokacijaUrediSmjestajaLabel = new System.Windows.Forms.Label();
            this.nazivUrediSmjestajaTxtBox = new System.Windows.Forms.TextBox();
            this.nazivUrediSmjestajaLabel = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // odustaniUrediSmjestajButton
            // 
            this.odustaniUrediSmjestajButton.Location = new System.Drawing.Point(195, 333);
            this.odustaniUrediSmjestajButton.Name = "odustaniUrediSmjestajButton";
            this.odustaniUrediSmjestajButton.Size = new System.Drawing.Size(75, 23);
            this.odustaniUrediSmjestajButton.TabIndex = 21;
            this.odustaniUrediSmjestajButton.Text = "Odustani";
            this.odustaniUrediSmjestajButton.UseVisualStyleBackColor = true;
            this.odustaniUrediSmjestajButton.Click += new System.EventHandler(this.odustaniUrediSmjestajButton_Click);
            // 
            // izmijeniSmjestajButton
            // 
            this.izmijeniSmjestajButton.Location = new System.Drawing.Point(58, 333);
            this.izmijeniSmjestajButton.Name = "izmijeniSmjestajButton";
            this.izmijeniSmjestajButton.Size = new System.Drawing.Size(94, 23);
            this.izmijeniSmjestajButton.TabIndex = 20;
            this.izmijeniSmjestajButton.Text = "Izmijeni smještaj";
            this.izmijeniSmjestajButton.UseVisualStyleBackColor = true;
            this.izmijeniSmjestajButton.Click += new System.EventHandler(this.izmijeniSmjestajButton_Click);
            // 
            // valutaUrediNocenjaComboBox
            // 
            this.valutaUrediNocenjaComboBox.FormattingEnabled = true;
            this.valutaUrediNocenjaComboBox.Location = new System.Drawing.Point(195, 273);
            this.valutaUrediNocenjaComboBox.Name = "valutaUrediNocenjaComboBox";
            this.valutaUrediNocenjaComboBox.Size = new System.Drawing.Size(50, 21);
            this.valutaUrediNocenjaComboBox.TabIndex = 19;
            // 
            // valutaUrediLabel
            // 
            this.valutaUrediLabel.AutoSize = true;
            this.valutaUrediLabel.Location = new System.Drawing.Point(192, 241);
            this.valutaUrediLabel.Name = "valutaUrediLabel";
            this.valutaUrediLabel.Size = new System.Drawing.Size(40, 13);
            this.valutaUrediLabel.TabIndex = 18;
            this.valutaUrediLabel.Text = "Valuta:";
            // 
            // cijenaUrediNocenjaTxtBox
            // 
            this.cijenaUrediNocenjaTxtBox.Location = new System.Drawing.Point(58, 274);
            this.cijenaUrediNocenjaTxtBox.Name = "cijenaUrediNocenjaTxtBox";
            this.cijenaUrediNocenjaTxtBox.Size = new System.Drawing.Size(100, 20);
            this.cijenaUrediNocenjaTxtBox.TabIndex = 17;
            this.cijenaUrediNocenjaTxtBox.TextChanged += new System.EventHandler(this.cijenaUrediNocenjaTxtBox_TextChanged);
            // 
            // cijenaUrediNocenjaLabel
            // 
            this.cijenaUrediNocenjaLabel.AutoSize = true;
            this.cijenaUrediNocenjaLabel.Location = new System.Drawing.Point(55, 241);
            this.cijenaUrediNocenjaLabel.Name = "cijenaUrediNocenjaLabel";
            this.cijenaUrediNocenjaLabel.Size = new System.Drawing.Size(123, 13);
            this.cijenaUrediNocenjaLabel.TabIndex = 16;
            this.cijenaUrediNocenjaLabel.Text = "Cijena noćenja po osobi:";
            // 
            // lokacijaUrediSmjestajaTxtBox
            // 
            this.lokacijaUrediSmjestajaTxtBox.Location = new System.Drawing.Point(55, 182);
            this.lokacijaUrediSmjestajaTxtBox.Name = "lokacijaUrediSmjestajaTxtBox";
            this.lokacijaUrediSmjestajaTxtBox.Size = new System.Drawing.Size(100, 20);
            this.lokacijaUrediSmjestajaTxtBox.TabIndex = 15;
            this.lokacijaUrediSmjestajaTxtBox.TextChanged += new System.EventHandler(this.lokacijaUrediSmjestajaTxtBox_TextChanged);
            // 
            // lokacijaUrediSmjestajaLabel
            // 
            this.lokacijaUrediSmjestajaLabel.AutoSize = true;
            this.lokacijaUrediSmjestajaLabel.Location = new System.Drawing.Point(52, 151);
            this.lokacijaUrediSmjestajaLabel.Name = "lokacijaUrediSmjestajaLabel";
            this.lokacijaUrediSmjestajaLabel.Size = new System.Drawing.Size(50, 13);
            this.lokacijaUrediSmjestajaLabel.TabIndex = 14;
            this.lokacijaUrediSmjestajaLabel.Text = "Lokacija:";
            // 
            // nazivUrediSmjestajaTxtBox
            // 
            this.nazivUrediSmjestajaTxtBox.Location = new System.Drawing.Point(52, 98);
            this.nazivUrediSmjestajaTxtBox.Name = "nazivUrediSmjestajaTxtBox";
            this.nazivUrediSmjestajaTxtBox.Size = new System.Drawing.Size(100, 20);
            this.nazivUrediSmjestajaTxtBox.TabIndex = 13;
            this.nazivUrediSmjestajaTxtBox.TextChanged += new System.EventHandler(this.nazivUrediSmjestajaTxtBox_TextChanged);
            // 
            // nazivUrediSmjestajaLabel
            // 
            this.nazivUrediSmjestajaLabel.AutoSize = true;
            this.nazivUrediSmjestajaLabel.Location = new System.Drawing.Point(49, 71);
            this.nazivUrediSmjestajaLabel.Name = "nazivUrediSmjestajaLabel";
            this.nazivUrediSmjestajaLabel.Size = new System.Drawing.Size(83, 13);
            this.nazivUrediSmjestajaLabel.TabIndex = 12;
            this.nazivUrediSmjestajaLabel.Text = "Naziv smještaja:";
            // 
            // FormUrediSmjestaj
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(336, 413);
            this.ControlBox = false;
            this.Controls.Add(this.odustaniUrediSmjestajButton);
            this.Controls.Add(this.izmijeniSmjestajButton);
            this.Controls.Add(this.valutaUrediNocenjaComboBox);
            this.Controls.Add(this.valutaUrediLabel);
            this.Controls.Add(this.cijenaUrediNocenjaTxtBox);
            this.Controls.Add(this.cijenaUrediNocenjaLabel);
            this.Controls.Add(this.lokacijaUrediSmjestajaTxtBox);
            this.Controls.Add(this.lokacijaUrediSmjestajaLabel);
            this.Controls.Add(this.nazivUrediSmjestajaTxtBox);
            this.Controls.Add(this.nazivUrediSmjestajaLabel);
            this.Name = "FormUrediSmjestaj";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Izmjena smještaja";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormUrediSmjestaj_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormUrediSmjestaj_HelpRequested);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button odustaniUrediSmjestajButton;
        private System.Windows.Forms.Button izmijeniSmjestajButton;
        private System.Windows.Forms.ComboBox valutaUrediNocenjaComboBox;
        private System.Windows.Forms.Label valutaUrediLabel;
        private System.Windows.Forms.TextBox cijenaUrediNocenjaTxtBox;
        private System.Windows.Forms.Label cijenaUrediNocenjaLabel;
        private System.Windows.Forms.TextBox lokacijaUrediSmjestajaTxtBox;
        private System.Windows.Forms.Label lokacijaUrediSmjestajaLabel;
        private System.Windows.Forms.TextBox nazivUrediSmjestajaTxtBox;
        private System.Windows.Forms.Label nazivUrediSmjestajaLabel;
    }
}