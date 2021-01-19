<?php

require_once 'Conexao.php';
require_once 'sql/Tipo_sql.php';

class TipoDAO extends Conexao {

    public function InserirTipo(TipoVO $vo) {
        $conexao = parent::retornaConexao();

        $comando = Tipo_sql::InserirTipo();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getNomeTipo());
        $sql->bindValue(2, $vo->getIdUser());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function AlterarTipo(TipoVO $vo) {
        $conexao = parent::retornaConexao();

        $comando = Tipo_sql::AlterarTipo();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getNomeTipo());
        $sql->bindValue(2, $vo->getIdNovoTipo());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirTipo($idNovoTipo) {
        $conexao = parent::retornaConexao();
        
        $comando = Tipo_sql::ExcluirTipo();
        
        $sql = new PDOStatement();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idNovoTipo);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarTipo() {
        $conexao = parent::retornaConexao();

        $comando = Tipo_sql::ConsultarTipo();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

}
