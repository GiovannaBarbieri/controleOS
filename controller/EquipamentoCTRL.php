<?php

require_once '../dao/EquipamentoDAO.php';
require_once 'UtilCtrl.php';

class EquipamentoCTRL {

    public function InserirEquipamento(EquipamentoVO $vo) {

        if ($vo->getIdentEquip() == '' || $vo->getDescricao() == '' || $vo->getIdNovoTipo() == '' || $vo->getIdModelo() == '') {
            return 0;
        }

        $vo->setIdUsuario(UtilCtrl::RetornarCodigoUserAdm());

        $dao = new EquipamentoDAO();

        $ret = $dao->InserirEquipamento($vo);

        return $ret;
    }

    public function FiltrarEquipamento($idMod) {
        $dao = new EquipamentoDAO();
        return $dao->FiltrarEquipamento(UtilCtrl::RetornarCodigoUserAdm(), $idMod);
    }
    
    public function FiltrarEquipamentoSetorChamado() {
        $dao = new EquipamentoDAO();

        return $dao->FiltralEquipamentosSetorChamado(UtilCtrl::ReornarIdSetor());
    }

    public function DetalharEquipamento($idEquip) {
        $dao = new EquipamentoDAO();
        return $dao->DetalharEquipamento($idEquip, UtilCtrl::RetornarCodigoUserAdm());
    }
    
     public function ConsultarEquipamento(){
        $dao = new EquipamentoDAO();
        return $dao->ConsultarEquipamento(UtilCtrl::RetornarCodigoUserAdm());
    }

    public function AlterarEquipamento(EquipamentoVO $vo) {
        if ($vo->getIdNovoTipo() == '') {
            return 0;
        }
        if ($vo->getIdModelo() == '') {
            return -1;
        }
        if ($vo->getIdentEquip() == '') {
            return -2;
        }
        if ($vo->getDescricao() == '') {
            return -3;
        }

        $vo->setIdUsuario(UtilCtrl::RetornarCodigoUserAdm());

        $dao = new EquipamentoDAO();

        return $dao->AlterarEquipamento($vo);
    }

    public function FiltrarEquipamentoDisponivel() {
        $dao = new EquipamentoDAO();

        return $dao->FiltrarEquipamentoDisponivel(UtilCtrl::RetornarCodigoUserAdm());
    }

    public function FiltrarEquipamentoSetor($idSetor) {
        $dao = new EquipamentoDAO();

        return $dao->FiltralEquipamentosSetor($idSetor);
    }

    public function AlocarSetorEquipamento(AlocarVO $vo) {
        $vo->setDataAloc(UtilCtrl::DataAtual());
        $vo->setIdUser(UtilCtrl::RetornarCodigoUserAdm());
        $dao = new EquipamentoDAO();
        return $dao->AlocarSetorEquipamento($vo);
    }
    
    public function RemoverEquipamentoSetor(AlocarVO $vo){
        $dao = new EquipamentoDAO();
        
        $vo->setDataRemov(UtilCtrl::DataAtual());
        
        return $dao->RemoverEquipamentoSetor($vo);
    }

}
