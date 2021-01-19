<?php
require_once '../vo/EquipamentoVO.php';
require_once '../controller/EquipamentoCTRL.php';
require_once '../controller/SetorCTRL.php';
require_once '../vo/AlocarVo.php';
require_once '../controller/UtilCtrl.php';
UtilCtrl::VerTipoPermissao(1);

$ctrl_set = new SetorCTRL();
$idsetor = '';

if (isset($_POST['btnPesquisar'])) {
    $ctrl_equip = new EquipamentoCTRL();

    $idsetor = $_POST['setor'];
    $equipamentos = $ctrl_equip->FiltrarEquipamentoSetor($idsetor);
}else if (isset ($_POST['btnRemover'])) {
    $vo = new AlocarVO();
    $ctrl_equip = new EquipamentoCTRL();
    
    $vo->setIdAlocar($_POST['codAloc']);
    $ret = $ctrl_equip->RemoverEquipamentoSetor($vo);
}

$setores = $ctrl_set->ConsultarSetor();
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
                            <h2>Remover equipamento</h2>   
                            <h5>Aqui você poderá consultar e alterar seus equipamentos</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="adm_remover_equipamento.php">
                        <div class="form-group" id="divSetor">
                            <label>Setor</label>
                            <select class="form-control" name="setor" id="setor">
                                <option value="">Selecione</option>                 
                                <?php for ($i = 0; $i < count($setores); $i++) { ?>
                                    <option value="<?= $setores[$i]['id_setor'] ?>" <?= $setores[$i]['id_setor'] == $idsetor ? 'selected' : '' ?>>
                                        <?= $setores[$i]['nome_setor'] ?>
                                    </option>
                                <?php } ?>

                            </select>
                            <label id="val_setor" class="Validar"></label>
                        </div>

                        <center>
                            <button type="submit" name="btnPesquisar" class="btn btn-info" onclick="return Validar(11)">Pesquisar</button>
                        </center>
                    </form>

                    <?php if (isset($equipamentos)) { ?>

                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Advanced Tables -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Remover equipamento
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>Nome</th>
                                                        <th>Ação</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php for($i=0; $i<count($equipamentos); $i++) { ?>
                                                    <tr class="odd gradeX">
                                                        <td><?= $equipamentos[$i]['identificacao_equipamento'] ?> - <?= $equipamentos[$i]['descricao_equipamento'] ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modRemover" onclick="AbrirRemover('<?= $equipamentos[$i]['identificacao_equipamento'] ?> - <?= $equipamentos[$i]['descricao_equipamento'] ?> ', '<?= $equipamentos[$i]['id_alocar'] ?>')" >Remover</a>
                                                        </td>

                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            
                                            <div class="modal fade" id="modRemover" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Remover Equipamento</h4>
                                                    </div>
                                                    <form method="post" action="adm_remover_equipamento.php">
                                                        <div class="modal-body">
                                                            <div class="form-group" id="divTipo">
                                                                <input type="hidden" name="codAloc" id="codAloc" />
                                                                Deseja remover o equipamento:<b><label id="equip_remove"></b>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                            <button class="btn btn-primary" name="btnRemover">Confirmar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                            
                                        </div>

                                    </div>
                                </div>
                                <!--End Advanced Tables -->
                            </div>
                        </div>

                    <?php } ?>

                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
    </body>
</html>
