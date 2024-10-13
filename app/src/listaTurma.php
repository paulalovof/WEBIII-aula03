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
</head>

<body>
    <section>
        <h2>Todas as turmas</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ano</th>
                <th>Sigla</th>
            </tr>
            <?php foreach ($turmas as $turma) { ?>
                <tr>
                    <td><?php echo $turma['id']; ?></td>
                    <td><?php echo $turma['nome']; ?></td>
                    <td><?php echo $turma['ano']; ?></td>
                    <td><?php echo $turma['sigla']; ?></td>
                    <td>
                        <a href="form_atualizaTurma.php?id=<?php echo $turma['id']; ?>">Editar</a>
                        <a href="deletaTurma.php?id=<?php echo $turma['id']; ?>"
                            onclick="return confirm('Tem certeza que deseja excluir esta turma?');">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <a href="form_cadastraTurma.php">Cadastrar nova turma</a>
    </section>

</body>

</html>