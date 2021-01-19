<?php
require_once '../controller/EquipamentoCTRL.php';
require_once '../controller/ChamadoCTRL.php';
require_once '../controller/UtilCtrl.php';
UtilCtrl::VerTipoPermissao(1);

$ctrl_equip = new EquipamentoCTRL();
$idEquip = '';
if(isset($_POST['btnProcurar'])){
    $idEquip = $_POST['equip'];
    $ctrl_chamado = new ChamadoDAO();
    $res = $ctrl_chamado->DetalharHistoricoEquipamentoChamado($idEquip);
}

$equips = $ctrl_equip->ConsultarEquipamento();



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
                            <h2>Historico de chamados do equipamento</h2>   
                            <h5>Aqui você podera consultar seus chamados em PDF</h5>
                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />           
                    <form method="post" action="adm_historico_equipamento.php">
                        <div class="form-group" id="divTipo">
                            <label>Selecione o equipamento</label>
                            <select class="form-control" name="equipamento" id="equipamento">
                                <option value="">Selecione</option>
                                <?php for ($i = 0; $i < count($equips); $i++) { ?>
                                    <option value="<?= $equips[$i]['id_equipamento'] ?>" <?= $idEquip[0]['id_equipamento'] ?>>
                                        <?= $equips[$i]['identificacao_equipamento'] ?> / <?= $equips[$i]['descricao_equipamento'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                        <center>
                            <button type="submit" name="btnProcurar" class="btn btn-info" onclick="return Validar(8)">Procurar</button>
                        </center>
                    </form>
                    <hr />                   
                    <?php
                    if (isset($res)) {
                        if (count($res) > 0) {
                            ?>                    
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Advanced Tables -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                           Resultado Encontrado
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
                                                                    <a href="adm_alterar_equipamento.php?cod=<?= $equips[$i]['id_equipamento'] ?>" class="btn btn-warning btn-xs">Gerar PDF</a>
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
