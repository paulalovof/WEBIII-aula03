<?php
    require 'Banco.php';
    require 'Turma.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();

    $turma = new Turma($conexao);
    $turma->setId($_GET['id']);

    if($turma->delete()){
        echo "Turma deletado com sucesso!";
        header("Refresh:3;url=listaTurma.php");
    }else {
            echo "Erro ao deletar o turma!";
    }
?>r