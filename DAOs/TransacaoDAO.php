<?php

class TransacaoDAO {
  public function iniciarTransacao($transacao) {
    try {
      $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
      $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "INSERT INTO transacao (id_anuncio,id_comprador,data_inicio) VALUES (?,?,now())";
      $stmt = $conexao->prepare($sql);
      $stmt->bindValue(1, $transacao->getIdAnuncio());
      $stmt->bindValue(2, $transacao->getIdComprador());
      $stmt->execute();
    } catch (PDOException $erro) {
      throw $erro;
    }
  }

  public function transacaoPorId($id) {
    try {
      $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
      $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT * FROM transacao WHERE id_anuncio = ?";
      $stmt = $conexao->prepare($sql);
      $stmt->bindValue(1, $id->getIdAnuncio());
      $stmt->execute();
      $arrayDeTransacoesDoBanco = $stmt->fetch(PDO::FETCH_OBJ);
    } catch (PDOException $erro) {
      throw $erro;
    }
  }
}