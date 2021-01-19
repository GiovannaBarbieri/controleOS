<?php
require_once '../controller/EquipamentoCTRL.php';
require_once '../controller/ChamadoCTRL.php';
require_once '../vo/ChamadoVO.php';

$ctrl_equip = new EquipamentoCTRL();


if(isset($_POST['btnFinalizar'])){
    $vo = new ChamadoVO();
    $ctrl_ch = new ChamadoCTRL();
    
    $vo->setIdEquipamento($_POST['equip']);
    $vo->setDescricao($_POST['desc']);
    
    $ret = $ctrl_ch->AbrirChamado($vo);
}

$eqs = $ctrl_equip->FiltrarEquipamentoSetorChamado();
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
                                if(isset($ret)){
                                    ExibirMsg($ret);
                                }
                            ?>
                            <h2>Novo Chamado</h2>   
                            <h5>Aqui você poderá abrir um novo chamado</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />                  
                    <form method="post" action="func_novo_chamado.php">
                        <div class="form-group">
                            <label>Equipamento</label>
                            <select class="form-control" name="equip">
                                <option value="">Selecione</option>      
                                <?php for ($i = 0; $i < count($eqs); $i++) { ?>
                                    <option value="<?= $eqs[$i]['id_equipamento'] ?>">
                                        <?= $eqs[$i]['identificacao_equipamento'] ?> / <?= $eqs[$i]['descricao_equipamento'] ?>
                                    </option>  
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Descreva o problema</label>
                            <textarea class="form-control" rows="3" placeholder="Digite aqui..." name="desc"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success" name="btnFinalizar">Finalizar</button>
                    </form>
                </div>
            </div>
        </div>  
    </body>
</html>
