<?php 
    include_once '_head.php'; 
    include_once '../vo/UsuarioVO.php';
    include_once '../vo/FuncionarioVO.php';
    include_once '../controller/UsuarioFuncionarioCTRL.php';
    include_once '../controller/SetorCTRL.php';
    require_once '../controller/UtilCtrl.php';

UtilCtrl::VerTipoPermissao(1);
    $ctrl = new UsuarioFuncionarioCTRL();
    $ctrl_setor = new SetorCTRL();
    
    if(isset($_POST['btnSalvar'])){

    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
        
    $voUser = new UsuarioVO();
    
    $voUser->setTipo($tipo);
    $voUser->setNome($nome);
    
    // Verifica se é Adm
    if($tipo == 1){
        $ret = $ctrl->InserirAdministrador($voUser); 
    }else{
        
    $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $setor = $_POST['setor'];

        $vofunc = new FuncionarioVO();

        $vofunc->setEmailFuncionario($email);
        $vofunc->setEnderecoFuncionario($endereco);
        $vofunc->setIdSetor($setor);
        $vofunc->setTelelefoneFuncionario($telefone);

        $ret = $ctrl->InserirFuncionario($voUser, $vofunc);
    if($ret == 1){
       $tipo = '';
    }
    }
 
    } 
    
    $setores = $ctrl_setor->ConsultarSetor();
    
    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>   
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
                        if(isset($ret)){ExibirMsg($ret);}
                    ?>
                     <h2>Novo Funcionario</h2>   
                        <h5>Gerencie os funcionarios nesta página</h5> 
                    </div>
                </div>
                <hr />
                <form method="POST" action="adm_funcionario_novo.php" >                
                <?php
                    include_once '_combo_fixa_tipo.php';
                ?>
                <div id="divNomeFunc" style="display: none;">
                    <div class="form-group" id="divNome">
                        <label>Nome</label>
                        <input class="form-control" placeholder="Digite aqui" id="nome" name="nome"/>
                        <label id="val_nome" class="validar"></label>
                    </div>
                </div>
                <div id="divGeral" style="display: none;">
                    <div class="form-group" id="divSetor">
                        <label>Selecione o setor</label>
                        <select class="form-control" id="setor" name="setor">
                            <option value="">Selecione</option>
                            <?php
                            for($i=0; $i<count($setores); $i++){ ?>
                            <option value="<?= $setores[$i]['id_setor'] ?>"><?= $setores[$i]['nome_setor'] ?></option>
                            <?php } ?>
                        </select>
                        <label id="val_setor" class="validar"></label>
                    </div>
                    <div class="form-group" id="divEmail">
                        <label>E-mail</label>
                        <input class="form-control" placeholder="Digite aqui" id="email" name="email" onchange="ValidarEmail(1)"/>
                        <label id="val_email" class="validar"></label>
                    </div>
                    <div class="form-group" id="divTelefone">
                        <label>Telefone</label>
                        <input class="form-control" placeholder="Digite aqui" id="telefone" name="telefone"/>
                        <label id="val_telefone" class="validar"></label>
                    </div>
                    <div class="form-group" id="divEndereco">
                        <label>Endereço</label>
                        <input class="form-control" placeholder="Digite aqui" id="endereco" name="endereco"/>
                        <label id="val_endereco" class="validar"></label>
                    </div>
                </div>
                <button type="submit" class="btn btn-success" onclick="return Validar(2);" name="btnSalvar">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
