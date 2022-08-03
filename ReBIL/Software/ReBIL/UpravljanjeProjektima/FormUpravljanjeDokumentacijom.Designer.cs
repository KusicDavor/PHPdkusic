namespace UpravljanjeProjektima
{
    partial class FormUpravljanjeDokumentacijom
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
            this.listaRokovaLabel = new System.Windows.Forms.Label();
            this.dgvListaRokova = new System.Windows.Forms.DataGridView();
            this.dodajRokButton = new System.Windows.Forms.Button();
            this.urediRokButton = new System.Windows.Forms.Button();
            this.izbrisiRokButton = new System.Windows.Forms.Button();
            this.zatvoriButton = new System.Windows.Forms.Button();
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaRokova)).BeginInit();
            this.SuspendLayout();
            // 
            // listaRokovaLabel
            // 
            this.listaRokovaLabel.AutoSize = true;
            this.listaRokovaLabel.Location = new System.Drawing.Point(30, 28);
            this.listaRokovaLabel.Name = "listaRokovaLabel";
            this.listaRokovaLabel.Size = new System.Drawing.Size(68, 13);
            this.listaRokovaLabel.TabIndex = 0;
            this.listaRokovaLabel.Text = "Lista rokova:";
            // 
            // dgvListaRokova
            // 
            this.dgvListaRokova.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvListaRokova.Location = new System.Drawing.Point(33, 54);
            this.dgvListaRokova.Name = "dgvListaRokova";
            this.dgvListaRokova.Size = new System.Drawing.Size(561, 187);
            this.dgvListaRokova.TabIndex = 1;
            this.dgvListaRokova.SelectionChanged += new System.EventHandler(this.dgvListaRokova_SelectionChanged);
            // 
            // dodajRokButton
            // 
            this.dodajRokButton.Location = new System.Drawing.Point(33, 261);
            this.dodajRokButton.Name = "dodajRokButton";
            this.dodajRokButton.Size = new System.Drawing.Size(116, 23);
            this.dodajRokButton.TabIndex = 2;
            this.dodajRokButton.Text = "Dodaj dokumentaciju";
            this.dodajRokButton.UseVisualStyleBackColor = true;
            this.dodajRokButton.Click += new System.EventHandler(this.dodajRokButton_Click);
            // 
            // urediRokButton
            // 
            this.urediRokButton.Location = new System.Drawing.Point(179, 261);
            this.urediRokButton.Name = "urediRokButton";
            this.urediRokButton.Size = new System.Drawing.Size(116, 23);
            this.urediRokButton.TabIndex = 3;
            this.urediRokButton.Text = "Uredi dokumentaciju";
            this.urediRokButton.UseVisualStyleBackColor = true;
            this.urediRokButton.Click += new System.EventHandler(this.urediRokButton_Click);
            // 
            // izbrisiRokButton
            // 
            this.izbrisiRokButton.Location = new System.Drawing.Point(326, 261);
            this.izbrisiRokButton.Name = "izbrisiRokButton";
            this.izbrisiRokButton.Size = new System.Drawing.Size(116, 23);
            this.izbrisiRokButton.TabIndex = 4;
            this.izbrisiRokButton.Text = "Izbriši dokumentaciju";
            this.izbrisiRokButton.UseVisualStyleBackColor = true;
            this.izbrisiRokButton.Click += new System.EventHandler(this.izbrisiRokButton_Click);
            // 
            // zatvoriButton
            // 
            this.zatvoriButton.Location = new System.Drawing.Point(519, 261);
            this.zatvoriButton.Name = "zatvoriButton";
            this.zatvoriButton.Size = new System.Drawing.Size(75, 23);
            this.zatvoriButton.TabIndex = 5;
            this.zatvoriButton.Text = "Zatvori";
            this.zatvoriButton.UseVisualStyleBackColor = true;
            this.zatvoriButton.Click += new System.EventHandler(this.zatvoriButton_Click);
            // 
            // FormUpravljanjeDokumentacijom
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(634, 319);
            this.ControlBox = false;
            this.Controls.Add(this.zatvoriButton);
            this.Controls.Add(this.izbrisiRokButton);
            this.Controls.Add(this.urediRokButton);
            this.Controls.Add(this.dodajRokButton);
            this.Controls.Add(this.dgvListaRokova);
            this.Controls.Add(this.listaRokovaLabel);
            this.Name = "FormUpravljanjeDokumentacijom";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "Evidencija dokumentacije";
            this.TopMost = true;
            this.Load += new System.EventHandler(this.FormUpravljanjeRokovima_Load);
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormUpravljanjeDokumentacijom_HelpRequested);
            ((System.ComponentModel.ISupportInitialize)(this.dgvListaRokova)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label listaRokovaLabel;
        private System.Windows.Forms.DataGridView dgvListaRokova;
        private System.Windows.Forms.Button dodajRokButton;
        private System.Windows.Forms.Button urediRokButton;
        private System.Windows.Forms.Button izbrisiRokButton;
        private System.Windows.Forms.Button zatvoriButton;
    }
}