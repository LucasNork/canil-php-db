<?php

require_once '../DAOs/TransacaoDAO.php';

class TransacaoController {
  public static function iniciarTransacao($transacao) {
    try {
      $transacaoDAO = new TransacaoDAO;
      $transacaoDAO->iniciarTransacao($transacao);
    } catch (PDOException $erro) {
      throw $erro;
    }
  }

  public static function transacaoPorId($id) {
    try {
      $transacaoDAO = new TransacaoDAO;
      return $transacaoDAO->transacaoPorId($id);
    } catch (PDOException $erro) {
      throw $erro;
    }
  }
}