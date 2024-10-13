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
</head>

<body>
    <h3> Criar aluno </h3>
    <form method="POST" action="cadastraTurma.php">
        <p>Nome: <input type="text" name="nome" required> </p>
        <p>Ano: <input type="number" min="2008" max="2025" name="ano" required> </p>
        <p>Sigla: <input type="text" name="sigla" required> </p>
        <input type="submit" value="Cadastrar">
    </form>
</body>

</html>