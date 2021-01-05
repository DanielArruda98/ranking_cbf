<?php

    require_once 'database/Conexao.class.php';
   
    class Temporadas {
        
        /*======================================================================================*/

        public function cadastrar($ano) {
            $conexao = new Conexao();
            $connection = $conexao->conectar();

            try {
                $sql = "INSERT INTO temporadas 
                        VALUES (null, :ano)";

                $consulta = $connection->prepare($sql);

                $consulta->bindValue(":ano", $ano);

                if ($consulta->execute()) {
                    return [
                        'titulo' => 'Temporada cadastrada com sucesso!', 
                        'tipo' => 'success'
                    ];
                } else {
                    return [
                        'titulo' => 'Erro ao cadastrar temporada',
                        'tipo' => 'danger'
                    ];
                }

            } catch (PDOException $e) {
                echo "Erro ao cadastrar temporada: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        /*======================================================================================*/

        public function listar() {
            $conexao = new Conexao();
            $connection = $conexao->conectar();

            try {
                $sql = "SELECT * FROM temporadas
                        ORDER BY ano DESC;";

                $consulta = $connection->prepare($sql);

                if($consulta->execute()) {
                    $cont = $consulta->rowCount();

                    if ($cont > 0) {
                        $retorno = $consulta->fetchAll();
                        return $retorno;
                    }
                }
            } catch (PDOException $e) {
                echo "Erro ao listar temporadas: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        /*======================================================================================*/
    }