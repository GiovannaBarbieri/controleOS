<?php

require_once 'Conexao.php';
require_once 'sql/Usuario_sql.php';

class UsuarioFuncionarioDAO extends Conexao {

    public function InserirAdministrador(UsuarioVO $vo) {

        $conexao = parent::retornaConexao();
        $comando = Usuario_sql::InserirUsuario();

        $sql = new PDOStatement();
        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getLogin());
        $sql->bindValue(3, $vo->getSenha());
        $sql->bindValue(4, $vo->getTipo());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function InserirFuncionario(UsuarioVO $voUser, FuncionarioVO $voFunc) {
        $conexao = parent::retornaConexao();
        $comando = Usuario_sql::InserirUsuario();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $voUser->getNome());
        $sql->bindValue(2, $voUser->getLogin());
        $sql->bindValue(3, $voUser->getSenha());
        $sql->bindValue(4, $voUser->getTipo());

        $conexao->beginTransaction();

        try {
            //insere na tb_usuario
            $sql->execute();

            //recupera o id do recem cadastrado
            $id_usuario_funcionario = $conexao->lastInsertId();

            $comando = Usuario_sql::InserirFuncionario();

            $sql = $conexao->prepare($comando);

            $sql->bindValue(1, $voFunc->getEmailFuncionario());
            $sql->bindValue(2, $voFunc->getTelefoneFuncionario());
            $sql->bindValue(3, $voFunc->getEnderecoFuncionario());
            $sql->bindValue(4, $id_usuario_funcionario);
            $sql->bindValue(5, $voFunc->getIdUserAdm());
            $sql->bindValue(6, $voFunc->getIdSetor());

            //insere na tb_funcionario
            $sql->execute();

            $conexao->commit();

            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            $conexao->rollBack();
            return -1;
        }
    }

    public function FiltrarUsuario($tipo) {

        $conexao = parent::retornaConexao();

        $comando = Usuario_sql::FiltrarUsuario();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $tipo);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

    public function ConsultarEmailDuplicadoCadastro($email) {

        $conexao = parent::retornaConexao();

        $comando = Usuario_sql::ConsultarEmailDuplicadoCadastro();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $email);

        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        $ret = $sql->fetchAll();

        return $ret[0]['contar'];
    }

    public function AlterarAdministrador(UsuarioVO $vo) {

        $conexao = parent::retornaConexao();

        $comando = Usuario_sql::AlterarAdm();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getIdUsuario());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            return -1;
        }
    }

    public function AlterarFuncionario(FuncionarioVO $vo, UsuarioVO $uservo) {
        $conexao = parent::retornaConexao();

        $comando = Usuario_sql::AlterarFuncionario();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getEmailFuncionario());
        $sql->bindValue(2, $vo->getTelefoneFuncionario());
        $sql->bindValue(3, $vo->getEnderecoFuncionario());
        $sql->bindValue(4, $vo->getIdSetor());
        $sql->bindValue(5, $vo->getIdUsuarioFuncionario());

        $conexao->beginTransaction();

        try {
            $sql->execute();

            $comando = Usuario_sql::AlterarAdm();
            $sql = $conexao->prepare($comando);

            $sql->bindValue(1, $uservo->getNome());
            $sql->bindValue(2, $uservo->getIdUsuario());

            $sql->execute();
            $conexao->commit();

            return 1;
        } catch (Exception $ex) {
            $conexao->rollBack();
            return -1;
        }
    }

    public function ValidarLogin($login) {
        $conexao = parent::retornaConexao();

        $comando = Usuario_sql::ValidarLogin();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $login);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    
    public function CarregarDadosUsuario($idLogado){
        $conexao = parent::retornaConexao();
        
        $comando = Usuario_sql::CarregarDadosUsuario();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idLogado);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
    public function CarregarDadosTecnico($idLogado){
        $conexao = parent::retornaConexao();
        
        $comando = Usuario_sql::CarregarDadosUsuario();
        
        $sql = $conexao->prepare($comando);
        
        $sql->bindValue(1, $idLogado);
        
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        
        $sql->execute();
        
        return $sql->fetchAll();
    }
     public function AlterarUsuarioFuncionario(FuncionarioVO $vo) {
        $conexao = parent::retornaConexao();

        $comando = Usuario_sql::AlterarUsuarioNome();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getIdUsuario());

        $conexao->beginTransaction();

        try {
            $sql->execute();

            $comando = Usuario_sql::AlterarUsuarioFuncionario();
            $sql = $conexao->prepare($comando);

            $sql->bindValue(1, $vo->getEmailFuncionario());
            $sql->bindValue(2, $vo->getTelefoneFuncionario());
            $sql->bindValue(3, $vo->getEnderecoFuncionario());
            $sql->bindValue(4, $vo->getIdUsuario());

            $sql->execute();
            $conexao->commit();

            return 1;
        } catch (Exception $ex) {
            $conexao->rollBack();
            return -1;
        }
    }
     public function AlterarUsuarioTecnico(FuncionarioVO $vo) {
        $conexao = parent::retornaConexao();

        $comando = Usuario_sql::AlterarUsuarioNome();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getNome());
        $sql->bindValue(2, $vo->getIdUsuario());

        $conexao->beginTransaction();

        try {
            $sql->execute();

            $comando = Usuario_sql::AlterarUsuarioTecnico();
            $sql = $conexao->prepare($comando);

            $sql->bindValue(1, $vo->getEmailFuncionario());
            $sql->bindValue(2, $vo->getTelefoneFuncionario());
            $sql->bindValue(3, $vo->getEnderecoFuncionario());
            $sql->bindValue(4, $vo->getIdUsuario());

            $sql->execute();
            $conexao->commit();

            return 1;
        } catch (Exception $ex) {
            $conexao->rollBack();
            return -1;
        }
    }

}
