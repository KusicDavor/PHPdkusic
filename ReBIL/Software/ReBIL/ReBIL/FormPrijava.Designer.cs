namespace ReBIL
{
    partial class FormPrijava
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
            this.buttonPrijava = new System.Windows.Forms.Button();
            this.textBoxLozinka = new System.Windows.Forms.TextBox();
            this.textBoxKorisnickoIme = new System.Windows.Forms.TextBox();
            this.label2 = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.labelObavijest = new System.Windows.Forms.Label();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            this.SuspendLayout();
            // 
            // buttonPrijava
            // 
            this.buttonPrijava.Location = new System.Drawing.Point(132, 280);
            this.buttonPrijava.Name = "buttonPrijava";
            this.buttonPrijava.Size = new System.Drawing.Size(75, 23);
            this.buttonPrijava.TabIndex = 11;
            this.buttonPrijava.Text = "Prijava";
            this.buttonPrijava.UseVisualStyleBackColor = true;
            this.buttonPrijava.Click += new System.EventHandler(this.buttonPrijava_Click);
            // 
            // textBoxLozinka
            // 
            this.textBoxLozinka.Location = new System.Drawing.Point(108, 232);
            this.textBoxLozinka.Name = "textBoxLozinka";
            this.textBoxLozinka.PasswordChar = '*';
            this.textBoxLozinka.Size = new System.Drawing.Size(184, 20);
            this.textBoxLozinka.TabIndex = 10;
            this.textBoxLozinka.Click += new System.EventHandler(this.textBoxLozinka_Click);
            // 
            // textBoxKorisnickoIme
            // 
            this.textBoxKorisnickoIme.Location = new System.Drawing.Point(108, 200);
            this.textBoxKorisnickoIme.Name = "textBoxKorisnickoIme";
            this.textBoxKorisnickoIme.Size = new System.Drawing.Size(184, 20);
            this.textBoxKorisnickoIme.TabIndex = 9;
            this.textBoxKorisnickoIme.Click += new System.EventHandler(this.textBoxKorisnickoIme_Click);
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Location = new System.Drawing.Point(52, 235);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(47, 13);
            this.label2.TabIndex = 8;
            this.label2.Text = "Lozinka:";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(21, 203);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(78, 13);
            this.label1.TabIndex = 7;
            this.label1.Text = "Korisničko ime:";
            // 
            // pictureBox1
            // 
            this.pictureBox1.Image = global::ReBIL.Properties.Resources.ReBilLogo;
            this.pictureBox1.Location = new System.Drawing.Point(87, 12);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(153, 147);
            this.pictureBox1.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.pictureBox1.TabIndex = 6;
            this.pictureBox1.TabStop = false;
            // 
            // labelObavijest
            // 
            this.labelObavijest.AutoSize = true;
            this.labelObavijest.Location = new System.Drawing.Point(84, 175);
            this.labelObavijest.Name = "labelObavijest";
            this.labelObavijest.Size = new System.Drawing.Size(0, 13);
            this.labelObavijest.TabIndex = 12;
            // 
            // FormPrijava
            // 
            this.AcceptButton = this.buttonPrijava;
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(320, 327);
            this.Controls.Add(this.labelObavijest);
            this.Controls.Add(this.buttonPrijava);
            this.Controls.Add(this.textBoxLozinka);
            this.Controls.Add(this.textBoxKorisnickoIme);
            this.Controls.Add(this.label2);
            this.Controls.Add(this.label1);
            this.Controls.Add(this.pictureBox1);
            this.MaximizeBox = false;
            this.MinimizeBox = false;
            this.Name = "FormPrijava";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "ReBIL - Prijava";
            this.TopMost = true;
            this.HelpRequested += new System.Windows.Forms.HelpEventHandler(this.FormPrijava_HelpRequested);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button buttonPrijava;
        private System.Windows.Forms.TextBox textBoxLozinka;
        private System.Windows.Forms.TextBox textBoxKorisnickoIme;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.Label labelObavijest;
    }
}

