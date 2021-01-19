<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/ControleOS/dao/UsuarioFuncionarioDAO.php';
require_once 'UtilCtrl.php';

class UsuarioFuncionarioCTRL {

    public function InserirAdministrador(UsuarioVO $vo) {
        if ($vo->getNome() == '' || $vo->getTipo() == '') {
            return 0;
        }

        // cria o login com a regra : NOME.SOBRENOME
        $login = strtolower(explode(' ', $vo->getNome())[0] . '.' . explode(' ', $vo->getNome())[1]);

        //preenche o obj vo com o login gerado que será o mesmo para senha
        $vo->setLogin($login);

        $vo->setSenha(password_hash($login, 1));

        $dao = new UsuarioFuncionarioDAO();

        return $dao->InserirAdministrador($vo);
    }

    public function InserirFuncionario(UsuarioVO $user, FuncionarioVO $func) {

        if ($user->getTipo() == '' || $user->getNome() == '' || $func->getIdSetor() == '' ||
                $func->getEmailFuncionario() == '' || $func->getTelefoneFuncionario() == '' || $func->getEnderecoFuncionario() == '') {

            return 0;
        }

        //login sera: o primeiro nome . primeira parte do email
        $login = strtolower(explode(' ', $user->getNome())[0] . '.' . explode('@', $func->getEmailFuncionario())[0]);

        $user->setLogin($login);
        $user->setSenha(password_hash($login, 1));

        $func->setIdUserAdm(UtilCtrl::RetornarCodigoUserAdm());

        $dao = new UsuarioFuncionarioDAO();

        return $dao->InserirFuncionario($user, $func);
    }

    public function FiltrarUsuario($tipo) {
        if ($tipo == '') {
            return 0;
        }

        $dao = new UsuarioFuncionarioDAO();

        return $dao->FiltrarUsuario($tipo);
    }

    public function AlterarAdministrador(UsuarioVO $vo) {
        if ($vo->getNome() == '') {
            return 0;
        }

        $dao = new UsuarioFuncionarioDAO($vo);
        $ret = $dao->AlterarAdministrador($vo);
        return $ret;
    }

    public function AlterarFuncionario(FuncionarioVO $vo, UsuarioVO $uservo) {
        if ($uservo->getNome() == '') {
            return 0;
        }
        if ($vo->getEmailFuncionario() == '' || $vo->getEnderecoFuncionario() == '' || $vo->getIdSetor() == '' || $vo->getTelefoneFuncionario() == '') {
            return 0;
        }

        $dao = new UsuarioFuncionarioDAO();

        return $dao->AlterarFuncionario($vo, $uservo);
    }

    public function ConsultarEmailDuplicadoCadastro($email) {
        $dao = new UsuarioFuncionarioDAO();

        return $dao->ConsultarEmailDuplicadoCadastro($email);
    }

    public function ValidarLogin($login, $senha) {
        if (trim($login) == '' || trim($senha) == '') {
            return 0;
        }

        $dao = new UsuarioFuncionarioDAO();
        $user = $dao->ValidarLogin($login);

        if (count($user) > 0) {
            if (password_verify($senha, $user[0]['senha_usuario'])) {
                UtilCtrl::CriarSessao($user[0]['id_usuario'], $user[0]['tipo_usuario'], $user[0]['id_setor'] == '' ? '' : $user [0]['id_setor'], $user[0]['id_funcionario'] == '' ? '' : $user[0]['id_funcionario']);
                switch ($user[0]['tipo_usuario']) {

                    case 1:
                        header('location: adm_inicial.php');

                        break;
                    case 2:
                        header('location: func_novo_chamado.php');

                        break;
                    case 3:
                        header('location: tec_meus_dados.php');

                        break;
                      

                        break;
                }
            } else {
                return -3;
            }
        } else {
            return -2;
        }
    }

    public function CarregarDadosUsuario() {
        $dao = new UsuarioFuncionarioDAO();
        $dados = $dao->CarregarDadosUsuario(UtilCtrl::RetornarCodigoUserAdm());

        return $dados;
    }
    
    public function CarregarDadosTecnico() {
        $dao = new UsuarioFuncionarioDAO();
        $dados = $dao->CarregarDadosTecnico(UtilCtrl::RetornarCodigoUserAdm());

        return $dados;
    }


    public function AlterarUsuarioFuncionario(FuncionarioVO $vo) {
        $vo->setIdUsuario(UtilCtrl::RetornarCodigoUserAdm());
        $dao = new UsuarioFuncionarioDAO();

        return $dao->AlterarUsuarioFuncionario($vo);
    }
    public function AlterarUsuarioTecnico(FuncionarioVO $vo) {
        $vo->setIdUsuario(UtilCtrl::RetornarCodigoUserAdm());
        $dao = new UsuarioFuncionarioDAO();

        return $dao->AlterarUsuarioTecnico($vo);
    }
}
