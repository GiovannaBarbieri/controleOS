<?php
require_once '../vo/EquipamentoVO.php';
require_once '../controller/EquipamentoCTRL.php';
require_once '../controller/ModeloCTRL.php';
require_once '../controller/TipoCTRL.php';
require_once '../controller/UtilCtrl.php';
UtilCtrl::VerTipoPermissao(1);

$ctrl_equip = new EquipamentoCTRL();
$ctrl_tipo = new TipoCTRL();
$ctrl_modelo = new ModeloCTRL();

if(isset($_GET['cod']) && is_numeric($_GET['cod'])){
    //pega o valor do codigo
    $cod = $_GET['cod'];
    
    //busca os detalhs do equipamento a ser alterados
    $dados = $ctrl_equip->DetalharEquipamento($cod);
    
    //verificar se ouve o registro retornado
    if(count($dados) == 0){
        header('location: adm_consultar_equipamento.php');
    }
}else if (isset($_POST['btnAlterar'])) {
    
    $vo = new EquipamentoVO();
    
    $vo->setDescricao($_POST['descricao']);
    $vo->setIdEquip($_POST['id']);
    $vo->setIdModelo($_POST['modelo']);
    $vo->setIdNovoTipo($_POST['tipo']);
    $vo->setIdentEquip($_POST['identificacao']);  

    $ret = $ctrl_equip->AlterarEquipamento($vo);
    header('location: adm_alterar_equipamento.php?cod=' . $_POST['id'] . '&ret=' . $ret);
}else{
    header('location: adm_consultar_equipamento.php');
}
$tipos = $ctrl_tipo->ConsultarTipo();
$modelos = $ctrl_modelo->ConsultarModelo();

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
                            if (isset($_GET['ret'])) {
                            ExibirMsg($_GET['ret']);
                            }
                            ?>

                            <h2>Alterar Equipamento</h2>   
                            <h5>Aqui você podera alterar seus equipamento</h5>

                        </div>
                    </div>
                    <hr />
                    <form method="post" action="adm_alterar_equipamento.php">
                        <input type="hidden" name="id" value="<?= $dados[0]['id_equipamento'] ?>" />
                        <div class="form-group" id="divTipo">
                            <label>Selecione o tipo de equipamento</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="">Selecione</option>
                                <?php for ($i=0; $i<count($tipos); $i++) {?>
                                <option value="<?= $tipos[$i]['id_novo_tipo'] ?>" <?= $tipos[$i]['id_novo_tipo'] == $dados[0]['id_novo_tipo'] ? 'selected'  : '' ?> ><?= $tipos[$i]['nome_tipo'] ?></option>
                                <?php }?>

                            </select>
                            <label id="val_tipo" class="Validar"></label>
                        </div>

                        <div class="form-group" id="divModelo">
                            <label>Modelo</label>
                            <select class="form-control" name="modelo" id="modelo">
                                <option value="">Selecione</option> 
                                <?php for ($i=0; $i<count($modelos); $i++) {?>
                                <option value="<?= $modelos[$i]['id_modelo'] ?>" <?= $modelos[$i]['id_modelo'] == $dados[0]['id_modelo'] ? 'selected'  : '' ?>> <?= $modelos[$i]['nome_modelo'] ?></option> 
                                <?php } ?>
                            </select>
                            <label id="val_modelo" class="Validar"></label>
                        </div>
                        <div class="form-group" id="divIdent">
                            <label>Identificação</label>
                            <input class="form-control" name="identificacao" id="identificacao" value="<?= $dados[0]['identificacao_equipamento'] ?>" placeholder="Digite aqui..." />
                            <label id="val_ident" class="Validar"></label>
                        </div>

                        <div class="form-group" id="divDescricao">
                            <label>Descrição</label>
                            <textarea class="form-control" rows="3" name="descricao" id="descricao"> <?= $dados[0]['descricao_equipamento'] ?> </textarea>
                            <label id="val_descricao" class="Validar"></label>
                        </div>

                        <button type="submit" class="btn btn-success" name="btnAlterar">Alterar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>



