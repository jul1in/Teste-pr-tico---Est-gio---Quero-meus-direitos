<?php
session_start();
require('conn.php');

function inserirLivros($pdo, $livro, $nome, $ano)
{
    $sql = "INSERT INTO livros (titulo, autor, ano_publicacao) VALUES (:livro, :nome, :ano)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':livro', $livro, PDO::PARAM_STR);
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':ano', $ano, PDO::PARAM_STR);
    return $stmt->execute();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $livro = $_POST['livro'];
    $nome = $_POST['nome'];
    $ano = $_POST['ano'];

    if (inserirLivros($pdo, $livro, $nome, $ano)) {
        $_SESSION['mensagem'] = 'Livro inserido com sucesso!';
    } else {
        $_SESSION['mensagem'] = 'Erro ao inserir o Livro.';
    }
}

function listarLivro($pdo)
{
    $sql = "SELECT * FROM livros";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
$livros = listarLivro($pdo);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste Estágio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="bg-light bg-gradient">
    <h1 class="d-flex justify-content-center p-3">TESTE ESTÁGIO</h1>
    <form method="POST">
        <div class="d-flex justify-content-center gap-5">
            <div>
                <label for="livro">Título do livro:</label>
                <input type="text" class="form-control" id="livro" name="livro" required><br><br>
            </div>
            <div>
                <label for="nome">Nome do autor:</label>
                <input type="text" class="form-control" id="nome" name="nome" required><br><br>
            </div>
            <div>
                <label for="ano">Ano de publicação:</label>
                <input type="number" class="form-control" id="ano" name="ano" required><br><br>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <input type="submit" name="submit" class="btn btn-primary p-2 btn-sm" value="Inserir Livros">
        </div>
    </form>

    <hr>
    <div class="p-5">
    <table class="table table-striped table-hover border border-black">
        <thead>
            <tr>
                <th class="border-3 border-black" scope="col">Id do Livro</th>
                <th class="border-3 border-black" scope="col">Título do Livro</th>
                <th class="border-3 border-black" scope="col">Autor do Título</th>
                <th class="border-3 border-black" scope="col">Ano de Publicação</th>
                <th class="border-3 border-black" scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livros as $livro) : ?>
                <tr>
                    <th scope="row"><?php echo $livro['id']; ?></th>
                    <td class="border border-black"><?php echo $livro['titulo']; ?></td>
                    <td><?php echo $livro['autor']; ?></td>
                    <td class="border border-black"><?php echo $livro['ano_publicacao']; ?></td>
                    <td><a class="btn btn-outline-danger btn-sm" href="delete.php?id=<?php echo $livro['id']; ?>">EXCLUIR</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>