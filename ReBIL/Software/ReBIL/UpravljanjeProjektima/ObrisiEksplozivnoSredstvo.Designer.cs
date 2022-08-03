namespace UpravljanjeProjektima
{
    partial class ObrisiEksplozivnoSredstvo
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
            this.NeButton = new System.Windows.Forms.Button();
            this.DaButton = new System.Windows.Forms.Button();
            this.labelNaslov = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // NeButton
            // 
            this.NeButton.Location = new System.Drawing.Point(171, 62);
            this.NeButton.Name = "NeButton";
            this.NeButton.Size = new System.Drawing.Size(75, 23);
            this.NeButton.TabIndex = 5;
            this.NeButton.Text = "Ne";
            this.NeButton.UseVisualStyleBackColor = true;
            this.NeButton.Click += new System.EventHandler(this.NeButton_Click);
            // 
            // DaButton
            // 
            this.DaButton.Location = new System.Drawing.Point(36, 62);
            this.DaButton.Name = "DaButton";
            this.DaButton.Size = new System.Drawing.Size(75, 23);
            this.DaButton.TabIndex = 4;
            this.DaButton.Text = "Da";
            this.DaButton.UseVisualStyleBackColor = true;
            this.DaButton.Click += new System.EventHandler(this.DaButton_Click);
            // 
            // labelNaslov
            // 
            this.labelNaslov.AutoSize = true;
            this.labelNaslov.Font = new System.Drawing.Font("Microsoft Sans Serif", 13F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.labelNaslov.Location = new System.Drawing.Point(47, 18);
            this.labelNaslov.Name = "labelNaslov";
            this.labelNaslov.Size = new System.Drawing.Size(186, 22);
            this.labelNaslov.TabIndex = 3;
            this.labelNaslov.Text = "Želite li obrisati zapis?";
            // 
            // ObrisiEksplozivnoSredstvo
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(283, 102);
            this.ControlBox = false;
            this.Controls.Add(this.NeButton);
            this.Controls.Add(this.DaButton);
            this.Controls.Add(this.labelNaslov);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.Fixed3D;
            this.Name = "ObrisiEksplozivnoSredstvo";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterParent;
            this.Text = "Obrisi eksplozivno sredstvo";
            this.TopMost = true;
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.ObrisiEksplozivnoSredstvo_HelpRequested);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button NeButton;
        private System.Windows.Forms.Button DaButton;
        private System.Windows.Forms.Label labelNaslov;
    }
}