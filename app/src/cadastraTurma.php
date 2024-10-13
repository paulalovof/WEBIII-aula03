<?php
require 'Banco.php';
require 'Turma.php';

$banco = new Banco();
$conexao = $banco->getConexao();

$turma = new Turma($conexao);

$turma->setNome($_POST['nome']);
$turma->setAno($_POST['ano']);
$turma->setSigla($_POST['sigla']);

if ($turma->create()) {
    echo "Turma cadastrado com sucesso!";
    header("Refresh:3;url=listaTurma.php");
} else {
    echo "Erro ao cadastrar o turma!";
}
