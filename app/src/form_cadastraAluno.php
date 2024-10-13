<?php
require_once 'Banco.php';
require_once 'Aluno.php';
require_once 'Turma.php';

$banco = new Banco();
$conexao = $banco->getConexao();
$aluno = new Aluno($conexao);

$turma = new Turma($conexao);

$smtm = $turma->read();

$listaTurmas = $smtm->fetchAll(PDO::FETCH_ASSOC); //apenas para uma linha

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de Criação</title>
</head>

<body>
    <h3> Criar aluno </h3>
    <form method="POST" action="cadastraAluno.php">
        <p>Nome: <input type="text" name="nome" required> </p>
        <select name="id_turma">
            <option value=""></option>
            <?php foreach ($listaTurmas as $turma) { ?>
                <option value="<?php echo $turma['id'] ?>"><?php echo $turma['sigla']; ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>