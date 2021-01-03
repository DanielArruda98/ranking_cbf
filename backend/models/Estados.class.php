<?php

    require_once 'database/Conexao.class.php';
   
    class Estados {
        
        /*======================================================================================*/

        public function listar() {
            $conexao = new Conexao();
            $connection = $conexao->conectar();

            try {
                $sql = "SELECT * FROM estados;";

                $consulta = $connection->prepare($sql);

                if($consulta->execute()) {

                    $cont = $consulta->rowCount();

                    if ($cont > 0) {
                        $retorno = $consulta->fetchAll();
                        return $retorno;
                    }
                }
            } catch (PDOException $e) {
                echo "Erro ao listar estados: " . $e->getMessage();
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }

        /*======================================================================================*/
    }