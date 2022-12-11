<?php

class TransacaoDAO {
  public function iniciarTransacao($transacao) {
    try {
      $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
      $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "INSERT INTO transacao (id_anuncio,id_comprador,data_inicio) VALUES (?,?,now())";
      $stmt = $conexao->prepare($sql);
      $stmt->bindValue(1, $transacao->getIdAnuncio());
      $stmt->bindValue(2, $transacao->getComprador());
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
      $stmt->bindValue(1, $id);
      $stmt->execute();
      $arrayDeTransacoes = [];
      $anuncioDisponivel = true;
      while ($arrayDeTransacoesDoBanco = $stmt->fetch(PDO::FETCH_OBJ)) {
        if ($arrayDeTransacoesDoBanco->data_finalizacao != null) {
          $anuncioDisponivel = false;
          return $anuncioDisponivel;
        }
        $transacao = new Transacao();
        $usuarioDAO = new UsuarioDAO();
        $transacao->setId($arrayDeTransacoesDoBanco->id);
        $transacao->setIdAnuncio($arrayDeTransacoesDoBanco->id_anuncio);
        $transacao->setComprador($usuarioDAO->usuarioPorId($arrayDeTransacoesDoBanco->id_comprador));
        $transacao->setDataInicio($arrayDeTransacoesDoBanco->data_inicio);
        array_push($arrayDeTransacoes, $transacao);
      };

      return $arrayDeTransacoes;
    } catch (PDOException $erro) {
      throw $erro;
    }
  }
  public function finalizarTransacao ($id) {
    try {
      $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
      $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "UPDATE transacao SET data_finalizacao = now() WHERE id = ?";
      $stmt = $conexao->prepare($sql);
      $stmt->bindValue(1, $id);
      $stmt->execute();
    } catch (PDOException $erro) {
      throw $erro;
    }
  }
}