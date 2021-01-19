<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/dao/SetorDAO.php';
require_once 'UtilCtrl.php';

class SetorCTRL {

    public function InserirSetor(SetorVO $vo) {

        if ($vo->getNomeSetor() == '') {
            return 0;
        }

        $vo->setIdUser(UtilCtrl::RetornarCodigoUserAdm());

        $dao = new SetorDAO();

        $ret = $dao->IserirSetor($vo);

        return $ret;
    }

    public function AlterarSetor(SetorVO $vo) {
        if ($vo->getNomeSetor() == '') {
            return 0;
        }
        $vo->setIdUser(UtilCtrl::RetornarCodigoUserAdm());

        $dao = new SetorDAO();

        $ret = $dao->AlterarSetor($vo);

        return $ret;
    }

    public function ExcluirSetor($id) {
        
        $dao = new SetorDAO();
        return $dao->ExcluirSetor($id);
    }

    public function ConsultarSetor() {

        $dao = new SetorDAO();

        return $dao->ConsultarSetor();
    }

}
