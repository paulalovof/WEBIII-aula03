<?php
    require 'Banco.php';
    require 'Turma.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();
    $turma = new Turma($conexao);

    $turma->setId($_GET['id']);
    $smtm = $turma->consultar();
    $turmaSelecionado = $smtm->fetch(PDO::FETCH_ASSOC); //apenas para uma linha

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Edição</title>

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
            <a class="navbar-brand" href="#">Editar Aluno</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
    </nav>

    <div class="col-12 d-flex justify-content-center">
        <form method="POST" action="atualizaTurma.php">
            <input type="hidden" name="id" value="<?php echo $turmaSelecionado['id']?>">
            <br>
            Nome: <input type="text" name="nome" class="form-control" value="<?php echo $turmaSelecionado['nome']?>">
            <br>
            Ano:<input type="number" class="form-control" min="2008" max="2025" name="ano" value="<?php echo $turmaSelecionado['ano']?>">
            <br>
            Sigla: <input type="text" class="form-control" name="sigla" value="<?php echo $turmaSelecionado['sigla']?>">
            <br>
            <input  class="form-control btn btn-primary" type="submit" value="Atualizar">
        </form>
    </div>
    
</body>
</html>