<?php
require_once '../vo/EquipamentoVO.php';
require_once '../controller/ModeloCTRL.php';
require_once '../controller/EquipamentoCTRL.php';
require_once '../controller/UtilCtrl.php';
UtilCtrl::VerTipoPermissao();

$ctrl_mod = new ModeloCTRL();
$mod = '';

if (isset($_POST['btnProcurar'])) {
    $ctrl_equ = new EquipamentoCTRL();
    $mod = $_POST['modelo'];
    $equips = $ctrl_equ->FiltrarEquipamento($mod);
}
$modelos = $ctrl_mod->ConsultarModelo();
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
                            <h2>Consultar Equipamento</h2>   
                            <h5></h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />           
                    <form method="post" action="adm_consultar_equipamento.php">
                        <div class="form-group" id="divRever">
                            <label>Modelo</label>
                            <select class="form-control" name="modelo" id="modelo">                            
                                <option value="">Selecione</option>
                                <?php
                                for ($i = 0; $i < count($modelos); $i++) {
                                    ?>
                                    <option value="<?= $modelos[$i]['id_modelo'] ?>" <?= $mod == $modelos[$i]['id_modelo'] ? 'selected' : '' ?> ><?= $modelos[$i]['nome_modelo'] ?></option>
                                <?php } ?>            
                            </select>
                            <label id="val_rever" class="Validar"></label>
                        </div>
                        <center>
                            <button type="submit" name="btnProcurar" class="btn btn-info" onclick="return Validar(8)">Procurar</button>
                        </center>
                    </form>
                    <hr />                   
                    <?php
                    if (isset($equips)) {
                        if (count($equips) > 0) {
                            ?>                    
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Advanced Tables -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Consultar Equipamento
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Tipo</th>
                                                            <th>Modelo</th>
                                                            <th>Identificação</th>
                                                            <th>Descrição</th>
                                                            <th>Ação</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php for ($i = 0; $i < count($equips); $i++) { ?>
                                                            <tr class="odd gradeX">
                                                                <td><?= $equips[$i]['nome_tipo'] ?></td>
                                                                <td><?= $equips[$i]['nome_modelo'] ?></td>
                                                                <td><?= $equips[$i]['identificacao_equipamento'] ?></td>
                                                                <td><?= $equips[$i]['descricao_equipamento'] ?></td>
                                                                <td>
                                                                    <a href="adm_alterar_equipamento.php?cod=<?= $equips[$i]['id_equipamento'] ?>" class="btn btn-warning btn-xs">Alterar</a>
                                                                </td>

                                                            </tr>
                                                        <?php } ?>

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                    </div>
                                    <!--End Advanced Tables -->
                                </div>
                            </div>
                            <?php
                        } else {
                            ExibirMsg(2);
                        }
                        ?>
                    <?php } ?>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
    </body>
</html>
