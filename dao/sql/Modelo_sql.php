<?php

class Modelo_sql{
    public static function InserirModelo(){
        $sql = 'insert into tb_modelo (nome_modelo, id_usuario) values (?, ?)';
        return $sql;
    }
    public static function AlterarModelo(){
        $sql = 'update tb_modelo set nome_modelo = ? where id_modelo = ?';
        return $sql;
    }
    public static function ExcluirModelo(){
        $sql = 'delete from tb_modelo where id_modelo = ?';
        return $sql;
    }
    public static function ConsultarModelos(){
        $sql = 'select nome_modelo, id_modelo from tb_modelo order by nome_modelo';
        return $sql;
    }
}
