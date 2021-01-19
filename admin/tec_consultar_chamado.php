<?php
require_once '../controller/ChamadoCTRL.php';
require_once '../controller/UtilCTRL.php';

$situacao = '';

if (isset($_POST['btnProcurar'])) {
    $ctrl = new ChamadoCTRL();

    $situacao = $_POST['situacao'];
    $chamados = $ctrl->FiltrarMeusChamadosTecnico($situacao);
}
?>
<!DOCTYPE html>
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
                            <h2>Consultar minhas OS</h2>   
                            <h5></h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="tec_consultar_chamado.php">
                        <div class="form-group">
                            <label>Situação</label>
                            <select class="form-control" name="situacao">
                                <option value="0" <?= $situacao == 0 ? 'selected' : '' ?>>Todos</option>  
                                <option value="1" <?= $situacao == 0 ? 'selected' : '' ?>>Aguardando Atendimento</option>
                                <option value="2" <?= $situacao == 0 ? 'selected' : '' ?>>Em adamento</option>
                                <option value="3" <?= $situacao == 0 ? 'selected' : '' ?>>Finalizado</option>
                            </select>
                        </div>

                        <center>
                            <button type="submit" name="btnProcurar" class="btn btn-info">Procurar</button>
                        </center>
                    </form>
                    <hr />
                    <?php if (isset($chamados)) { ?>
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Advanced Tables -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Listas de chamados
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                <thead>
                                                    <tr>
                                                        <th>Abertura</th>
                                                        <th>Equipamento</th>
                                                        <th>Problema</th>
                                                        <th>Situação Abertura</th>
                                                        <th>Técnico</th>
                                                        <th>Atendimento</th>
                                                        <th>Laudo</th>
                                                        <th>Ação</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php for ($i = 0; $i < count($chamados); $i++) { ?>
                                                        <tr class="odd gradeX">
                                                            <td><?= UtilCtrl::MostrarData($chamados[$i]['data_abertura']) ?> <i>às</i> <?= UtilCtrl::MostraHora($chamados[$i]['hora_abertura']) ?></td>
                                                            <td><?= $chamados[$i]['identificacao_equipamento'] ?> / <?= $chamados[$i]['descricao_equipamento'] ?></td>
                                                            <td><?= $chamados[$i]['descricao_problema'] ?></td>
                                                            <td><?= UtilCtrl::RetornaSituacao($chamados[$i]['situacao_chamado']) ?></td>
                                                            <td><?= $chamados[$i]['nome_tecnico'] == '' ? '---' : $chamados[$i]['nome_tecnico'] ?></td> 
                                                            <td><?= $chamados[$i]['data_atendimento'] == '' ? '---' : UtilCtrl::MostrarData($chamados[$i]['data_atendimento']) . '<i>às</i>' . UtilCtrl::MostraHora($chamados[$i]['hora_atendimento']) ?></td>
                                                            <td><?= $chamados[$i]['laudo_atendimento'] == '' ? '---' : $chamados[$i]['laudo_atendimento'] ?></td>
                                                            <td>
                                                                <?php if ($chamados[$i]['situacao_chamado'] == 3) { ?>
                                                                    <?= UtilCtrl::RetornaSituacao($chamados[$i]['situacao_chamado']) ?>
                                                                <?php }else if($chamados[$i]['situacao_chamado'] == 1) { ?>
                                                                <a href="tec_atender_chamado.php?cod=<?= $chamados[$i]['id_chamado']?>" class="btn btn-warning btn-xs">Atender</a>
                                                                <?php }else if($chamados[$i]['situacao_chamado'] == 2) { ?>
                                                                <a href="tec_atender_chamado.php?cod=<?= $chamados[$i]['id_chamado']?>" class="btn btn-success btn-xs">Finalizar</a>
                                                                <?php } ?>
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
                    <?php } ?>
                </div>
                <!-- /. PAGE INNER  -->
            </div>
            <!-- /. PAGE WRAPPER  -->
        </div>
    </body>
</html>
