<?php
require_once '../controller/SetorCTRL.php';
require_once '../controller/UsuarioFuncionarioCTRL.php';
require_once '../controller/UtilCtrl.php';
UtilCtrl::VerTipoPermissao(1);


$tipo = '';
$ctrl_set = new SetorCTRL();

if (isset($_POST['btnProcurar'])) {
    $tipo = $_POST['tipo'];
    $ctrl = new UsuarioFuncionarioCTRL();

    $usuarios = $ctrl->FiltrarUsuario($tipo);
    
    if($usuarios == 0){
        $ret = 0;
    }
    
} else if (isset($_POST['btnAlterarFunc'])) {

    $uservo = new UsuarioVO();
    $vo = new FuncionarioVO();
    $tipo = $_POST['tipo_filtro'];
    $uservo->setNome($_POST['nome_alt']);
    $uservo->setIdUsuario('cod');
   
    $vo->setEmailFuncionario($_POST['email']);
    $vo->setEnderecoFuncionario($_POST['endereco']);
    $vo->setIdUsuarioFuncionario($_POST['cod']);
    $vo->setIdSetor($_POST['id_setor']);
    $vo->setTelelefoneFuncionario($_POST['telefone']);
    
    $ret = $ctrl->AlterarFuncionario($vo, $uservo);
    $usuarios = $ctrl->FiltrarUsuario($tipo);
            
} else if (isset($_POST['btnAlterarAdm'])) {

    $tipo = $_POST['tipo_filtro'];
    $ctrl = new UsuarioFuncionarioCTRL();
    $uservo = new UsuarioVO();
    $uservo->setNome($_POST['nome_alt_adm']);
    $uservo->setIdUsuario($_POST['cod']);
    $ret = $ctrl->AlterarAdministrador($uservo);
    $usuarios = $ctrl->FiltrarUsuario($tipo);
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
                            <h2>Consultar Funcionário</h2>   
                            <h5>Consulte / Altere seus funcionarios nesta pagina</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />

                    <form method="post" action="adm_funcionario_consultar.php">

                        <?php
                        include_once '_combo_fixa_tipo.php';
                        ?>

                        <center>
                            <button class="btn btn-info" name="btnProcurar" onclick="return Validar(3)" >Procurar</button>
                        </center>
                    </form>
                    <hr />

                    <?php
                    if (isset($usuarios) && $usuarios != 0) {
                        if (count($usuarios) > 0) {
                            ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Advanced Tables -->
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Funcionários Cadastrados
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                                    <thead>
                                                        <tr>
                                                            <th>Nome</th>
                                                            <th>Tipo</th>
                                                            <th>Setor</th>
                                                            <th>Ação</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php for ($i = 0; $i < count($usuarios); $i++) { ?>
                                                            <tr class="odd gradeX">
                                                                <td><?= $usuarios[$i]['nome_usuario'] ?></td>
                                                                <td><?= UtilCtrl::RetornaTipoUsuario($usuarios[$i]['tipo_usuario']) ?></td>
                                                                <td><?= $usuarios[$i]['nome_setor'] ?></td>
                                                                <td>
                                                                    <a href="#" data-toggle="modal" data-target="#<?= $usuarios[$i]['tipo_usuario'] == 1 ? 'modAlterarAdm' : 'modAlterarFunc' ?>" class="btn btn-warning btn-xs" onclick="return CarregarModal('<?= $usuarios[$i]['tipo_usuario'] ?>', '<?= $usuarios[$i]['id_usuario'] ?>', '<?= $usuarios[$i]['nome_usuario'] ?>', '<?= $usuarios[$i]['id_setor'] ?>', '<?= $usuarios[$i]['email_funcionario'] ?>', '<?= $usuarios[$i]['telefone_funcionario'] ?>', '<?= $usuarios[$i]['endereco_funcionario'] ?>')">Alterar</a>
                                                                </td>

                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>

                                                <div class="modal fade" id="modAlterarFunc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Alterar Funcionário</h4>
                                                            </div>
                                                            <form method="post" action="adm_funcionario_consultar.php">
                                                                <input type="hidden" name="tipo_filtro" value="<?= $tipo ?> "/>
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="cod" id="cod" />
                                                                    <div class="form-group" id="divNome">                          
                                                                        <label>Nome</label>
                                                                        <input class="form-control" placeholder="Digite seu nome"  name="nome_alt" id="nome_alt"/>
                                                                        <label id="val_nome" class="Validar"></label>
                                                                    </div>
                                                                    <div class="form-group" id="divSetor">
                                                                        <label>Setor</label>
                                                                        <select class="form-control" name="setor" id="setor">
                                                                            <option value="">Selecione</option> 
                                                                            <?php for ($i = 0; $i < count($setores); $i++) { ?>
                                                                                <option value="<?= $setores[$i]['id_setor'] ?>">
                                                                                    <?= $setores[$i]['nome_setor'] ?></option>
                                                                                <?php } ?>
                                                                        </select>
                                                                        <label id="val_setor" class="Validar"></label>
                                                                    </div>
                                                                    <div class="form-group" id="divEmail">
                                                                        <label>E-mail</label>
                                                                        <input class="form-control" name="email" id="email" placeholder="Digite aqui..." />
                                                                        <label id="val_email" class="Validar"></label>
                                                                    </div>
                                                                    <div class="form-group" id="divTelefone">
                                                                        <label>Telefone</label>
                                                                        <input class="form-control cel" name="telefone" id="telefone" placeholder="Digite aqui..." />
                                                                        <label id="val_tel" class="Validar"></label>
                                                                    </div>
                                                                    <div class="form-group" id="divEndereco">
                                                                        <label>Endereço</label>
                                                                        <input class="form-control" name="endereco" id="endereco" placeholder="Digite aqui..." />
                                                                        <label id="val_end" class="Validar"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                                    <button class="btn btn-primary" name="btnAlterarFunc">Salvar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade" id="modAlterarAdm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" id="myModalLabel">Alterar Administrador</h4>
                                                            </div>
                                                            <form method="post" action="adm_funcionario_consultar.php">
                                                                <input type="hidden" name="tipo_filtro" value="<?= $tipo ?> " />
                                                                <div class="modal-body">
                                                                    <input type="hidden" name="cod" id="cod_adm" />
                                                                    <div class="form-group" id="divNome">  
                                                                        <label>Nome</label>
                                                                        <input class="form-control" placeholder="Digite o novo nome"  name="nome_alt_adm" id="nome_alt_adm"/>
                                                                        <label id="val_nome" class="Validar"></label>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                                                    <button class="btn btn-primary" name="btnAlterarAdm">Salvar</button>
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

        <script>

            function CarregarAdm(nome, id) {

            }

            function CarregarModal(tipo, id, nome, setor, email, tel, end) {
                if (tipo == 1) {
                    $("#cod_adm").val(id);
                    $("#nome_alt_adm").val(nome);
                } else {
                    $("#cod").val(id);
                    $("#nome_alt").val(nome);
                    $("#setor").val(setor);
                    $("#email").val(email);
                    $("#telefone").val(tel);
                    $("#endereco").val(end);
                }
            }

        </script>

    </body>
</html>
