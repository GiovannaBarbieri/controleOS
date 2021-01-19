<?php
require_once 'Conexao.php';
require_once 'sql/Chamado_sql.php';

class ChamadoDAO extends Conexao{
    
    public function AbrirChamado(ChamadoVO $vo){
        $conexao = parent::retornaConexao();
        $comando = Chamado_sql::AbrirChamado();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $vo->getDataAbert());
        $sql->bindValue(2, $vo->getHoraAbert());
        $sql->bindValue(3, $vo->getDescricao());
        $sql->bindValue(4, $vo->getSituacao());
        $sql->bindValue(5, $vo->getIdEquipamento());
        $sql->bindValue(6, $vo->getIdFuncSertor());
        
        try{
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }
    
    public function ResultadoGrafico(){
        $conexao = parent::retornaConexao();
        
        $comando = Chamado_sql::ResultadoGrafico();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        
        return $sql->fetchAll();
    }
    
    public function DetalharHistoricoEquipamentoChamado($idEquip){
        $conexao = parent::retornaConexao();
        
        $comando = Chamado_sql::DetalharHistoricoEquipamentoChamado();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        $sql->bindValue(1, $idEquip);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        
        return $sql->fetchAll();
    }

    public function AbrirChamadoTecnico(ChamadoVO $vo){
        $conexao = parent::retornaConexao();
        $comando = Chamado_sql::AbrirChamadoTecnico();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $vo->getDataAbert());
        $sql->bindValue(2, $vo->getHoraAbert());
        $sql->bindValue(3, $vo->getDescricao());
        $sql->bindValue(4, $vo->getSituacao());
        $sql->bindValue(5, $vo->getIdEquipamento());
        $sql->bindValue(6, $vo->getIdFuncSertor());
        
        try{
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }
    public function FiltrarMeusChamados($idFunc, $sit){
        $conexao = parent::retornaConexao();
        $comando = Chamado_sql::FiltrarMeusChamados($sit);
        
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idFunc);
        
        if($sit != '0'){
            $sql->bindValue(2, $sit);
        }
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }
    public function FiltrarMeusChamadosTecnico($sit){
        $conexao = parent::retornaConexao();
        $comando = Chamado_sql::FiltrarMeusChamadosTecnico($sit);
        
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
       
        if($sit != '0'){
            $sql->bindValue(1, $sit);
        }
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        return $sql->fetchAll();
    }
    
    public function DetalharChamado($id){
        $conexao = parent::retornaConexao();
        
        $comando = Chamado_sql::DetalharChamados();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
         $sql->bindValue(1, $id);
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    
    public function AtenderChamado(ChamadoVO $vo){
        $conexao = parent::retornaConexao();
        $comando = Chamado_sql::AtenderChamado();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $vo->getSituacao());
        $sql->bindValue(2, $vo->getDataAtend());
        $sql->bindValue(3, $vo->getHoraAtend());
        $sql->bindValue(4, $vo->getFuncTec());
        $sql->bindValue(5, $vo->getIdChamado());
        
        try{
            $sql->execute();
            return 3;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }
    
    public function FinalizarChamado(ChamadoVO $vo){
        $conexao = parent::retornaConexao();
        $comando = Chamado_sql::FinalizarChamado();
        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $vo->getSituacao());
        $sql->bindValue(2, $vo->getDataAtend());
        $sql->bindValue(3, $vo->getHoraAtend());
        $sql->bindValue(4, $vo->getFuncTec());
        $sql->bindValue(5, $vo->getLaudo());
        $sql->bindValue(6, $vo->getIdChamado());
        
        try{
            $sql->execute();
            return 4;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }
    
}
