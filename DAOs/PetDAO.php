<?php

    class PetDAO {


        public function salvar ($pet) {
            try {
                $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO pet (raca,cor,sexo,categoria,birth_date) VALUES (?,?,?,?,?)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(1, $pet->getRaca());
                $stmt->bindValue(2, $pet->getCor());
                $stmt->bindValue(3, $pet->getSexo());
                $stmt->bindValue(4, $pet->getCategoria());
                $stmt->bindValue(5, $pet->getNascimento());
                $stmt->execute();

                $id = $conexao->lastInsertId();
                $pet->setId($id);

                $imagemDAO = new imagemDAO();
                for ($i = 0; $i < count($pet->getImagem()); $i++) {
                    $imagem = $pet->getImagem()[$i];
                    $imagem->setPet($pet);
                    $imagemDAO->salvar($imagem);
                }
                return $pet;
            } catch (PDOException $erro) {
                throw $erro;
            }
        }
    }