<?php

require_once 'Conexao.php';
require_once 'sql/Modelo_sql.php';

class ModeloDAO extends Conexao {

    public function InserirModelo(ModeloVO $vo) {
        $conexao = parent::retornaConexao();

        $comando = Modelo_sql::InserirModelo();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getNomeModelo());
        $sql->bindValue(2, $vo->getIdUsuario());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function AlterarModelo(ModeloVO $vo) {
        $conexao = parent::retornaConexao();

        $comando = Modelo_sql::AlterarModelo();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getNomeModelo());
        $sql->bindValue(2, $vo->getIdModelo());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirModelo($idModelo) {
        $conexao = parent::retornaConexao();

        $comando = Modelo_sql::ExcluirModelo();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $idModelo);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarModelo() {
        $conexao = parent::retornaConexao();

        $comando = Modelo_sql::ConsultarModelos();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

}
