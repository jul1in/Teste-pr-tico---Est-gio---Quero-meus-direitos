namespace questão_2
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            string[] numerosStr = txtEntrada.Text.Split();

            try
            {
                int[] numeros = numerosStr.Select(int.Parse).ToArray();

                Array.Sort(numeros);

                MostrarNumerosOrdenados(numeros);
            }
            catch (FormatException)
            {
                MessageBox.Show("Certifique-se de inserir números válidos separados por espaços.", "Erro", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }
        }
        private void MostrarNumerosOrdenados(int[] numeros)
        {
            lblResultado.Text = "Lista ordenada: " + string.Join(", ", numeros);
        }
    }
}
