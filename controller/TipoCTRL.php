<?php

require_once '../dao/TipoDAO.php';
require_once 'UtilCtrl.php';

class TipoCTRL {

    public function InserirTipo(TipoVO $vo) {
        if ($vo->getNomeTipo() == '') {
            return 0;
        }

        $vo->setIdUser(UtilCtrl::RetornarCodigoUserAdm());

        $dao = new TipoDAO();

        $ret = $dao->InserirTipo($vo);

        return $ret;
    }

    public function AlterarTipo(TipoVO $vo) {
        if ($vo->getNomeTipo() == '') {
            return 0;
        }
        
        $dao = new TipoDAO();

        return $dao->AlterarTipo($vo);

    }

    public function ExcluirTipo($id) {
        $dao = new TipoDAO();
        return $dao->ExcluirTipo($id);
    }

    public function ConsultarTipo() {
        $dao = new TipoDAO();

        return $dao->ConsultarTipo();
    }

}
