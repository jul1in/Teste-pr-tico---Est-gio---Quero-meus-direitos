namespace questao_3
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void Btn1_Click(object sender, EventArgs e)
        {
            string texto = textBox1.Text;

            int contadorCaracteres = texto.Length;

            lblResultado.Text = $"Número de caracteres: {contadorCaracteres}";
        }
    }
}
