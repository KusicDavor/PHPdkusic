namespace UpravljanjeProjektima
{
    partial class FormDodajNoviProjekt
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
            this.NazivProjektaLabel = new System.Windows.Forms.Label();
            this.VoditeljRadilištaLabel = new System.Windows.Forms.Label();
            this.NazivProjektaTxtBox = new System.Windows.Forms.TextBox();
            this.DodajProjektButton = new System.Windows.Forms.Button();
            this.OdustaniProjektButton = new System.Windows.Forms.Button();
            this.VoditeljCombo = new System.Windows.Forms.ComboBox();
            this.PorukaLabel = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // NazivProjektaLabel
            // 
            this.NazivProjektaLabel.AutoSize = true;
            this.NazivProjektaLabel.Location = new System.Drawing.Point(12, 15);
            this.NazivProjektaLabel.Name = "NazivProjektaLabel";
            this.NazivProjektaLabel.Size = new System.Drawing.Size(68, 13);
            this.NazivProjektaLabel.TabIndex = 0;
            this.NazivProjektaLabel.Text = "Ime projekta:";
            // 
            // VoditeljRadilištaLabel
            // 
            this.VoditeljRadilištaLabel.AutoSize = true;
            this.VoditeljRadilištaLabel.Location = new System.Drawing.Point(12, 54);
            this.VoditeljRadilištaLabel.Name = "VoditeljRadilištaLabel";
            this.VoditeljRadilištaLabel.Size = new System.Drawing.Size(82, 13);
            this.VoditeljRadilištaLabel.TabIndex = 1;
            this.VoditeljRadilištaLabel.Text = "Voditelj radilišta:";
            // 
            // NazivProjektaTxtBox
            // 
            this.NazivProjektaTxtBox.Location = new System.Drawing.Point(106, 12);
            this.NazivProjektaTxtBox.Name = "NazivProjektaTxtBox";
            this.NazivProjektaTxtBox.Size = new System.Drawing.Size(292, 20);
            this.NazivProjektaTxtBox.TabIndex = 2;
            this.NazivProjektaTxtBox.TextChanged += new System.EventHandler(this.NazivProjektaTxtBox_TextChanged);
            // 
            // DodajProjektButton
            // 
            this.DodajProjektButton.Location = new System.Drawing.Point(106, 104);
            this.DodajProjektButton.Name = "DodajProjektButton";
            this.DodajProjektButton.Size = new System.Drawing.Size(75, 23);
            this.DodajProjektButton.TabIndex = 3;
            this.DodajProjektButton.Text = "Dodaj";
            this.DodajProjektButton.UseVisualStyleBackColor = true;
            this.DodajProjektButton.Click += new System.EventHandler(this.DodajProjektButton_Click);
            // 
            // OdustaniProjektButton
            // 
            this.OdustaniProjektButton.Location = new System.Drawing.Point(257, 104);
            this.OdustaniProjektButton.Name = "OdustaniProjektButton";
            this.OdustaniProjektButton.Size = new System.Drawing.Size(75, 23);
            this.OdustaniProjektButton.TabIndex = 4;
            this.OdustaniProjektButton.Text = "Odustani";
            this.OdustaniProjektButton.UseVisualStyleBackColor = true;
            this.OdustaniProjektButton.Click += new System.EventHandler(this.OdustaniProjektButton_Click);
            // 
            // VoditeljCombo
            // 
            this.VoditeljCombo.FormattingEnabled = true;
            this.VoditeljCombo.Location = new System.Drawing.Point(106, 51);
            this.VoditeljCombo.Name = "VoditeljCombo";
            this.VoditeljCombo.Size = new System.Drawing.Size(292, 21);
            this.VoditeljCombo.TabIndex = 5;
            this.VoditeljCombo.SelectedIndexChanged += new System.EventHandler(this.NazivProjektaTxtBox_TextChanged);
            this.VoditeljCombo.Click += new System.EventHandler(this.VoditeljCombo_Click);
            // 
            // PorukaLabel
            // 
            this.PorukaLabel.AutoSize = true;
            this.PorukaLabel.Location = new System.Drawing.Point(203, 79);
            this.PorukaLabel.Name = "PorukaLabel";
            this.PorukaLabel.Size = new System.Drawing.Size(0, 13);
            this.PorukaLabel.TabIndex = 6;
            // 
            // FormDodajNoviProjekt
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(413, 136);
            this.ControlBox = false;
            this.Controls.Add(this.PorukaLabel);
            this.Controls.Add(this.VoditeljCombo);
            this.Controls.Add(this.OdustaniProjektButton);
            this.Controls.Add(this.DodajProjektButton);
            this.Controls.Add(this.NazivProjektaTxtBox);
            this.Controls.Add(this.VoditeljRadilištaLabel);
            this.Controls.Add(this.NazivProjektaLabel);
            this.Name = "FormDodajNoviProjekt";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "Dodaj novi projekt";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormDodajNoviProjekt_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormDodajNoviProjekt_HelpRequested);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label NazivProjektaLabel;
        private System.Windows.Forms.Label VoditeljRadilištaLabel;
        private System.Windows.Forms.TextBox NazivProjektaTxtBox;
        private System.Windows.Forms.Button DodajProjektButton;
        private System.Windows.Forms.Button OdustaniProjektButton;
        private System.Windows.Forms.ComboBox VoditeljCombo;
        private System.Windows.Forms.Label PorukaLabel;
    }
}