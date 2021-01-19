<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/controller/UsuarioFuncionarioCTRL.php';

if (isset($_POST['email_user'])){
    $email = $_POST['email_user'];
    $ctrl = new UsuarioFuncionarioCTRL();
    
    if($ctrl->ConsultarEmailDuplicadoCadastro($email) == 1){
        echo 'existe';
    }else{
        echo 'Não existe';
    }
    
}
