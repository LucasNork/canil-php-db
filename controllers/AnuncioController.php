<?php
  require_once '../DAOs/PetDAO.php';
  require_once '../DAOs/AnuncioDAO.php';
  require_once '../models/Pet.php';
  require_once '../models/Imagem.php';

  class AnuncioController {
    

    public static function salvar (Anuncio $anuncio) {
      try {
        
        $petDAO = new PetDAO();
        $pet = $petDAO->salvar($anuncio->getPet());
        $anuncio->setPet($pet);

        $anuncioDAO = new AnuncioDAO();
        $anuncioDAO->salvar($anuncio);

    } catch (PDOException $erro) {
        throw $erro;
    }
    }
    public static function listarTodos ($categoria = "") {
      try {
        
        $anuncioDAO = new AnuncioDAO();
        $listaCompleta = $anuncioDAO->listarTodos();

        return $listaCompleta;
    } catch (PDOException $erro) {
        throw $erro;
    }
    }

    public static function anuncioPorId ($id) {
      try {
        
        $anuncioDAO = new AnuncioDAO();
        $anuncio = $anuncioDAO->anuncioPorId($id);

        return $anuncio;
      } catch (PDOException $erro) {
          throw $erro;
      }
    }
    public static function anuncioPorCategoria ($categoria) {
      try {
        
        $anuncioDAO = new AnuncioDAO();
        $listaCompleta = $anuncioDAO->anuncioPorId($categoria);

        return $listaCompleta;
      } catch (PDOException $erro) {
          throw $erro;
      }
    }
    
  }