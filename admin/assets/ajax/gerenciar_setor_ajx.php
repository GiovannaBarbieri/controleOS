<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/vo/SetorVO.php';
require_once$_SERVER['DOCUMENT_ROOT'] . '/ControleOS/controller/SetorCTRL.php';
require_once$_SERVER['DOCUMENT_ROOT'] . '/ControleOS/admin/_msg.php';

if (isset($_POST['nome']) && $_POST['acao'] == 'I') {
    $ctrl = new SetorCTRL();
    $nome = $_POST['nome'];
    $vo = new SetorVO();

    $vo->setNomeSetor($nome);
    $ret = $ctrl->InserirSetor($vo);

    ExibirMsg($ret);
} else if ($_POST['acao'] == 'C') {
    $ctrl = new SetorCTRL();
    $setores = $ctrl->ConsultarSetor();
    ?>

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


<?php } ?>