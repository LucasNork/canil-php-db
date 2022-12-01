<?php
  require_once '../DAOs/UsuarioDAO.php';
  class UsuarioControlador {

    public static function salvar($usuario) {
      try {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->salvar($usuario);
      } catch (PDOException $erro) {
        throw $erro;
      }
    }

    public static function autenticar($usuario) {
      try {
        $usuarioDAO = new UsuarioDAO();
        return $usuarioDAO->autenticar($usuario);
      } catch (PDOException $erro) {
        throw $erro;
      }
    }
  }

?>