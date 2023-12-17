namespace questão_1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (double.TryParse(txt1.Text, out double numero1) &&
              double.TryParse(txt2.Text, out double numero2) &&
              double.TryParse(txt3.Text, out double numero3))
            {
                // Verifique se os números são distintos
                if (numero1 != numero2 && numero2 != numero3 && numero1 != numero3)
                {
                    // Calcule a média dos três números
                    double media = (numero1 + numero2 + numero3) / 3;

                    // Exiba a média no Label
                    lblResultado.Text = $"A média dos três números é: {media}";
                }
                else
                {
                    lblResultado.Text = "Os números devem ser distintos para calcular a média.";
                }
            }
            else
            {
                lblResultado.Text = "Por favor, insira valores numéricos válidos.";
            }
        }
    }
}
