<?php

class Transacao {
    private $id;
    private $id_anuncio;
    private $comprador;
    private $data_inicio;
    private $data_finalizacao;
    private $transacao_status;

    public function setId($id) {
        $this->id = $id;
    }
    public function getId () {
        return $this->id;
    }
    public function setIdAnuncio($id_anuncio) {
        $this->id_anuncio = $id_anuncio;
    }
    public function getIdAnuncio () {
        return $this->id_anuncio;
    }
    public function setComprador($comprador) {
        $this->comprador = $comprador;
    }
    public function getComprador () {
        return $this->comprador;
    }
    public function setDataInicio($data_inicio) {
        $this->data_inicio = $data_inicio;
    }
    public function getDataInicio () {
        return $this->data_inicio;
    }
    public function setDataFinalizacao($data_finalizacao) {
        $this->data_finalizacao = $data_finalizacao;
    }
    public function getDataFinalizacao () {
        return $this->data_finalizacao;
    }
    public function setStatus($transacao_status) {
        $this->transacao_status = $transacao_status;
    }
    public function getStatus () {
        return $this->transacao_status;
    }
}