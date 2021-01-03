<?php

    require_once 'database/Conexao.class.php';
   
    class Equipes {

        /*======================================================================================*/

        public function cadastrar($nome, $sigla, $logo, $cidade) {
            $conexao = new Conexao();
            $connection = $conexao->conectar();

            try {
                $sql = "INSERT INTO equipes 
                        VALUES (null, :nome, :sigla, :logo, :cidade)";

                $consulta = $connection->prepare($sql);

                $consulta->bindValue(":nome", $nome);
                $consulta->bindValue(":sigla", $sigla);
                $consulta->bindValue(":logo", $logo);
                $consulta->bindValue(":cidade", $cidade);

                if ($consulta->execute()) {
                    return [
                        'titulo' => 'Equipe cadastrada com sucesso!', 
                        'tipo' => 'success'
                    ];
                } else {
                    return [
                        'titulo' => 'Erro ao cadastrar equipe',
                        'tipo' => 'danger'
                    ];
                }

            } catch (PDOException $e) {
                echo "Erro ao cadastrar equipe: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        /*======================================================================================*/

        public function listar() {
            $conexao = new Conexao();
            $connection = $conexao->conectar();

            try {
                $sql = "SELECT equipes.id, equipes.nome AS equipe, equipes.sigla, equipes.logo, estados.id AS id_estado, estados.nome AS estado, estados.uf, cidades.id AS id_cidade, cidades.nome AS cidade FROM equipes 
                        INNER JOIN cidades ON cidades.id = equipes.fk_cidade
                        INNER JOIN estados ON estados.id = cidades.fk_estado
                        ORDER BY equipes.nome;";

                $consulta = $connection->prepare($sql);

                if($consulta->execute()) {

                    $cont = $consulta->rowCount();

                    if ($cont > 0) {
                        $equipes = $consulta->fetchAll();
                        return $equipes;
                    }
                }
            } catch (PDOException $e) {
                echo "Erro ao listar equipe: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        /*======================================================================================*/

        public function consultar($id_equipe) {
            $conexao = new Conexao();
            $connection = $conexao->conectar();

            try {
                $sql = "SELECT equipes.id, equipes.nome AS equipe, equipes.sigla, equipes.logo, estados.id AS id_estado, estados.nome AS estado, estados.uf, cidades.id AS id_cidade, cidades.nome AS cidade FROM equipes 
                        INNER JOIN cidades ON cidades.id = equipes.fk_cidade
                        INNER JOIN estados ON estados.id = cidades.fk_estado
                        WHERE equipes.id = :id_equipe
                        ORDER BY equipes.nome;";

                $consulta = $connection->prepare($sql);
                
                $consulta->bindValue(":id_equipe", $id_equipe);

                if($consulta->execute()) {

                    $cont = $consulta->rowCount();

                    if ($cont > 0) {
                        $equipes = $consulta->fetchAll();
                        return $equipes;
                    }
                }

            } catch (PDOException $e) {
                echo "Erro ao consultar equipe: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        /*======================================================================================*/

        public function deletar($id_equipe) {
            $conexao = new Conexao();
            $connection = $conexao->conectar();

            try {
                $sql = "DELETE FROM equipes
                        WHERE id = :id_equipe";

                $consulta = $connection->prepare($sql);

                $consulta->bindValue(":id_equipe", $id_equipe);

                if ($consulta->execute()) {
                    return [
                        'titulo' => 'Equipe deletada com sucesso!', 
                        'tipo' => 'success'
                    ];
                } else {
                    return [
                        'titulo' => 'Erro ao deletar equipe',
                        'tipo' => 'danger'
                    ];
                }

            } catch (PDOException $e) {
                echo "Erro ao deletar filme: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        /*======================================================================================*/

        public function atualizar($id_equipe, $nome, $sigla, $logo, $cidade) {
            $conexao = new Conexao();
            $connection = $conexao->conectar();

            try {
                $sql = "UPDATE equipes
                        SET nome = :nome, sigla = :sigla, logo = :logo, fk_cidade = :cidade
                        WHERE id = :id_equipe";

                $consulta = $connection->prepare($sql);

                $consulta->bindValue(":id_equipe", $id_equipe);
                $consulta->bindValue(":nome", $nome);
                $consulta->bindValue(":sigla", $sigla);
                $consulta->bindValue(":logo", $logo);
                $consulta->bindValue(":cidade", $cidade);

                if ($consulta->execute()) {
                    return [
                        'titulo' => 'Equipe atualizada com sucesso!', 
                        'tipo' => 'success'
                    ];
                } else {
                    return [
                        'titulo' => 'Erro ao atualizar equipe',
                        'tipo' => 'danger'
                    ];
                }

            } catch (PDOException $e) {
                echo "Erro ao atualizar equipe: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        /*======================================================================================*/

    }