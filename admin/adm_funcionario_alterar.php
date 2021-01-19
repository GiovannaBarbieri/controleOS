<?php
require_once '../vo/FuncionarioVO.php';
require_once '../controller/FuncionarioCTRL.php';
require_once '../controller/UtilCtrl.php';
UtilCtrl::VerTipoPermissao(1);

$ctrl = new FuncionarioCTRL();

if (isset($_POST['btnSalvar'])) {
    $tipo = $_POST['tipo'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];

    $vo = new FuncionarioVO();

    $vo->setIdSetor($tipo);
    $vo->setIdFuncionario($nome);
    $vo->setEmailFuncionario($email);
    $vo->setTelelefoneFuncionario($telefone);
    $vo->setEnderecoFuncionario($endereco);

    $ret = $ctrl->AlterrarFuncionario($vo);
}
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
                            <h2>Alterar Funcioario</h2>   
                            <h5>Alterar funcionarios</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />
                    <form method="post" action="adm_funcionario_alterar.php">
                        <div class="form-group" id="divTipo">
                            <label>Tipo</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="">Selecione</option>
                                <option value="1">Administrador</option>
                                <option value="2">Setor</option>
                                <option value="3">Técnico</option>
                                <label id="val_Tipo" class="Validar"></label>

                            </select>
                        </div>

                        <div class="form-group" id="divNome">
                            <label>Nome</label>
                            <input class="form-control" name="nome" id="nome" placeholder="" />
                            <label id="val_nome" class="Validar"></label>
                        </div>
                        <div class="form-group" id="divEmail">
                            <label>E-mail</label>
                            <input class="form-control" name="email" id="email" placeholder="" />
                            <label id="val_email" class="Validar"></label>
                        </div>
                        <div class="form-group" id="divTelefone">
                            <label>Telefone</label>
                            <input class="form-control cel num telpree" name="telefone" id="telefone" placeholder="" />
                            <label id="val_telefone" class="Validar"></label>
                        </div>
                        <div class="form-group" id="divEndereco">
                            <label>Endereço</label>
                            <input class="form-control" name="endereco" id="endereco" placeholder="" />
                            <label id="val_endereco" class="Validar"></label>
                        </div>

                        <button type="submit" class="btn btn-success" name="btnSalvar" onclick="return Validar(4)">Salvar</button>
                    </form>

                    </body>
                    </html>
