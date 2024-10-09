<?php
    require 'Banco.php';
    require './models/Aluno.php';
    require './models/Turma.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();
    $cliente = new Cliente($conexao);

    $cliente->setId($_GET['id']);
    $smtm = $cliente->read();
    $listaTurmas = $smtm->fetchAll(PDO::FETCH_ASSOC); //apenas para uma linha

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
    <h3> Edição de Cliente </h3>
    <form method="POST" action="cadastroAluno.php">
        <p>Nome: <input type="text" name="nome" required> </p>
        <p> <button type="submit">Cadastrar</button></p>
        <select name="id_turma">
            <?php foreach($listaTurmas as $turma) {?>
                <option value="<?php echo $turma['id_turma']; ?>"><?php echo $turma['nome']; ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>