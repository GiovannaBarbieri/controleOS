<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/vo/ModeloVO.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/controller/ModeloCTRL.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/admin/_msn.php';

if(isset($_POST['nome']) && $_POST['acao'] == 'I'){
    $ctrl = new ModeloCTRL();
    $nome = $_POST['nome'];
    $vo = new ModeloVO();
    
    $vo->setNomeModelo($nome);
    $ret = $ctrl->InserirModelo($vo);
    
    ExibirMsg($ret);
}

