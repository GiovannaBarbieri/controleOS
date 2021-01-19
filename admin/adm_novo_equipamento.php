<?php
require_once '../vo/EquipamentoVO.php';
require_once '../controller/EquipamentoCTRL.php';
require_once '../controller/TipoCTRL.php';
require_once '../controller/ModeloCTRL.php';
require_once '../controller/UtilCtrl.php';
UtilCtrl::VerTipoPermissao(1);

$ctrl = new EquipamentoCTRL();
$ctrl_mod = new ModeloCTRL();
$ctrl_tip = new TipoCTRL();

if (isset($_POST['btnSalvar'])) {
    $tipo = $_POST['tipo'];
    $modelo = $_POST['modelo'];
    $identificacao = $_POST['identificacao'];
    $descricao = $_POST['descricao'];
    
    $vo = new EquipamentoVO();

    $vo->setIdNovoTipo($tipo);
    $vo->setIdModelo($modelo);
    $vo->setIdentEquip($identificacao);
    $vo->setDescricao($descricao);

    $ret = $ctrl->InserirEquipamento($vo);
}

$modelos = $ctrl_mod->ConsultarModelo();
$tipos = $ctrl_tip->ConsultarTipo();

?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once '_head.php'; ?>
    </head>
    <body>
        <div id="wrapper">
            <?php
            include_once '_topo.php';
            include_once '_menu.php';
            ?>
            <div id="page-wrapper" >
                <div id="page-inner">
                    <div class="row">
                        <div class="col-md-12">

                            <?php
                            if (isset($ret)) {
                                ExibirMsg($ret);
                            }
                            ?>

                            <h2>Novo Equipamento</h2>   
                            <h5>Aqui você podera cadastrar seus equipamentos</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="adm_novo_equipamento.php">
                        <div class="form-group" id="divTipo">
                            <label>Selecione o tipo de equipamento</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="">Selecione</option>
                                <?php for ($i=0; $i<count($tipos); $i++) {?>
                                <option value="<?= $tipos[$i]['id_novo_tipo'] ?>"><?= $tipos[$i]['nome_tipo'] ?></option>
                                <?php }?>

                            </select>
                            <label id="val_tipo" class="Validar"></label>
                        </div>

                        <div class="form-group" id="divModelo">
                            <label>Modelo</label>
                            <select class="form-control" name="modelo" id="modelo">
                                <option value="">Selecione</option> 
                                <?php for ($i=0; $i<count($modelos); $i++) {?>
                                <option value="<?= $modelos[$i]['id_modelo'] ?>"><?= $modelos[$i]['nome_modelo'] ?></option> 
                                <?php } ?>
                            </select>
                            <label id="val_modelo" class="Validar"></label>
                        </div>

                        <div class="form-group" id="divIdent">
                            <label>Identificação</label>
                            <input class="form-control" name="identificacao" id="identificacao" placeholder="Digite aqui..." />                           
                            <label id="val_ident" class="Validar"></label>
                        </div>
                        

                        <div class="form-group" id="divDescricao">
                            <label>Descrição</label>
                            <textarea class="form-control" rows="3" name="descricao" id="descricao"></textarea>
                            <label id="val_descricao" class="Validar"></label>
                        </div>

                        <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return Validar(7)" >Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
