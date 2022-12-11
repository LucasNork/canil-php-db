<?php

    class UsuarioDAO {
        public function salvar ($usuario) {
            try {
                $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "INSERT INTO usuario (nome,telefone,email,senha) VALUES (?,?,?,?)";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(1, $usuario->getNome());
                $stmt->bindValue(2, $usuario->getTelefone());
                $stmt->bindValue(3, $usuario->getEmail());
                $hashDaSenha = password_hash($usuario->getSenha(), PASSWORD_DEFAULT);
                $stmt->bindValue(4, $hashDaSenha);
                $stmt->execute();
                
                $usuario->setSenha($hashDaSenha);
                return $usuario;
            } catch (PDOException $erro ) {
                throw $erro;
            }
        }

        public function autenticar ($usuario) {
            try {
                $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM usuario WHERE email = ?";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(1, $usuario->getEmail());
                $stmt->execute();

                $usuarioDoBanco = $stmt->fetch(PDO::FETCH_OBJ);

                return password_verify($usuario->getSenha(), $usuarioDoBanco->senha) ? $usuarioDoBanco : false;


            } catch (PDOException $erro ) {
                throw $erro;
            }
        }

        public function usuarioPorId ($id) {
            try {
                $conexao = new PDO('mysql:host=localhost;dbname=canil_php', "root", "");
                $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "SELECT * FROM usuario WHERE id = ?";
                $stmt = $conexao->prepare($sql);
                $stmt->bindValue(1, $id);
                $stmt->execute();

                while ($usuarioDoBanco = $stmt->fetch(PDO::FETCH_OBJ)) {
                    $usuario = new Usuario;
                    $usuario->setId($usuarioDoBanco->id);
                    $usuario->setNome($usuarioDoBanco->nome);
                    $usuario->setTelefone($usuarioDoBanco->telefone);
                };

                return $usuario;


            } catch (PDOException $erro ) {
                throw $erro;
            }
        }
    }