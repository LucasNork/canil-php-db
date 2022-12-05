<?php

class TransacaoDAO {
  public function iniciarTransacao($transacao) {
    try {
      $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
      $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "INSERT INTO transacao () VALUES (?,?,now())";
    } catch (PDOException $erro) {
      throw $erro;
    }
  }
}