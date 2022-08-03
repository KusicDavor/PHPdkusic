namespace Zaposlenici
{
    partial class FormRegistrirajZaposlenika
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
            this.RegistrirajZaposlenikaButton = new System.Windows.Forms.Button();
            this.dateTimePickerDatum = new System.Windows.Forms.DateTimePicker();
            this.prezimeTextBox = new System.Windows.Forms.TextBox();
            this.imeTextBox = new System.Windows.Forms.TextBox();
            this.oibTextBox = new System.Windows.Forms.TextBox();
            this.DatumLabel = new System.Windows.Forms.Label();
            this.PrezimeLabel = new System.Windows.Forms.Label();
            this.ImeLabel = new System.Windows.Forms.Label();
            this.OIBLabel = new System.Windows.Forms.Label();
            this.IzlazButton = new System.Windows.Forms.Button();
            this.Poruka = new System.Windows.Forms.Label();
            this.pictureBoxReBILLOGO = new System.Windows.Forms.PictureBox();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).BeginInit();
            this.SuspendLayout();
            // 
            // RegistrirajZaposlenikaButton
            // 
            this.RegistrirajZaposlenikaButton.Location = new System.Drawing.Point(12, 237);
            this.RegistrirajZaposlenikaButton.Name = "RegistrirajZaposlenikaButton";
            this.RegistrirajZaposlenikaButton.Size = new System.Drawing.Size(156, 37);
            this.RegistrirajZaposlenikaButton.TabIndex = 17;
            this.RegistrirajZaposlenikaButton.Text = "Registriraj zaposlenika";
            this.RegistrirajZaposlenikaButton.UseVisualStyleBackColor = true;
            this.RegistrirajZaposlenikaButton.Click += new System.EventHandler(this.RegistrirajZaposlenikaButton_Click);
            // 
            // dateTimePickerDatum
            // 
            this.dateTimePickerDatum.Location = new System.Drawing.Point(149, 182);
            this.dateTimePickerDatum.Name = "dateTimePickerDatum";
            this.dateTimePickerDatum.Size = new System.Drawing.Size(189, 20);
            this.dateTimePickerDatum.TabIndex = 16;
            this.dateTimePickerDatum.ValueChanged += new System.EventHandler(this.dateTimePickerDatum_ValueChanged);
            // 
            // prezimeTextBox
            // 
            this.prezimeTextBox.Location = new System.Drawing.Point(149, 146);
            this.prezimeTextBox.Name = "prezimeTextBox";
            this.prezimeTextBox.Size = new System.Drawing.Size(189, 20);
            this.prezimeTextBox.TabIndex = 15;
            this.prezimeTextBox.TextChanged += new System.EventHandler(this.dateTimePickerDatum_ValueChanged);
            // 
            // imeTextBox
            // 
            this.imeTextBox.Location = new System.Drawing.Point(149, 109);
            this.imeTextBox.Name = "imeTextBox";
            this.imeTextBox.Size = new System.Drawing.Size(189, 20);
            this.imeTextBox.TabIndex = 14;
            this.imeTextBox.TextChanged += new System.EventHandler(this.dateTimePickerDatum_ValueChanged);
            // 
            // oibTextBox
            // 
            this.oibTextBox.Location = new System.Drawing.Point(149, 74);
            this.oibTextBox.Name = "oibTextBox";
            this.oibTextBox.Size = new System.Drawing.Size(189, 20);
            this.oibTextBox.TabIndex = 13;
            this.oibTextBox.TextChanged += new System.EventHandler(this.dateTimePickerDatum_ValueChanged);
            // 
            // DatumLabel
            // 
            this.DatumLabel.AutoSize = true;
            this.DatumLabel.Font = new System.Drawing.Font("Microsoft Sans Serif", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.DatumLabel.Location = new System.Drawing.Point(23, 182);
            this.DatumLabel.Name = "DatumLabel";
            this.DatumLabel.Size = new System.Drawing.Size(109, 18);
            this.DatumLabel.TabIndex = 12;
            this.DatumLabel.Text = "Datum rođenja:";
            // 
            // PrezimeLabel
            // 
            this.PrezimeLabel.AutoSize = true;
            this.PrezimeLabel.Font = new System.Drawing.Font("Microsoft Sans Serif", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.PrezimeLabel.Location = new System.Drawing.Point(23, 145);
            this.PrezimeLabel.Name = "PrezimeLabel";
            this.PrezimeLabel.Size = new System.Drawing.Size(67, 18);
            this.PrezimeLabel.TabIndex = 11;
            this.PrezimeLabel.Text = "Prezime:";
            // 
            // ImeLabel
            // 
            this.ImeLabel.AutoSize = true;
            this.ImeLabel.Font = new System.Drawing.Font("Microsoft Sans Serif", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.ImeLabel.Location = new System.Drawing.Point(23, 111);
            this.ImeLabel.Name = "ImeLabel";
            this.ImeLabel.Size = new System.Drawing.Size(36, 18);
            this.ImeLabel.TabIndex = 10;
            this.ImeLabel.Text = "Ime:";
            // 
            // OIBLabel
            // 
            this.OIBLabel.AutoSize = true;
            this.OIBLabel.Font = new System.Drawing.Font("Microsoft Sans Serif", 11.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(238)));
            this.OIBLabel.Location = new System.Drawing.Point(23, 76);
            this.OIBLabel.Name = "OIBLabel";
            this.OIBLabel.Size = new System.Drawing.Size(37, 18);
            this.OIBLabel.TabIndex = 9;
            this.OIBLabel.Text = "OIB:";
            // 
            // IzlazButton
            // 
            this.IzlazButton.Location = new System.Drawing.Point(182, 237);
            this.IzlazButton.Name = "IzlazButton";
            this.IzlazButton.Size = new System.Drawing.Size(156, 37);
            this.IzlazButton.TabIndex = 18;
            this.IzlazButton.Text = "Izlaz";
            this.IzlazButton.UseVisualStyleBackColor = true;
            this.IzlazButton.Click += new System.EventHandler(this.Izlaz_Click);
            // 
            // Poruka
            // 
            this.Poruka.AutoSize = true;
            this.Poruka.Location = new System.Drawing.Point(23, 211);
            this.Poruka.Name = "Poruka";
            this.Poruka.Size = new System.Drawing.Size(0, 13);
            this.Poruka.TabIndex = 19;
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
            // FormRegistrirajZaposlenika
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(345, 278);
            this.ControlBox = false;
            this.Controls.Add(this.pictureBoxReBILLOGO);
            this.Controls.Add(this.Poruka);
            this.Controls.Add(this.IzlazButton);
            this.Controls.Add(this.RegistrirajZaposlenikaButton);
            this.Controls.Add(this.dateTimePickerDatum);
            this.Controls.Add(this.prezimeTextBox);
            this.Controls.Add(this.imeTextBox);
            this.Controls.Add(this.oibTextBox);
            this.Controls.Add(this.DatumLabel);
            this.Controls.Add(this.PrezimeLabel);
            this.Controls.Add(this.ImeLabel);
            this.Controls.Add(this.OIBLabel);
            this.Name = "FormRegistrirajZaposlenika";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "Registriraj zaposlenika";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormRegistrirajZaposlenika_Load);
            this.Click += new System.EventHandler(this.dateTimePickerDatum_ValueChanged);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormRegistrirajZaposlenika_HelpRequested);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxReBILLOGO)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button RegistrirajZaposlenikaButton;
        private System.Windows.Forms.DateTimePicker dateTimePickerDatum;
        private System.Windows.Forms.TextBox prezimeTextBox;
        private System.Windows.Forms.TextBox imeTextBox;
        private System.Windows.Forms.TextBox oibTextBox;
        private System.Windows.Forms.Label DatumLabel;
        private System.Windows.Forms.Label PrezimeLabel;
        private System.Windows.Forms.Label ImeLabel;
        private System.Windows.Forms.Label OIBLabel;
        private System.Windows.Forms.Button IzlazButton;
        private System.Windows.Forms.Label Poruka;
        private System.Windows.Forms.PictureBox pictureBoxReBILLOGO;
    }
}