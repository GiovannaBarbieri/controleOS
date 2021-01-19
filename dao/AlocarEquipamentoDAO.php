<?php

require_once 'Conexao.php';
require_once 'sql/Alocar_sql.php';

class AlocarEquipamentoDAO extends Conexao {

    public function AlocarEquipamento(AlocarVO $vo) {
        $conexao = parent::retornaConexao();
        $comando = Alocar_sql::AlocarEquipamento();

        $sql = $conexao->prepare($comando);

        $sql->bindValue(1, $vo->getIdSetor());
        $sql->bindValue(2, $vo->getIdEquip());

        try {
            $sql->execute();
            return 1;
        } catch (Exception $ex) {
            echo $ex->getMessage();
            return -1;
        }
    }
}
