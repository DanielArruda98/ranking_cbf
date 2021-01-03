<?php

    require_once 'database/Conexao.class.php';
   
    class Cidades {
        
        /*======================================================================================*/

        public function cadastrar($nome, $estado) {
            $conexao = new Conexao();
            $connection = $conexao->conectar();

            try {
                $sql = "INSERT INTO cidades 
                        VALUES (null, :nome, :estado)";

                $consulta = $connection->prepare($sql);

                $consulta->bindValue(":nome", $nome);
                $consulta->bindValue(":estado", $estado);

                if ($consulta->execute()) {
                    return [
                        'titulo' => 'Estado cadastrado com sucesso!', 
                        'tipo' => 'success'
                    ];
                } else {
                    return [
                        'titulo' => 'Erro ao cadastrar estado',
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

        public function listar($estado) {
            $conexao = new Conexao();
            $connection = $conexao->conectar();

            try {
                $sql = "SELECT * FROM cidades WHERE fk_estado = :estado;";

                $consulta = $connection->prepare($sql);

                $consulta->bindValue(':estado', $estado);

                if($consulta->execute()) {
                    $cont = $consulta->rowCount();

                    if ($cont > 0) {
                        $retorno = $consulta->fetchAll();
                        return $retorno;
                    }
                }
            } catch (PDOException $e) {
                echo "Erro ao listar cidades: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        /*======================================================================================*/
    }