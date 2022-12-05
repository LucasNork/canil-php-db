<?php

    class Anuncio {
        private $id;
        private $pet;
        private $usuario;
        private $status = 1;

        public function setId ($id) {
            $this->id = $id;
        }
        public function getId () {
            return $this->id;
        }
        public function getPet () {
            return $this->pet;
        }
        public function setPet ($pet) {
            $this->pet = $pet;
        }

        public function getUsuario () {
            return $this->usuario;
        }
        public function setUsuario ($usuario) {
            $this->usuario = $usuario;
        }
        public function getStatus () {
            return $this->status;
        }
        public function setStatus ($status) {
            $this->status = $status;
        }
    }