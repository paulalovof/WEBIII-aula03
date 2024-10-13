<?php
require 'Banco.php';
require 'Aluno.php';

$banco = new Banco();
$conexao = $banco->getConexao();
$aluno = new Aluno($conexao);

$aluno->setId($_POST['id']);
$aluno->setNome($_POST['nome']);
$aluno->setTurma($_POST['id_turma']);

if ($aluno->update()) {
    echo "Aluno editado com sucesso!";
    header("Refresh:3;url=listaAluno.php");
} else {
    echo "Erro ao editar o aluno!";
}
