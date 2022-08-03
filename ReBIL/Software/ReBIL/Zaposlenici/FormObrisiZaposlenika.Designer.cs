namespace Zaposlenici
{
    partial class FormObrisiZaposlenika
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
            this.PorukaLabel = new System.Windows.Forms.Label();
            this.DaButton = new System.Windows.Forms.Button();
            this.NeButton = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // PorukaLabel
            // 
            this.PorukaLabel.AutoSize = true;
            this.PorukaLabel.Font = new System.Drawing.Font("Microsoft Sans Serif", 13F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.PorukaLabel.Location = new System.Drawing.Point(21, 18);
            this.PorukaLabel.Name = "PorukaLabel";
            this.PorukaLabel.Size = new System.Drawing.Size(239, 22);
            this.PorukaLabel.TabIndex = 0;
            this.PorukaLabel.Text = "Želite li obrisati zaposlenika?";
            // 
            // DaButton
            // 
            this.DaButton.Location = new System.Drawing.Point(35, 63);
            this.DaButton.Name = "DaButton";
            this.DaButton.Size = new System.Drawing.Size(75, 23);
            this.DaButton.TabIndex = 1;
            this.DaButton.Text = "Da";
            this.DaButton.UseVisualStyleBackColor = true;
            this.DaButton.Click += new System.EventHandler(this.DaButton_Click);
            // 
            // NeButton
            // 
            this.NeButton.Location = new System.Drawing.Point(170, 63);
            this.NeButton.Name = "NeButton";
            this.NeButton.Size = new System.Drawing.Size(75, 23);
            this.NeButton.TabIndex = 2;
            this.NeButton.Text = "Ne";
            this.NeButton.UseVisualStyleBackColor = true;
            this.NeButton.Click += new System.EventHandler(this.NeButton_Click);
            // 
            // FormObrisiZaposlenika
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(279, 98);
            this.ControlBox = false;
            this.Controls.Add(this.NeButton);
            this.Controls.Add(this.DaButton);
            this.Controls.Add(this.PorukaLabel);
            this.Name = "FormObrisiZaposlenika";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "Obrisi zaposlenika";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormObrisiZaposlenika_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormObrisiZaposlenika_HelpRequested);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label PorukaLabel;
        private System.Windows.Forms.Button DaButton;
        private System.Windows.Forms.Button NeButton;
    }
}