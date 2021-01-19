<?php
require_once '../vo/SetorVO.php';
require_once '../controller/SetorCTRL.php';
require_once '../controller/UtilCtrl.php';
UtilCtrl::VerTipoPermissao(1);

$ctrl = new SetorCTRL();

if (isset($_POST['btnSalvar'])) {
    $nome = $_POST['nome'];
    $vo = new SetorVO();

    $vo->setNomeSetor($nome);

    $ret = $ctrl->InserirSetor($vo);
} else if (isset($_POST['btnAlterar'])) {
    $vo = new SetorVO();

    $vo->setIdSetor($_POST['cod']);
    $vo->setNomeSetor($_POST['nome_alt']);

    $ret = $ctrl->AlterarSetor($vo);
} else if (isset($_POST['btnExcluir'])) {
    $id = $_POST['cod'];
    $ret = $ctrl->ExcluirSetor($id);
}

$setores = $ctrl->ConsultarSetor();


//echo '<pre>';
//print_r($setores);
//echo '</pre>';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include_once '_head.php';
        ?>
        <script src="assets/js/gerenciar_setor_js.js" type="text/javascript"></script>
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
                            <div id="msg">
                            <?php
                            if (isset($ret)) {

                                ExibirMsg($ret);
                            }
                            ?>
                                </div>
                            <h2>Novo setor</h2>   
                            <h5>Cadastre um novo setor nesta página</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="adm_setor_gerenciar.php">
                        <div class="form-group" id="divNome">
                            <label>Nome do setor</label>
                            <input class="form-control" placeholder="Digite o novo nome do setor"  name="nome" id="nome"/>
                            <label id="val_nome" class="Validar"></label>
                        </div>

                        <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return InserirSetorAjax()" >Salvar</button>
                    </form>

                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Setores Cadastrados
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="tabSetores">
                                            <thead>
                                                <tr>
                                                    <th>Nome</th>
                                                    <th>Ação</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for ($i = 0; $i < count($setores); $i++) { ?>
                                                    <tr class="odd gradeX">
                                                        <td><?= $setores[$i]['nome_setor'] ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modAlterar" onclick="return AlterarDados('<?= $setores[$i]['nome_setor'] ?>', <?= $setores[$i]['id_setor'] ?>)">Alterar</a>
                                                            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modExcluir" onclick="return CarregarDadosExclusao('<?= $setores[$i]['nome_setor'] ?>', <?= $setores[$i]['id_setor'] ?>)">Excluir</a>
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
                                                        <h4 class="modal-title" id="myModalLabel">Alterar Setor</h4>
                                                    </div>
                                                    <form method="post" action="adm_setor_gerenciar.php">
                                                        <div class="modal-body">
                                                            <div class="form-group" id="divNome">
                                                                <input type="hidden" name="cod" id="cod" />
                                                                <label>Nome do setor</label>
                                                                <input class="form-control" placeholder="Digite o novo nome do setor"  name="nome_alt" id="nome_alt"/>
                                                                <label id="val_nome" class="Validar"></label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                            <button class="btn btn-primary" name="btnAlterar">Salvar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <form method="post" action="adm_setor_gerenciar.php">
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
                    <!-- /. ROW  -->

                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
        <!-- /. WRAPPER  -->
        <script>
            function AlterarDados(nome, id) {
                $("#nome_alt").val(nome);
                $("#cod").val(id);
            }

            function InserirSetorAjax() {
                if (Validar(1) == true) {
                       //chama AJAX
                       InserirSetor();              
                }
            }
            return false;
        </script>
    </body>
</html>
