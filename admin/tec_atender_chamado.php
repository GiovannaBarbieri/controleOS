<?php
require_once '../controller/ChamadoCTRL.php';
require_once '../vo/ChamadoVO.php';
require_once '../controller/UtilCtrl.php';

$ctrl = new ChamadoCTRL();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {

    $cod = $_GET['cod'];
    $dados = $ctrl->DetalharChamado($cod);

    if (count($dados) == 0) {
        header('location: tec_consultar_chamado.php');
    }
} else if (isset($_POST['btnAtender'])) {
    $cod = $_POST['cod'];
    $vo = new ChamadoVO();
    $vo->setIdChamado($cod);

    $ret = $ctrl->AtenderChamado($vo);
    header('location: tec_atender_chamado.php?cod=' . $cod . '&ret=' . $ret);
} else if (isset($_POST['btnFinalizar'])) {
    $cod = $_POST['cod'];
    $vo = new ChamadoVO();

    $vo->setIdChamado($cod);
    $vo->setLaudo($_POST['laudo']);
    $ret = $ctrl->FinalizarChamado($vo);
    header('location: tec_atender_chamado.php?cod=' . $cod . '&ret=' . $ret);
} else {
    header('location: tec_consultar_chamado.php');
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
                            <?php
                            if (isset($_GET['ret'])) {
                                ExibirMsg($_GET['ret']);
                            }
                            ?>
                            <h2>Atender Chamado</h2>   
                            <h5></h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />                  
                    <div class="form-group col-lg-6">
                        <label>Data:</label>
                        <input value="<?= UtilCtrl::MostrarData($dados[0]['data_abertura']) ?>" class="form-control" id="data" name="data" type="text" disabled />
                    </div>

                    <div class="form-group col-lg-6">
                        <label >Setor:</label>
                        <input value="<?= $dados[0]['nome_setor'] ?>" class="form-control" id="setor" name="setor" type="text" disabled="true" />
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="disabledSelect">Funcionário:</label>
                        <input class="form-control" id="funcionario" name="funcionario" value="<?= $dados[0]['nome_func_setor'] ?>" type="text" disabled="true" />
                    </div>

                    <div class="form-group col-lg-6">
                        <label for="disabledSelect">Equipamento:</label>
                        <input class="form-control" id="equipamento" name="equipamento" value="<?= $dados[0]['identificacao_equipamento'] . ' - ' . $dados[0]['descricao_equipamento'] ?>" />
                    </div>

                    <div class="form-group">
                        <label>Descrição do problema</label>
                        <textarea class="form-control" disabled="true" placeholder="Digite aqui" value="<?= $dados[0]['descricao_problema'] ?>"></textarea>
                    </div>
                    <form method="post" action="tec_atender_chamado.php">
                        <input type="hidden" name="cod" value="<?= $dados[0]['id_chamado'] ?>" />
                        <?php if ($dados[0]['situacao_chamado'] != 1) { ?>
                            <div class="form-group">
                                <label>Laudo</label>
                                <textarea class="form-control" <?= $dados[0]['situacao_chamado'] == 3 ? 'disabled' : '' ?> placeholder="Digite aqui..." name="laudo"><?= $dados[0]['laudo_atendimento'] ?></textarea>
                            </div>
                        <?php } ?>

                        <?php if ($dados[0]['situacao_chamado'] == 1) { ?>
                            <button class="btn btn-success" name="btnAtender">Atender</button>
                        <?php } else if ($dados[0]['situacao_chamado'] == 2) { ?>
                            <button class="btn btn-success" name="btnFinalizar">Finalizar</button>
                            <?php
                        } else {
                            ExibirMsg(5);
                        }
                        ?>

                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
