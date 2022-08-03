namespace UpravljanjeProjektima
{
    partial class FormRezervacije
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
            this.listaRezervacijaLabel = new System.Windows.Forms.Label();
            this.dgvListaRezervacija = new System.Windows.Forms.DataGridView();
            this.izbrisiRezervacijuButton = new System.Windows.Forms.Button();
            this.zatvoriButton = new System.Windows.Forms.Button();
            this.prikaziRezervacijuButton = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaRezervacija)).BeginInit();
            this.SuspendLayout();
            // 
            // listaRezervacijaLabel
            // 
            this.listaRezervacijaLabel.AutoSize = true;
            this.listaRezervacijaLabel.Location = new System.Drawing.Point(30, 28);
            this.listaRezervacijaLabel.Name = "listaRezervacijaLabel";
            this.listaRezervacijaLabel.Size = new System.Drawing.Size(86, 13);
            this.listaRezervacijaLabel.TabIndex = 0;
            this.listaRezervacijaLabel.Text = "Lista rezervacija:";
            // 
            // dgvListaRezervacija
            // 
            this.dgvListaRezervacija.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvListaRezervacija.Location = new System.Drawing.Point(33, 54);
            this.dgvListaRezervacija.Name = "dgvListaRezervacija";
            this.dgvListaRezervacija.Size = new System.Drawing.Size(561, 187);
            this.dgvListaRezervacija.TabIndex = 1;
            // 
            // izbrisiRezervacijuButton
            // 
            this.izbrisiRezervacijuButton.Location = new System.Drawing.Point(182, 260);
            this.izbrisiRezervacijuButton.Name = "izbrisiRezervacijuButton";
            this.izbrisiRezervacijuButton.Size = new System.Drawing.Size(116, 23);
            this.izbrisiRezervacijuButton.TabIndex = 3;
            this.izbrisiRezervacijuButton.Text = "Izbriši rezervaciju";
            this.izbrisiRezervacijuButton.UseVisualStyleBackColor = true;
            this.izbrisiRezervacijuButton.Click += new System.EventHandler(this.izbrisiRezervacijuButton_Click);
            // 
            // zatvoriButton
            // 
            this.zatvoriButton.Location = new System.Drawing.Point(520, 260);
            this.zatvoriButton.Name = "zatvoriButton";
            this.zatvoriButton.Size = new System.Drawing.Size(75, 23);
            this.zatvoriButton.TabIndex = 4;
            this.zatvoriButton.Text = "Zatvori";
            this.zatvoriButton.UseVisualStyleBackColor = true;
            this.zatvoriButton.Click += new System.EventHandler(this.zatvoriButton_Click);
            // 
            // prikaziRezervacijuButton
            // 
            this.prikaziRezervacijuButton.Location = new System.Drawing.Point(33, 260);
            this.prikaziRezervacijuButton.Name = "prikaziRezervacijuButton";
            this.prikaziRezervacijuButton.Size = new System.Drawing.Size(111, 23);
            this.prikaziRezervacijuButton.TabIndex = 5;
            this.prikaziRezervacijuButton.Text = "Prikaži rezervaciju";
            this.prikaziRezervacijuButton.UseVisualStyleBackColor = true;
            this.prikaziRezervacijuButton.Click += new System.EventHandler(this.prikaziRezervacijuButton_Click);
            // 
            // FormRezervacije
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(660, 319);
            this.ControlBox = false;
            this.Controls.Add(this.prikaziRezervacijuButton);
            this.Controls.Add(this.zatvoriButton);
            this.Controls.Add(this.izbrisiRezervacijuButton);
            this.Controls.Add(this.dgvListaRezervacija);
            this.Controls.Add(this.listaRezervacijaLabel);
            this.Name = "FormRezervacije";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "Rezervacije";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormRezervacije_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormRezervacije_HelpRequested);
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaRezervacija)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label listaRezervacijaLabel;
        private System.Windows.Forms.DataGridView dgvListaRezervacija;
        private System.Windows.Forms.Button izbrisiRezervacijuButton;
        private System.Windows.Forms.Button zatvoriButton;
        private System.Windows.Forms.Button prikaziRezervacijuButton;
    }
}