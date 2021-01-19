<?php

require_once 'Conexao.php';
require_once 'sql/Equipamento_sql.php';

class EquipamentoDAO extends Conexao {

    public function InserirEquipamento(EquipamentoVO $vo) {

        $conexao = parent::retornaConexao();

        $comando = Equipamento_sql::InserirEquipamento();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getIdentEquip());
        $sql->bindValue(2, $vo->getDescricao());
        $sql->bindValue(3, $vo->getIdNovoTipo());
        $sql->bindValue(4, $vo->getIdModelo());
        $sql->bindValue(5, $vo->getIdUsuario());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function FiltrarEquipamento($idUser, $idMod) {

        $conexao = parent::retornaConexao();

        $comando = Equipamento_sql::FiltrarEquipamento();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $idMod);
        $sql->bindValue(2, $idUser);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function ConsultarEquipamento($idAdm){
        $conexao = parent::retornaConexao();
        $comando = Equipamento_sql::ConsultarEquipamento();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idAdm);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();

        return $sql->fetchAll();
    }
    
    public function DetalharEquipamento($idEquip, $idUser) {

        $conexao = parent::retornaConexao();

        $comando = Equipamento_sql::DetalharEquipamento();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $idEquip);
        $sql->bindValue(2, $idUser);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function AlterarEquipamento(EquipamentoVO $vo) {
        $conexao = parent::retornaConexao();

        $comando = Equipamento_sql::AlterarEquipamento();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getIdentEquip());
        $sql->bindValue(2, $vo->getDescricao());
        $sql->bindValue(3, $vo->getIdNovoTipo());
        $sql->bindValue(4, $vo->getIdModelo());
        $sql->bindValue(5, $vo->getIdUsuario());
        $sql->bindValue(6, $vo->getIdEquip());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
    
     public function FiltrarEquipamentoDisponivel($idUser) {

        $conexao = parent::retornaConexao();

        $comando = Equipamento_sql::FiltrarEquipamentoDisponivel();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $idUser);
        $sql->bindValue(2, $idUser);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }
    
    public function FiltralEquipamentosSetor($idSetor) {
         $conexao = parent::retornaConexao();

        $comando = Equipamento_sql::FiltrarEquipamentoSetor();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $idSetor);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }
     public function FiltralEquipamentosSetorChamado($idSetor) {
         $conexao = parent::retornaConexao();

        $comando = Equipamento_sql::FiltrarEquipamentoSetorChamado();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $idSetor);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }
    
    public function AlocarSetorEquipamento(AlocarVO $vo) {

        $conexao = parent::retornaConexao();

        $comando = Equipamento_sql::AlocarSetorEquipamento();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getDataAloc());
        $sql->bindValue(2, $vo->getIdSetor());
        $sql->bindValue(3, $vo->getIdEquip());
        $sql->bindValue(4, $vo->getIdUser());


        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }
    
    public function RemoverEquipamentoSetor(AlocarVO $vo){
        $conexao = parent::retornaConexao();
        
        $comando = Equipamento_sql::RemoverEquipamentoSetor();
        
        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getDataRemov());
        $sql->bindValue(2, $vo->getIdAlocar());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}

    