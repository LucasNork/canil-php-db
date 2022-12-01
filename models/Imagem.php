<?php

    class Imagem {
        private $id;
        private $caminho;
        private $nome;
        private $pet;

        public function setId ($id) {
            $this->id = $id;
        }
        public function getId () {
            return $this->id;
        }

        public function setCaminho ($nome) {
            $this->caminho = $nome;
        }
        public function getCaminho () {
            return $this->caminho;
        }

        public function setNome ($conteudo) {
            $this->nome = $conteudo;
        }
        public function getNome () {
            return $this->nome;
        }

        public function setPet ($conteudo) {
            $this->pet = $conteudo;
        }
        public function getPet () {
            return $this->pet;
        }

    }