namespace UpravljanjeProjektima
{
    partial class FormDodajDokumentaciju
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
            this.dokumentacijaDodavanjeLabel = new System.Windows.Forms.Label();
            this.dokumentacijaDodavanjeTxtBox = new System.Windows.Forms.TextBox();
            this.rokDodavanjeLabel = new System.Windows.Forms.Label();
            this.rokDodavanjeDTP = new System.Windows.Forms.DateTimePicker();
            this.statusDodavanjeLabel = new System.Windows.Forms.Label();
            this.uIzradiDodavanjeRadioButton = new System.Windows.Forms.RadioButton();
            this.izradenaDodavanjeRadioButton = new System.Windows.Forms.RadioButton();
            this.predanaDodavanjeRadioButton = new System.Windows.Forms.RadioButton();
            this.dodajDokumentacijuButton = new System.Windows.Forms.Button();
            this.odustaniDodavanjeButton = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // dokumentacijaDodavanjeLabel
            // 
            this.dokumentacijaDodavanjeLabel.AutoSize = true;
            this.dokumentacijaDodavanjeLabel.Location = new System.Drawing.Point(46, 34);
            this.dokumentacijaDodavanjeLabel.Name = "dokumentacijaDodavanjeLabel";
            this.dokumentacijaDodavanjeLabel.Size = new System.Drawing.Size(81, 13);
            this.dokumentacijaDodavanjeLabel.TabIndex = 0;
            this.dokumentacijaDodavanjeLabel.Text = "Dokumentacija:";
            // 
            // dokumentacijaDodavanjeTxtBox
            // 
            this.dokumentacijaDodavanjeTxtBox.Location = new System.Drawing.Point(49, 50);
            this.dokumentacijaDodavanjeTxtBox.Name = "dokumentacijaDodavanjeTxtBox";
            this.dokumentacijaDodavanjeTxtBox.Size = new System.Drawing.Size(100, 20);
            this.dokumentacijaDodavanjeTxtBox.TabIndex = 1;
            this.dokumentacijaDodavanjeTxtBox.TextChanged += new System.EventHandler(this.dokumentacijaDodavanjeTxtBox_TextChanged);
            // 
            // rokDodavanjeLabel
            // 
            this.rokDodavanjeLabel.AutoSize = true;
            this.rokDodavanjeLabel.Location = new System.Drawing.Point(46, 104);
            this.rokDodavanjeLabel.Name = "rokDodavanjeLabel";
            this.rokDodavanjeLabel.Size = new System.Drawing.Size(30, 13);
            this.rokDodavanjeLabel.TabIndex = 2;
            this.rokDodavanjeLabel.Text = "Rok:";
            // 
            // rokDodavanjeDTP
            // 
            this.rokDodavanjeDTP.Location = new System.Drawing.Point(49, 120);
            this.rokDodavanjeDTP.Name = "rokDodavanjeDTP";
            this.rokDodavanjeDTP.Size = new System.Drawing.Size(114, 20);
            this.rokDodavanjeDTP.TabIndex = 3;
            // 
            // statusDodavanjeLabel
            // 
            this.statusDodavanjeLabel.AutoSize = true;
            this.statusDodavanjeLabel.Location = new System.Drawing.Point(46, 175);
            this.statusDodavanjeLabel.Name = "statusDodavanjeLabel";
            this.statusDodavanjeLabel.Size = new System.Drawing.Size(40, 13);
            this.statusDodavanjeLabel.TabIndex = 4;
            this.statusDodavanjeLabel.Text = "Status:";
            // 
            // uIzradiDodavanjeRadioButton
            // 
            this.uIzradiDodavanjeRadioButton.AutoSize = true;
            this.uIzradiDodavanjeRadioButton.Location = new System.Drawing.Point(49, 191);
            this.uIzradiDodavanjeRadioButton.Name = "uIzradiDodavanjeRadioButton";
            this.uIzradiDodavanjeRadioButton.Size = new System.Drawing.Size(60, 17);
            this.uIzradiDodavanjeRadioButton.TabIndex = 5;
            this.uIzradiDodavanjeRadioButton.TabStop = true;
            this.uIzradiDodavanjeRadioButton.Text = "U izradi";
            this.uIzradiDodavanjeRadioButton.UseVisualStyleBackColor = true;
            this.uIzradiDodavanjeRadioButton.CheckedChanged += new System.EventHandler(this.uIzradiDodavanjeRadioButton_CheckedChanged);
            // 
            // izradenaDodavanjeRadioButton
            // 
            this.izradenaDodavanjeRadioButton.AutoSize = true;
            this.izradenaDodavanjeRadioButton.Location = new System.Drawing.Point(49, 215);
            this.izradenaDodavanjeRadioButton.Name = "izradenaDodavanjeRadioButton";
            this.izradenaDodavanjeRadioButton.Size = new System.Drawing.Size(67, 17);
            this.izradenaDodavanjeRadioButton.TabIndex = 6;
            this.izradenaDodavanjeRadioButton.TabStop = true;
            this.izradenaDodavanjeRadioButton.Text = "Izrađena";
            this.izradenaDodavanjeRadioButton.UseVisualStyleBackColor = true;
            this.izradenaDodavanjeRadioButton.CheckedChanged += new System.EventHandler(this.izradenaDodavanjeRadioButton_CheckedChanged);
            // 
            // predanaDodavanjeRadioButton
            // 
            this.predanaDodavanjeRadioButton.AutoSize = true;
            this.predanaDodavanjeRadioButton.Location = new System.Drawing.Point(49, 239);
            this.predanaDodavanjeRadioButton.Name = "predanaDodavanjeRadioButton";
            this.predanaDodavanjeRadioButton.Size = new System.Drawing.Size(65, 17);
            this.predanaDodavanjeRadioButton.TabIndex = 7;
            this.predanaDodavanjeRadioButton.TabStop = true;
            this.predanaDodavanjeRadioButton.Text = "Predana";
            this.predanaDodavanjeRadioButton.UseVisualStyleBackColor = true;
            this.predanaDodavanjeRadioButton.CheckedChanged += new System.EventHandler(this.predanaDodavanjeRadioButton_CheckedChanged);
            // 
            // dodajDokumentacijuButton
            // 
            this.dodajDokumentacijuButton.Location = new System.Drawing.Point(49, 333);
            this.dodajDokumentacijuButton.Name = "dodajDokumentacijuButton";
            this.dodajDokumentacijuButton.Size = new System.Drawing.Size(121, 23);
            this.dodajDokumentacijuButton.TabIndex = 8;
            this.dodajDokumentacijuButton.Text = "Dodaj dokumentaciju";
            this.dodajDokumentacijuButton.UseVisualStyleBackColor = true;
            this.dodajDokumentacijuButton.Click += new System.EventHandler(this.dodajRokButton_Click);
            // 
            // odustaniDodavanjeButton
            // 
            this.odustaniDodavanjeButton.Location = new System.Drawing.Point(195, 333);
            this.odustaniDodavanjeButton.Name = "odustaniDodavanjeButton";
            this.odustaniDodavanjeButton.Size = new System.Drawing.Size(75, 23);
            this.odustaniDodavanjeButton.TabIndex = 9;
            this.odustaniDodavanjeButton.Text = "Odustani";
            this.odustaniDodavanjeButton.UseVisualStyleBackColor = true;
            this.odustaniDodavanjeButton.Click += new System.EventHandler(this.odustaniDodavanjeButton_Click);
            // 
            // FormDodajDokumentaciju
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(336, 413);
            this.ControlBox = false;
            this.Controls.Add(this.odustaniDodavanjeButton);
            this.Controls.Add(this.dodajDokumentacijuButton);
            this.Controls.Add(this.predanaDodavanjeRadioButton);
            this.Controls.Add(this.izradenaDodavanjeRadioButton);
            this.Controls.Add(this.uIzradiDodavanjeRadioButton);
            this.Controls.Add(this.statusDodavanjeLabel);
            this.Controls.Add(this.rokDodavanjeDTP);
            this.Controls.Add(this.rokDodavanjeLabel);
            this.Controls.Add(this.dokumentacijaDodavanjeTxtBox);
            this.Controls.Add(this.dokumentacijaDodavanjeLabel);
            this.Name = "FormDodajDokumentaciju";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "Dodavanje roka";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormDodajDokumentaciju_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label dokumentacijaDodavanjeLabel;
        private System.Windows.Forms.TextBox dokumentacijaDodavanjeTxtBox;
        private System.Windows.Forms.Label rokDodavanjeLabel;
        private System.Windows.Forms.DateTimePicker rokDodavanjeDTP;
        private System.Windows.Forms.Label statusDodavanjeLabel;
        private System.Windows.Forms.RadioButton uIzradiDodavanjeRadioButton;
        private System.Windows.Forms.RadioButton izradenaDodavanjeRadioButton;
        private System.Windows.Forms.RadioButton predanaDodavanjeRadioButton;
        private System.Windows.Forms.Button dodajDokumentacijuButton;
        private System.Windows.Forms.Button odustaniDodavanjeButton;
    }
}