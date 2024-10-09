<?php
    class Cliente {
        private $conexao;
        private $id;
        private $nome;

        private $ano;

        private $sigla;

        public function __construct($db) {
            $this->conexao = $db;

        }
        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function setAno($ano) {
            $this->ano = $ano;
        }

        public function setSigla($sigla) {
            $this->sigla = $sigla;
        }


        public function getNome() {
            return $this->nome;
        }

        public function getId() {
            return $this->id;
        }

        public function getAno() {
            return $this->ano;
        }

        public function getSigla() {
            return $this->sigla;
        }

        public function create() {
            $query = "INSERT INTO turma SET nome=:nome, ano=:ano, sigla=:sigla";
            $stmt = $this->conexao->prepare($query);

            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':ano', $this->ano);
            $stmt->bindParam(':sigla', $this->sigla);

            if ($stmt->execute()){
                return true;
            }else {
                return false;
            }
        }

        public function read() {
            $query = "SELECT * FROM turma";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute();

            return $stmt;
        } 

        public function delete() {
            $query = "DELETE FROM turma WHERE id=:id";
            $stmt = $this->conexao->prepare($query);

            $stmt -> bindParam(":id", $this->id);

            if($stmt->execute()){
                return true;
            }
            return false;
        }

        public function update(){
            $query = "UPDATE turma SET nome=:nome, ano=:ano, sigla=:sigla WHERE id=:id";
            $stmt = $this->conexao->prepare($query);

            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(':ano', $this->ano);
            $stmt->bindParam(':sigla', $this->sigla);
            $stmt->bindParam(":id", $this->id);

            if($stmt->execute()){
                return true;
            }
            return false;
        }

        public function consultar(){
            $query = "SELECT * FROM turma WHERE id = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
            return $stmt;
        }

    }
