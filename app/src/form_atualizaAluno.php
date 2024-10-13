<?php
require 'Banco.php';
require 'Turma.php';
require 'Aluno.php';

$banco = new Banco();
$conexao = $banco->getConexao();
$aluno = new Aluno($conexao);

$turma = new Turma($conexao);

$stmt_aluno = $aluno->read();
$stmt_turma = $turma->read();

$listaAluno = $stmt_aluno->fetch(PDO::FETCH_ASSOC);
$listaTurmas = $stmt_turma->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Edição</title>
</head>

<body>
    <h3> Edição de Aluno </h3>
    <form method="POST" action="atualizaAluno.php">
        <input type="hidden" name="id" value="<?php echo $listaAluno['id'] ?>">
        <br>
        Nome: <input type="text" name="nome" value="<?php echo $listaAluno['nome'] ?>">
        <br>
        <select name="id_turma">
            <?php foreach ($listaTurmas as $turma) { ?>
                <option value="<?php echo $turma['id']; ?>"><?php echo $turma['sigla']; ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Atualizar">
    </form>
</body>

</html>