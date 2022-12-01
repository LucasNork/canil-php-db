<?php

    class Usuario{
        private $id;
        private $nome;
        private $telefone;
        private $email;
        private $senha;
        public function getId() {
            return $this->id;
        }
        public function setId($id): void {
            $this->id = $id;
        }
        
        public function getNome() {
            return $this->nome;
        }
        public function setNome($nome): void {
            $this->nome = $nome;
        }
        public function getTelefone() {
            return $this->telefone;
        }
        public function setTelefone($telefone) {
            $this->telefone = $telefone;
        }
        public function getEmail() {
            return $this->email;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function getSenha() {
            return $this->senha;
        }
        public function setSenha($senha) {
            $this->senha = $senha;
        }

    }

?>