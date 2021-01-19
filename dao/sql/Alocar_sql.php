<?php

class Alocar_sql {
    public static function AlocarEquipamento(){
        $sql = 'insert into
                    tb_alocar_setor
                        (id_setor, id_equipamento) values (?,?)
                ';
        return $sql;
    }
}
