namespace UpravljanjeProjektima
{
    partial class FormDodajVozilo
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
            this.dataGridViewVozila = new System.Windows.Forms.DataGridView();
            this.buttonDodaj = new System.Windows.Forms.Button();
            this.buttonOdustani = new System.Windows.Forms.Button();
            this.groupBoxVozila = new System.Windows.Forms.GroupBox();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridViewVozila)).BeginInit();
            this.groupBoxVozila.SuspendLayout();
            this.SuspendLayout();
            // 
            // dataGridViewVozila
            // 
            this.dataGridViewVozila.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridViewVozila.Location = new System.Drawing.Point(8, 16);
            this.dataGridViewVozila.Name = "dataGridViewVozila";
            this.dataGridViewVozila.Size = new System.Drawing.Size(690, 236);
            this.dataGridViewVozila.TabIndex = 0;
            this.dataGridViewVozila.SelectionChanged += new System.EventHandler(this.dataGridViewVozila_SelectionChanged);
            // 
            // buttonDodaj
            // 
            this.buttonDodaj.Location = new System.Drawing.Point(717, 70);
            this.buttonDodaj.Name = "buttonDodaj";
            this.buttonDodaj.Size = new System.Drawing.Size(75, 23);
            this.buttonDodaj.TabIndex = 1;
            this.buttonDodaj.Text = "Dodaj";
            this.buttonDodaj.UseVisualStyleBackColor = true;
            this.buttonDodaj.Click += new System.EventHandler(this.buttonDodaj_Click);
            // 
            // buttonOdustani
            // 
            this.buttonOdustani.Location = new System.Drawing.Point(717, 148);
            this.buttonOdustani.Name = "buttonOdustani";
            this.buttonOdustani.Size = new System.Drawing.Size(75, 23);
            this.buttonOdustani.TabIndex = 2;
            this.buttonOdustani.Text = "Odustani";
            this.buttonOdustani.UseVisualStyleBackColor = true;
            this.buttonOdustani.Click += new System.EventHandler(this.buttonOdustani_Click);
            // 
            // groupBoxVozila
            // 
            this.groupBoxVozila.Controls.Add(this.buttonDodaj);
            this.groupBoxVozila.Controls.Add(this.buttonOdustani);
            this.groupBoxVozila.Controls.Add(this.dataGridViewVozila);
            this.groupBoxVozila.Location = new System.Drawing.Point(13, 13);
            this.groupBoxVozila.Name = "groupBoxVozila";
            this.groupBoxVozila.Size = new System.Drawing.Size(812, 261);
            this.groupBoxVozila.TabIndex = 3;
            this.groupBoxVozila.TabStop = false;
            this.groupBoxVozila.Text = "Vozila koja nisu dodana na ovaj projekt:";
            this.groupBoxVozila.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.groupBoxVozila_HelpRequested);
            // 
            // FormDodajVozilo
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(837, 286);
            this.ControlBox = false;
            this.Controls.Add(this.groupBoxVozila);
            this.Name = "FormDodajVozilo";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "Dodaj vozilo";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormDodajVozilo_Load);
            ((System.ComponentModel.ISupportInitialize)(this.dataGridViewVozila)).EndInit();
            this.groupBoxVozila.ResumeLayout(false);
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.DataGridView dataGridViewVozila;
        private System.Windows.Forms.Button buttonDodaj;
        private System.Windows.Forms.Button buttonOdustani;
        private System.Windows.Forms.GroupBox groupBoxVozila;
    }
}