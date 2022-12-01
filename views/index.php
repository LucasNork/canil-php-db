<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" type="image/png" href="images/favicon.png" />
</head>

<body>

    <header>
        <div class="container">
            <a href="">PetDevShop</a>
            <?php
                require_once '../models/Usuario.php';
                require_once '../models/Pet.php';
                require_once '../models/Anuncio.php';
                require_once '../models/Imagem.php';
                session_start();
                if(isset($_SESSION['usuario'])) {
                    echo'
                        <a href="../controllers/rota.php?acao=deslogar" class="login" style="font-size: 16px; margin-top: 12px;">Deslogar</a>
                    ';
                } else {
                    echo'
                        <a href="./login.html" class="login" style="font-size: 16px; margin-top: 12px;">Fazer Login</a>
                        <a href="./formCadastrarUsuario.html" class="login" style="font-size: 16px; margin-top: 12px;">Criar Conta</a>
                    ';
                }
            ?>
            <form method="GET" action="">
                <input type="search" name="q" placeholder="Pesquise por raça" />
            </form>
        </div>
    </header>
    <nav>
        <ul>
            <li class=""><a href="../controllers/rota.php?acao=listarTodos">Todos</a></li>
            <li class=""><a href="../controllers/rota.php?acao=listarCategoria&categoria=cachorro">Cachorros</a></li>
            <li class=""><a href="../controllers/rota.php?acao=listarCategoria&categoria=gato">Gatos</a></li>
            <li class=""><a href="../controllers/rota.php?acao=listarCategoria&categoria=peixe">Peixes</a></li>
        </ul>
    </nav>
    <!-- <section class="banner" style="background-image: url('images/allanimals.jpg')">Todos os animais</section> -->
    <?php
        echo '<div class="container list">';
        if (isset($_SESSION['listagemGeral'])) {
            $anuncios = $_SESSION['listagemGeral'];
            foreach ($anuncios as $resultado) {

                //----------------------------------------------------------------------------------------------------------------------
                $imagemCompleta = $resultado->getPet()->getImagem()[0]->getCaminho() . $resultado->getPet()->getImagem()[0]->getNome();

                echo '
                    <a href="../controllers/rota.php?acao=mostrarAnuncio&id=' . $resultado->getId() . '" style="text-decoration: none; color: #000;">
                        <div class="item">
                            <img src="' . $imagemCompleta . '" class="item--image" />
                            <div class="item--name">' . $resultado->getPet()->getRaca() . '</div>
                            <div class="item--color">Cor: ' . $resultado->getPet()->getCor() . '</div>
                            <div class="item--genre">Gênero: ' . $resultado->getPet()->getSexo() . '</div>
                        </div>
                    </a>
                ';
            }
        echo '</div>';
        } 

        ?>

    <footer class="container">
    </footer>
</body>

</html>