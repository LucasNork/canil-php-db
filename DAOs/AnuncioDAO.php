<?php


class AnuncioDAO
{

  function salvar($anuncio)
  {
    try {
      $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
      $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "INSERT INTO anuncio (id_user,id_pet,data) VALUES (?,?,now())";
      $stmt = $conexao->prepare($sql);
      $stmt->bindValue(1, $anuncio->getUsuario()->getId());
      $stmt->bindValue(2, $anuncio->getPet()->getId());
      $stmt->execute();
    } catch (PDOException $th) {
      throw $th;
    }
  }
  function listarTodos()
  {
    try {
      $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
      $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT anuncio.id AS anuncio_id, anuncio.id_user , anuncio.id_pet AS forgery_pet, pet.* FROM anuncio INNER JOIN pet ON anuncio.id_pet = pet.id AND anuncio.anuncio_status = 1";
      $stmt = $conexao->prepare($sql);
      $stmt->execute();
      $listaDeAnuncios = [];

      while ($anuncioDoBanco = $stmt->fetch(PDO::FETCH_OBJ)) {
        $anuncio = new Anuncio;
        $pet = new Pet;
        $usuario = new Usuario;
        $imagemDAO = new ImagemDAO;
        $arrayDeImagem = $imagemDAO->imagemPorId($anuncioDoBanco->id);
        $pet->setId($anuncioDoBanco->id);
        $pet->setRaca($anuncioDoBanco->raca);
        $pet->setCor($anuncioDoBanco->cor);
        $pet->setSexo($anuncioDoBanco->sexo);
        $pet->setCategoria($anuncioDoBanco->categoria);
        $pet->setNascimento($anuncioDoBanco->birth_date);
        $pet->setImagem($arrayDeImagem);
        $usuario->setId($anuncioDoBanco->id_user);

        $anuncio->setId($anuncioDoBanco->anuncio_id);
        $anuncio->setUsuario($usuario);
        $anuncio->setPet($pet);
        array_push($listaDeAnuncios, $anuncio);
      }

      return $listaDeAnuncios;
    } catch (PDOException $th) {
      throw $th;
    }
  }
  function anuncioPorId($id)
  {
    try {
      $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
      $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT anuncio.id AS anuncio_id, anuncio.id_user, anuncio.data, pet.* FROM anuncio INNER JOIN pet ON anuncio.id = ? AND anuncio.id_pet = pet.id";
      $stmt = $conexao->prepare($sql);
      $stmt->bindValue(1, $id);
      $stmt->execute();

      $anuncioDoBanco = $stmt->fetch(PDO::FETCH_OBJ);

      $pet = new Pet;
      $pet->setId($anuncioDoBanco->id);
      $pet->setRaca($anuncioDoBanco->raca);
      $pet->setCor($anuncioDoBanco->cor);
      $pet->setSexo($anuncioDoBanco->sexo);
      $pet->setCategoria($anuncioDoBanco->categoria);
      $pet->setNascimento($anuncioDoBanco->birth_date);

      $ImagemDAO = new ImagemDAO;
      $arrayDeImagens = $ImagemDAO->imagemPorId($pet->getId());
      $pet->setImagem($arrayDeImagens);

      $usuario = new Usuario;
      $usuario->setId($anuncioDoBanco->id_user);


      $anuncio = new Anuncio;
      $anuncio->setId($anuncioDoBanco->anuncio_id);
      $anuncio->setPet($pet);
      $anuncio->setUsuario($usuario);

      return $anuncio;
    } catch (PDOException $erro) {
      throw $erro;
    }
  }
  function anuncioPorCategoria($categoria)
  {
    try {
      $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
      $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "SELECT anuncio.id AS anuncio_id, anuncio.id_user , anuncio.id_pet AS forgery_pet, pet.* FROM anuncio INNER JOIN pet ON anuncio.id_pet = pet.id AND pet.categoria = ? AND anuncio.anuncio_status = 1";
      $stmt = $conexao->prepare($sql);
      $stmt->bindValue(1, $categoria);
      $stmt->execute();
      $listaDeAnuncios = [];

      while ($anuncioDoBanco = $stmt->fetch(PDO::FETCH_OBJ)) {
        $anuncio = new Anuncio;
        $pet = new Pet;
        $usuario = new Usuario;
        $imagemDAO = new ImagemDAO;
        $arrayDeImagem = $imagemDAO->imagemPorId($anuncioDoBanco->id);
        $pet->setId($anuncioDoBanco->id);
        $pet->setRaca($anuncioDoBanco->raca);
        $pet->setCor($anuncioDoBanco->cor);
        $pet->setSexo($anuncioDoBanco->sexo);
        $pet->setCategoria($anuncioDoBanco->categoria);
        $pet->setNascimento($anuncioDoBanco->birth_date);
        $pet->setImagem($arrayDeImagem);
        $usuario->setId($anuncioDoBanco->id_user);

        $anuncio->setId($anuncioDoBanco->anuncio_id);
        $anuncio->setUsuario($usuario);
        $anuncio->setPet($pet);
        array_push($listaDeAnuncios, $anuncio);
      }

      return $listaDeAnuncios;
    } catch (PDOException $th) {
      throw $th;
    }
  }

  function finalizarAnuncio ($id)
  {
    try {
      $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
      $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "UPDATE anuncio SET anuncio_status = 0 WHERE id = ?";
      $stmt = $conexao->prepare($sql);
      $stmt->bindValue(1, $id);
      $stmt->execute();
      $transacaoDAO = new TransacaoDAO;
      $transacaoDAO->finalizarTransacao($id);
      
    } catch (PDOException $th) {
      throw $th;
    }
  }

}