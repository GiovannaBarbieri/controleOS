<?php

require_once '../dao/ModeloDAO.php';
require_once 'UtilCtrl.php';

class ModeloCTRL {

    public function InserirModelo(ModeloVO $vo) {

        if ($vo->getNomeModelo() == '') {
            return 0;
        }

        $vo->setIdUsuario(UtilCtrl::RetornarCodigoUserAdm());

        $dao = new ModeloDAO();

        $ret = $dao->InserirModelo($vo);

        return $ret;
    }

    public function AlterarModelo(ModeloVO $vo) {
        if($vo->getNomeModelo() == ''){
            return 0;
        }
        
        $dao = new ModeloDAO();
        
        return $dao->AlterarModelo($vo);
        
    }

    public function ExcluirModelo($id) {
        $dao = new ModeloDAO();
        return $dao->ExcluirModelo($id);
    }

    public function ConsultarModelo() {
        $dao = new ModeloDAO();

        return $dao->ConsultarModelo();
    }

}
