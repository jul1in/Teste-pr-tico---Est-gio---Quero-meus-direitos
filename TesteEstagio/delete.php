<?php
require('conn.php');
$id = $_GET["id"];

function excluirLivro($pdo, $id)
{
    $sql = "DELETE FROM livros WHERE id = $id";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute();
}

$result = "";

if (excluirLivro($pdo, $id)) {
    $result = "Livro excluído com sucesso!<br>";
} else {
    $result = 'Erro ao excluir o Livro!';
}
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


    <div class="d-flex justify-content-center">
        <div class="d-flex-column justify-content-center aling-items-center" style="justify-content: center; align-items: center;">
            <p><?php echo $result ?></p>
            <a class="btn btn-outline-success btn-sm" href="index.php">GERENCIAR CADASTRO</a>
        </div>
    </div>


    <hr>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>