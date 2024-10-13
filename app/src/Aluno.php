<?php

require_once './Turma.php';

class Aluno
{
    private $conexao;
    private $id;
    private $nome;

    private $turma;

    public function __construct($db)
    {
        $this->conexao = $db;
        //$this->turma = new Turma($db);
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setTurma($turma)
    {
        $this->turma = $turma;
    }
    public function getNome()
    {
        return $this->nome;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTurma()
    {
        return $this->turma;
    }

    public function create()
    {
        $query = "INSERT INTO aluno SET nome=:nome";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(':nome', $this->nome);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function read()
    {
        $query = "SELECT aluno.id, aluno.nome, turma.id AS turma_id 
              FROM aluno, turma 
              where aluno.turma_id = turma.id ";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function delete()
    {
        $query = "DELETE FROM aluno WHERE id=:id";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update()
    {
        $query = "UPDATE aluno SET nome=:nome WHERE id=:id";
        $stmt = $this->conexao->prepare($query);

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":id", $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function consultar()
    {
        $query = "SELECT * FROM aluno WHERE id = :id";
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();
        return $stmt;
    }
}
