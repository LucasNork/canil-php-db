<?php



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
    require_once '../models/Pet.php';
    require_once '../models/Anuncio.php';
    require_once '../models/Imagem.php';
    session_start();
    if (isset($_SESSION['anuncioPorId'])) {
      $anuncio = $_SESSION['anuncioPorId'];
        echo '<h2>Fotos</h2>';
        echo '<div class="container list">';
        foreach ($anuncio->getPet()->getImagem() as $imagem) {
          $imagemCompleta = $imagem->getCaminho() . $imagem->getNome();
          echo'
            <div class="item">
              <img src="' . $imagemCompleta . '" class="item--image" />
            </div>
          ';
        }
        echo '</div>';




      }




  ?>

  </div>
</body>

</html>