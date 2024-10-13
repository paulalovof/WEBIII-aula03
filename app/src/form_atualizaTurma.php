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
</head>
<body>
    <h3> Edição de Turma </h3>
    <form method="POST" action="atualizaTurma.php">
        <input type="hidden" name="id" value="<?php echo $turmaSelecionado['id']?>">
        <br>
        Nome: <input type="text" name="nome" value="<?php echo $turmaSelecionado['nome']?>">
        <br>
        Ano:<input type="number" min="2008" max="2025" name="ano" value="<?php echo $turmaSelecionado['ano']?>">
        <br>
        Sigla: <input type="text" name="sigla" value="<?php echo $turmaSelecionado['sigla']?>">
        <br>
        <input type="submit" value="Atualizar">
    </form>
</body>
</html>