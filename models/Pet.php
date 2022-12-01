<?php

  class Pet {
    private $id;
    private $raca;
    private $cor;
    private $sexo;
    private $categoria;
    private $dataNascimento;
    private $imagem;

    public function getId() {
      return $this->id;
    }
    public function setId($id): void {
        $this->id = $id;
    }
    public function setRaca($raca) {
      $this->raca = $raca;
    }
    public function getRaca() {
      return $this->raca;
    }

    public function setCor($cor) {
      $this->cor = $cor;
    }
    public function getCor() {
      return $this->cor;
    }

    public function setSexo($sexo) {
      $this->sexo = $sexo;
    }
    public function getSexo() {
      return $this->sexo;
    }

    public function setCategoria($categoria) {
      $this->categoria = $categoria;
    }
    public function getCategoria() {
      return $this->categoria;
    }

    public function setNascimento($dataNascimento) {
      $this->dataNascimento = $dataNascimento;
    }
    public function getNascimento() {
      return $this->dataNascimento;
    }

    public function setImagem($imagem) {
      $this->imagem = $imagem;
    }
    public function getImagem() {
      return $this->imagem;
    }
    
  }