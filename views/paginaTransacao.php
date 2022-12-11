<?php
  require_once '../models/Pet.php';
  require_once '../models/Anuncio.php';
  require_once '../models/Imagem.php';
  require_once '../models/Usuario.php';
  require_once '../models/Transacao.php';
  session_start();
  if(!isset($_SESSION['usuario'])){
    header('Location: ../views/index.php');
  }

?>

<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>

<body>
  <header>
    <div class="container">
      <a href="">PetDevShop</a>
    </div>
  </header>

  <?php
    if (isset($_SESSION['anuncioPorId'])) {
      $anuncio = $_SESSION['anuncioPorId'];
      echo'<h2>Fotos</h2>';
      echo'<div class="container list">';
      foreach ($anuncio->getPet()->getImagem() as $imagem) {
        $imagemCompleta = $imagem->getCaminho() . $imagem->getNome();
        echo'
          <div class="item">
            <img src="' . $imagemCompleta . '" class="item--image" />
          </div>
        ';
      }
      echo'</div>';
      echo'<div class="container list">';
        echo'<div class="item">
              <div class="item--name">' . $anuncio->getPet()->getRaca() . '</div>
              <div class="item--color">Cor: ' . $anuncio->getPet()->getCor() . '</div>
              <div class="item--genre">Gênero: ' . $anuncio->getPet()->getSexo() . '</div>
              <div class="item--color">Data nascimento: ' . $anuncio->getPet()->getNascimento() . '</div>
            </div>
          ';
      echo'</div>';
    }

    $usuario = $_SESSION['usuario'];
    $transacoes = $_SESSION['transacoes'];

    if ($usuario->id == $anuncio->getUsuario()->getId()) {
      if ($transacoes == false) {
        echo '<h2>Não há solicitações! </h2>';
      } else {
        echo '<h2>Solicitações </h2>';
        echo'<div class="container list">';
        foreach ($transacoes as $transacao) {
          echo'<div class="item">
                <div class="item--name">Nome: ' . $transacao->getComprador()->getNome() . '</div>
                <div class="item--name">Telefone: ' . $transacao->getComprador()->getTelefone() . '</div>
                <div class="item--name">Data do Pedido: ' . $transacao->getDataInicio() . '</div>
                <div class="item--name">
                  <a href="../controllers/rota.php?acao=finalizarTransacao&anuncio='.$transacao->getIdAnuncio().'">
                    Finalizar doação >>
                  </a>
                </div>
                
              </div>
            ';

        }
        echo'</div>';
      }
    }



    if ($usuario->id !== $anuncio->getUsuario()->getId()) {
      echo'
        <div class="contain">
          <a href="../controllers/rota.php?acao=adotarPet" style="text-decoration: none; color: #000;background: #102581;padding: 18px;">
            <p style="color: #fff;">Adotar</p>
          </a>
        </div>
      ';
    }

  ?>
  

</body>

</html>