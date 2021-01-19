<?php

require_once 'Conexao.php';
require_once 'sql/Setor_sql.php';

class SetorDAO extends Conexao {

    public function IserirSetor(SetorVO $vo) {
        //cria uma variavel que recebe o obj de conexao
        $conexao = parent::retornaConexao();

        $comando = Setor_sql::InserirSetor();

        // cria o obj que será configurado e executado no BD
        $sql = new PDOStatement();

        //vincular no obj sql a conexao que estará preparada para o COMANDO
        $sql = $conexao->prepare($comando);

        //vincular os VALORES(ponto de ? que esta no comando sql) com o valor do parametro

        $sql->bindValue(1, $vo->getNomeSetor());
        $sql->bindValue(2, $vo->getIdUser());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function AlterarSetor(SetorVO $vo) {
        $conexao = parent::retornaConexao();

        $comando = Setor_sql::AlterarSetor();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getNomeSetor());
        $sql->bindValue(2, $vo->getIdUser());
        $sql->bindValue(3, $vo->getIdSetor());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ExcluirSetor($idSetor) {
        $conexao = parent::retornaConexao();

        $comando = Setor_sql::ExcluirSetor();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $idSetor);

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }

    public function ConsultarSetor() {

        $conexao = parent::retornaConexao();

        $comando = Setor_sql::ConsultarSetor();

        $sql = new PDOStatement();

        $sql = $conexao->prepare($comando);

        //elimina o indice nas colunas , deixando somente o nome da coluna com seu valor
        $sql->setFetchMode(PDO::FETCH_ASSOC);

        $sql->execute();

        return $sql->fetchAll();
    }

}
