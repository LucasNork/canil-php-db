<?php

    class ImagemDAO {


        public function salvar (Imagem $imagem) {

            try {
                $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO imagem (nome,caminho,id_pet) VALUES (?,?,?)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(1, $imagem->getNome());
                $stmt->bindValue(2, $imagem->getCaminho());
                $stmt->bindValue(3, $imagem->getPet()->getId());
                $stmt->execute();
            } catch (PDOException $erro) {
                throw $erro;
            }
        }

        public static function imagemPorId ($id) {
            try {
                $conexao = new PDO('mysql:host=localhost; dbname=canil_php', "root", "");
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM imagem WHERE id_pet = ?";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(1, $id);
                $stmt->execute();
                $arrayImagem = [];

                while ($resultado = $stmt->fetch(PDO::FETCH_OBJ)) {
                    $imagem = new Imagem;
                    $imagem->setId($resultado->id);
                    $imagem->setNome($resultado->nome);
                    $imagem->setCaminho($resultado->caminho);

                    array_push($arrayImagem, $imagem);
                }

                return $arrayImagem;
            } catch (PDOException $erro)  {
                throw $erro;
            }
        }
    }