<?php

require_once '../controller/SetorCTRL.php';
require_once '../controller/EquipamentoCTRL.php';
require_once '../vo/AlocarVO.php';
require_once '../controller/UtilCtrl.php';
UtilCtrl::VerTipoPermissao(1);


$ctrl_set = new SetorCTRL();
$ctrl_equip = new EquipamentoCTRL();

if (isset($_POST['btnAlocar'])) {
    $vo = new AlocarVO();

    $vo->setIdSetor($_POST['setor']);
    $vo->setIdEquip($_POST['equipamento']);

    $ret = $ctrl_equip->AlocarSetorEquipamento($vo);
}

$setor = $ctrl_set->ConsultarSetor();
$equips = $ctrl_equip->FiltrarEquipamentoDisponivel();

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
                            if (isset($ret)) {
                                ExibirMsg($ret);
                            }
                            ?>
                            <h2>Alocar equipamento</h2>   
                            <h5>Aqui você podera alocar seus equipamentos</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />

                    <form method="post" action="adm_alocar_equipamento.php">
                        <div class="form-group" id="divTipo">
                            <label>Selecione o setor</label>
                            <select class="form-control" name="setor" id="setor">
                                <option value="">Selecione</option>
                                <?php for ($i=0; $i<count($setor); $i++) {?>
                                <option value="<?= $setor[$i]['id_setor'] ?>"><?= $setor[$i]['nome_setor'] ?></option>
                                <?php }?>

                            </select>
                        </div>
                         <div class="form-group" id="divTipo">
                            <label>Selecione o equipamento</label>
                            <select class="form-control" name="equipamento" id="equipamento">
                                <option value="">Selecione</option>
                                <?php for ($i=0; $i<count($equips); $i++) {?>
                                <option value="<?= $equips[$i]['id_equipamento'] ?>">
                                        <?= $equips[$i]['identificacao_equipamento'] ?> / <?= $equips[$i]['descricao_equipamento'] ?>
                                </option>
                                <?php }?>
                            </select>
                        </div>
                        <button type="submit" name="btnAlocar" class="btn btn-success" onclick=" return Validar(10) ">Alocar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
