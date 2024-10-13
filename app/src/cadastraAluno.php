<?php
require_once 'Banco.php';
require_once 'Aluno.php';
require_once 'Turma.php';

$banco = new Banco();
$conexao = $banco->getConexao();

$turma = new Turma($conexao);


$turma->setId($_POST['id_turma']);


$stmt = $turma->consultar();
$turmaAluno = $stmt->fetch(PDO::FETCH_ASSOC);

$aluno = new Aluno($conexao);
$aluno->setNome($_POST['nome']);

$aluno->setTurma($turmaAluno['id']);
//echo "turma do aluno: ".$turmaAluno['id'];

if ($aluno->create()) {
    echo "Aluno cadastrado com sucesso!";
    header("Refresh:3;url=listaAluno.php");
} else {
    echo "Erro ao cadastrar o aluno!";
}
