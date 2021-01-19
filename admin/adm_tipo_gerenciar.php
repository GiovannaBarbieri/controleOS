<?php
require_once '../vo/TipoVO.php';
require_once '../controller/TipoCTRL.php';
require_once '../controller/UtilCtrl.php';
UtilCtrl::VerTipoPermissao(1);

$ctrl = new TipoCTRL();

if (isset($_POST['btnSalvar'])) {
    $nomeTipo = $_POST['nomeTipo'];
    $vo = new TipoVO();

    $vo->setNomeTipo($nomeTipo);

    $ret = $ctrl->InserirTipo($vo);
} else if (isset($_POST['btnAlterar'])) {
    $vo = new TipoVO();

    $vo->setIdNovoTipo($_POST['cod']);
    $vo->setNomeTipo($_POST['nome_alt']);

    $ret = $ctrl->AlterarTipo($vo);
} else if (isset($_POST['btnExcluir'])) {
    $id = $_POST['cod'];
    $ret = $ctrl->ExcluirTipo($id);
}

$tipos = $ctrl->ConsultarTipo();

//echo '<pre>';
//print_r($tipos);
//echo '</pre>';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
        include_once '_head.php';
        ?>
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
                            <h2>Novo Tipo Equipamento</h2>   
                            <h5>Gerencie os tipos nesta página</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="adm_tipo_gerenciar.php">
                        <div class="form-group" id="divNomeTipo">
                            <label>Nome do tipo</label>
                            <input class="form-control" name="nomeTipo" id="nomeTipo" />
                            <label id="val_nomeTipo" class="Validar"></label>
                        </div>

                        <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return Validar(5)" >Salvar</button>
                    </form>

                    <hr/>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Advanced Tables -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tipos Cadastrados
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
                                                <?php for ($i = 0; $i < count($tipos); $i++) { ?>
                                                    <tr class="odd gradeX">
                                                        <td><?= $tipos[$i]['nome_tipo'] ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modAlterar" onclick="return AlterarDados('<?= $tipos[$i]['nome_tipo'] ?>', <?= $tipos[$i]['id_novo_tipo'] ?>)">Alterar</a>
                                                            <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modExcluir" onclick="return CarregarDadosExclusao('<?= $tipos[$i]['nome_tipo'] ?>', <?= $tipos[$i]['id_novo_tipo'] ?>)">Excluir</a>
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
                                                        <h4 class="modal-title" id="myModalLabel">Alterar Tipo</h4>
                                                    </div>
                                                    <form method="post" action="adm_tipo_gerenciar.php">
                                                        <div class="modal-body">
                                                            <div class="form-group" id="divTipo">
                                                                <input type="hidden" name="cod" id="cod" />
                                                                <label>Nome do Tipo</label>
                                                                <input class="form-control" name="nome_alt" id="nome_alt"/>
                                                                <label id="val_tipo" class="Validar"></label>
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

                                        <form method="post" action="adm_tipo_gerenciar.php">
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

        </script>

    </body>
</html>
