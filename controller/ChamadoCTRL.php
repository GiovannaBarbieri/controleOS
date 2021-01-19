<?php
require_once '../dao/ChamadoDAO.php';
require_once 'UtilCtrl.php';

class ChamadoCTRL {
    public function AbrirChamado(ChamadoVO $vo){
        if($vo->getDescricao() == '' || $vo->getIdEquipamento() == ''){
            return 0;
        }
        
        $vo->setIdFuncSetor(UtilCtrl::ReornarIdFunc());
        $vo->setDataAbert(UtilCtrl::DataAtual());
        $vo->setHoraAbertura(UtilCtrl::HoraAtual());
        $vo->setSituacao(1);
        
        $dao = new ChamadoDAO();
        
        $ret = $dao->AbrirChamado($vo);
        
        return $ret;
    }
    
    public function ResultadoGrafico(){
        $dao = new ChamadoDAO();
        return $dao->ResultadoGrafico();
    }
    public function DetalharHistoricoEquipamentoChamado($idEquip){
        $dao = new ChamadoDAO();
        return $dao->DetalharHistoricoEquipamentoChamado($idEquip);
    }

    public function FiltrarMeusChamados($sit){
        $dao = new ChamadoDAO();
        
        return $dao->FiltrarMeusChamados(UtilCtrl::ReornarIdFunc(), $sit);
    }
    public function AbrirChamadoTecnico(ChamadoVO $vo){
        if($vo->getDescricao() == '' || $vo->getIdEquipamento() == ''){
            return 0;
        }
        
        $vo->setIdFuncSetor(UtilCtrl::ReornarIdFunc());
        $vo->setDataAbert(UtilCtrl::DataAtual());
        $vo->setHoraAbertura(UtilCtrl::HoraAtual());
        $vo->setSituacao(1);
        
        $dao = new ChamadoDAO();
        
        $ret = $dao->AbrirChamado($vo);
        
        return $ret;
    }
    public function FiltrarMeusChamadosTecnico($sit){
        $dao = new ChamadoDAO();
        
        return $dao->FiltrarMeusChamadosTecnico($sit);
    }
    
    public function AtenderChamado(ChamadoVO $vo){
        $vo->setDataAtend(UtilCtrl::DataAtual());
        $vo->setHoraAtend(UtilCtrl::HoraAtual());
        $vo->setIdFuncTec(UtilCtrl::ReornarIdFunc());
        $vo->setSituacao(2);
        $dao = new ChamadoDAO();
        return $dao->AtenderChamado($vo);
    }
    public function FinalizarChamado(ChamadoVO $vo){
        $vo->setDataAtend(UtilCtrl::DataAtual());
        $vo->setHoraAtend(UtilCtrl::HoraAtual());
        $vo->setIdFuncTec(UtilCtrl::ReornarIdFunc());
        $vo->setSituacao(3);
        $dao = new ChamadoDAO();
        return $dao->FinalizarChamado($vo);
    }
    public function DetalharChamado($id){
        $dao = new ChamadoDAO();
        return $dao->DetalharChamado($id);
    }
  
     
}
