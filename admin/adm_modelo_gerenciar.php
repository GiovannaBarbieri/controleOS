<?php
require_once '../vo/ModeloVO.php';
require_once '../controller/ModeloCTRL.php';
require_once '../controller/UtilCtrl.php';
UtilCtrl::VerTipoPermissao(1);

$ctrl = new ModeloCTRL();

if (isset($_POST['btnSalvar'])) {
    $nomeModelo = $_POST['nomeModelo'];
    $vo = new ModeloVO();

    $vo->setNomeModelo($nomeModelo);

    $ret = $ctrl->InserirModelo($vo);
} else if (isset($_POST['btnAlterar'])) {
    $vo = new ModeloVO();

    $vo->setIdModelo($_POST['cod']);
    $vo->setNomeModelo($_POST['nome_alt']);

    $ret = $ctrl->AlterarModelo($vo);
} else if (isset($_POST['btnExcluir'])) {
    $id = $_POST['cod'];
    $ret = $ctrl->ExcluirModelo($id);
}

$modelos = $ctrl->ConsultarModelo();
?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once '_head.php'; ?>
        <script src="assets/js/gerenciar_modelo_js.js" type="text/javascript"></script>
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

                            <h2>Novo Modelo</h2>   
                            <h5>Gerencie todos os modelos nesta página</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="adm_modelo_gerenciar.php">
                        <div class="form-group" id="divNomeModelo">
                            <label>Nome do modelo</label>
                            <input class="form-control" name="nomeModelo" id="nomeModelo" placeholder="Digite aqui..." />
                            <label id="val_nomeModelo" class="Validar"></label>
                        </div>
                        <button type="submit" name="btnSalvar" class="btn btn-success" onclick="return InserirModeloAjax()" >Salvar</button>
                    </form>

                    <hr />
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Modelos Cadastrados
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
                                                <?php for ($i = 0; $i < count($modelos); $i++) { ?>
                                                    <tr class="odd gradeX">
                                                        <td><?= $modelos[$i]['nome_modelo'] ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modAlterar" onclick="return AlterarDados('<?= $modelos[$i]['nome_modelo'] ?>', <?= $modelos[$i]['id_modelo'] ?>)">Alterar</a>
                                                            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modExcluir" onclick="return CarregarDadosExclusao('<?= $modelos[$i]['nome_modelo'] ?>', <?= $modelos[$i]['id_modelo'] ?>)">Excluir</a>
                                                        </td>

                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>

                                        <div class="modal fade" id="modAlterar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title" id="myModalLabel">Alterar Modelo</h4>
                                                    </div>
                                                    <form method="post" action="adm_modelo_gerenciar.php">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input type="hidden" name="cod" id="cod" />
                                                                <label>Nome do Modelo</label>
                                                                <input class="form-control" name="nome_alt" id="nome_alt"/>  
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                            <button class="btn btn-primary" name="btnAlterar">Salvar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form method="post" action="adm_modelo_gerenciar.php">
                                            <?php
                                            include_once '_modal_exclusao.php';
                                            ?>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            <!--End Advanced Tables -->
                        </div>
                    </div>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>

        <script>

            function AlterarDados(nome, id) {
                $("#nome_alt").val(nome);
                $("#cod").val(id);
            }
            function InserirModeloAjax() {
                if (Validar(6) == true) {
                    //chama AJAX
                    InserirModelo();
                }
            }
            return false;

        </script>

    </body>
</html>
