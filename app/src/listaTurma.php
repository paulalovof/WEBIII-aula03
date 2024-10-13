<?php
require 'Banco.php';
require 'Turma.php';

$banco = new Banco();
$conexao = $banco->getConexao();

$turma = new Turma($conexao);
$stmt = $turma->read($conexao);
$turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turmas</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Turmas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./form_cadastraTurma.php">Cadastrar</a>
                    </li>
                </ul>

            </div>
    </nav>

    <section class = "col-6 mx-auto">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Sigla</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($turmas as $turma) { ?>
                    <tr>
                        <td><?php echo $turma['id']; ?></td>
                        <td><?php echo $turma['nome']; ?></td>
                        <td><?php echo $turma['ano']; ?></td>
                        <td><?php echo $turma['sigla']; ?></td>
                        <td>
                            <a class="btn btn-secondary" href="form_atualizaTurma.php?id=<?php echo $turma['id']; ?>">Editar</a>
                            <a class="btn btn-secondary" href="deletaTurma.php?id=<?php echo $turma['id']; ?>"
                                onclick="return confirm('Tem certeza que deseja excluir esta turma?');">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </section>
</body>

</html>