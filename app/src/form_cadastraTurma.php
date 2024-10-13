<?php
require 'Banco.php';
require 'Turma.php';

$banco = new Banco();
$conexao = $banco->getConexao();
$turma = new Turma($conexao);

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Criação</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./listaTurma.php">voltar</a>
                    </li>
                </ul>

            </div>
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Cadastrar novo Aluno</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
    </nav>

    <div class="col-12 d-flex justify-content-center">
        <form method="POST" action="cadastraTurma.php">
            <p>Nome: <input type="text" class="form-control" name="nome" required> </p>
            <p>Ano: <input type="number" class="form-control" min="2008" max="2025" name="ano" required> </p>
            <p>Sigla: <input type="text" class="form-control" name="sigla" required> </p>
            <input class="form-control btn btn-primary" type="submit" value="Cadastrar">
        </form>
    </div>
    
</body>

</html>