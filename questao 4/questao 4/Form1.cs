using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace questao_4
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (int.TryParse(textBox1.Text, out int valor))
            {
                int notas100 = valor / 100;
                valor %= 100;

                int notas50 = valor / 50;
                valor %= 50;

                int notas20 = valor / 20;
                valor %= 20;

                int notas10 = valor / 10;

                lblResultado.Text = $"Notas de $100: {notas100}\n" +
                                   $"Notas de $50: {notas50}\n" +
                                   $"Notas de $20: {notas20}\n" +
                                   $"Notas de $10: {notas10}";
            }
            else
            {
                MessageBox.Show("Por favor, insira um valor numérico válido.", "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
    }
}
