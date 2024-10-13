<?php
    require 'Banco.php';
    require 'Aluno.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();

    $aluno = new Aluno($conexao);
    $stmt = $aluno->read($conexao);
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>
</head>

<body>
    <section>
        <h2>Todos os alunos</h2>

        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Turma</th>
            </tr>
            <?php foreach ($alunos as $aluno) { ?>
                <tr>
                    <td><?php echo $aluno['id']; ?></td>
                    <td><?php echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['turma']; ?></td>
                    <td>
                        <a href="form_atualizaAluno.php?id=<?php echo $aluno['id']; ?>">Editar</a>
                        <a href="deletaAluno.php?id=<?php echo $aluno['id']; ?>"
                            onclick="return confirm('Tem certeza que deseja excluir este aluno?');">Excluir</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <a href="form_cadastraAluno.php">Cadastrar novo aluno</a>
    </section>

</body>

</html>