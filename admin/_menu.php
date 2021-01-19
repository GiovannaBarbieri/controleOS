<?php
require_once '../controller/UtilCtrl.php';

if (isset($_GET['close']) && $_GET['close'] == 1) {
    UtilCtrl::Deslogar();
    exit();
}
$tipo = UtilCtrl::RetornarCodigoTipoLogado();
?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">	
            <?php if ($tipo == 1) { ?>
                <li>
                    <a href="adm_inicial.php"><i class="fa fa-user fa-2x"></i>Inicio</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap fa-3x"></i> Setor<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="adm_setor_gerenciar.php">Gerenciar Setor</a>
                        </li>
                        <li>
                            <a href="#">Consultar | Aterar</a>
                        </li>

                    </ul>
                </li>  

                <li>
                    <a href="#"><i class="fa fa-sitemap fa-3x"></i> Funcionario<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="adm_funcionario_novo.php">Novo</a>
                        </li>
                        <li>
                            <a href="adm_funcionario_consultar.php">Consultar | Aterar</a>
                        </li>

                    </ul>
                </li>  

                <li>
                    <a href="#"><i class="fa fa-sitemap fa-3x"></i> Tipo<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="adm_tipo_gerenciar.php">Gerenciar Tipo</a>
                        </li>            

                    </ul>
                </li>

                <li>
                    <a href="#"><i class="fa fa-sitemap fa-3x"></i> Modelo<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="adm_modelo_gerenciar.php">Gerenciar Modelo</a>
                        </li>                    

                    </ul>
                </li>  

                <li>
                    <a href="#"><i class="fa fa-sitemap fa-3x"></i> Equipamento<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="adm_novo_equipamento.php">Novo</a>
                        </li>                    
                        <li>
                            <a href="adm_consultar_equipamento.php">Consultar</a>
                        </li> 
                        <li>
                            <a href="adm_alocar_equipamento.php">Alocar no Setor</a>
                        </li>
                        <li>
                            <a href="adm_remover_equipamento.php">Remover do Setor</a>
                        </li>
                    </ul>
                </li>  
            <?php } else if ($tipo == 2) { ?>

                <li>
                    <a href="func_meus_dados.php"><i class="fa fa-user fa-2x"></i>Meus Dados</a>
                </li>      

                <li>
                    <a href="func_novo_chamado.php"><i class="fa fa-user fa-2x"></i>Abrir chamado</a>
                </li>  
                <li>
                    <a href="func_minhas_os.php"><i class="fa fa-user fa-2x"></i>Minhas OS</a>
                </li>

            <?php } else if ($tipo == 3) { ?>
                <li>
                    <a href="tec_meus_dados.php"><i class="fa fa-user fa-2x"></i>Meus Dados</a>
                </li>      

                <li>
                    <a href="tec_consultar_chamado.php"><i class="fa fa-user fa-2x"></i>Consultar Chamado</a>
                </li>
            <?php } ?>
            <li  >
                <a href="_menu.php?close=1"><i class="fa fa-square-o fa-3x"></i> Sair</a>
            </li>	
        </ul>

    </div>

</nav>