<?php
require_once '../controller/UsuarioFuncionarioCTRL.php';
require_once '../controller/UtilCtrl.php';
require_once '../vo/FuncionarioVO.php';

UtilCtrl::VerTipoPermissao(2);

$ctrl = new UsuarioFuncionarioCTRL();

if(isset($_POST['btnSalvar'])){
    $vo = new FuncionarioVO();
    $vo->setEmailFuncionario($_POST['emailFunc']);
    $vo->setTelelefoneFuncionario($_POST['telFunc']);
    $vo->setEnderecoFuncionario($_POST['endFunc']);
    $vo->setNome($_POST['nomeFunc']);
    
    $ctrl = new UsuarioFuncionarioCTRL();
    $ret = $ctrl->AlterarUsuarioFuncionario($vo);
}
$funcionario = $ctrl->CarregarDadosUsuario();
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
                                if(isset($ret)){
                                    ExibirMsg($ret);
                                }
                            ?>
                            <h2>Meus Dados</h2>   
                            <h5>Aqui você podera manter seus dados atualizados</h5>

                        </div>
                    </div>
                    <!-- /. ROW  -->
                    <hr />                  
                    <form method="post" action="func_meus_dados.php">
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control" name="nomeFunc" id="nomeFunc" placeholder="Digite aqui..." value="<?= $funcionario[0]['nome_usuario'] ?>" />
                        </div>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input class="form-control" name="emailFunc" id="emailFunc" placeholder="Digite aqui..." value="<?= $funcionario[0]['email_funcionario'] ?>" />
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input class="form-control cel num telpree" name="telFunc" id="telFunc" placeholder="Digite aqui..." value="<?= $funcionario[0]['telefone_funcionario'] ?>" />
                        </div>
                        <div class="form-group">
                            <label>Endereço</label>
                            <input class="form-control" name="endFunc" id="endFunc" placeholder="Digite aqui..." value="<?= $funcionario[0]['endereco_funcionario'] ?>" />
                        </div>

                        <button type="submit" name="btnSalvar" class="btn btn-success">Salvar</button>
                    </form>
                </div>
            </div>
        </div>             
    </body>
</html>
