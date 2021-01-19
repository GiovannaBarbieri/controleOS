<?php
require_once '../controller/UsuarioFuncionarioCTRL.php';

//
//echo password_hash('123', PASSWORD_DEFAULT);

if(isset($_POST['btnAcessar'])){
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    
    $ctrl = new UsuarioFuncionarioCTRL();
    
    $ret = $ctrl->ValidarLogin($login, $senha);
}

?>
﻿<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php
            include_once '_head.php';
        ?>
    </head>
    <body>
        <div class="container">
            <div class="row text-center ">
                <div class="col-md-12">
                    <br /><br />
                    <h2> Controle Os</h2>

                    <h5>( Faça seu login )</h5>
                    <br />
                </div>
            </div>
            <div class="row ">

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>   Entre com seus dados </strong>  
                        </div>
                        <div class="panel-body">
                            <?php
                            if (isset($ret)) {

                                ExibirMsg($ret);
                            }
                            ?>
                            <form action="login.php" method="post">
                                <br />
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                    <input type="text" class="form-control" placeholder="Seu login " name="login" id="login"/>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                    <input type="password" class="form-control"  placeholder="Sua senha" name="senha" id="senha" />
                                </div>                              

                                <button class="btn btn-primary " name="btnAcessar">Acessar</button>
                                
                            </form>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </body>
</html>
