<?php
    require 'Banco.php';
    require './models/Aluno.php';
    require './models/Turma.php';

    $banco = new Banco();
    $conexao = $banco->getConexao();


    $aluno = new Aluno($conexao);
    $aluno->setNome($_POST['nome']);

    $turma = new Turma($conexao);
    $turmaAluno = $turma.consultar($_POST['id_turma']);

    $aluno->setTurma($turmaAluno->getId());
  

        if ($cliente->create()) {
            echo "Aluno cadastrado com sucesso!";
            header("Refresh:3;url=form_cadastroAluno.php");
        }else {
            echo "Erro ao cadastrar o aluno!";
        }