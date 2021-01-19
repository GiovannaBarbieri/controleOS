<?php


class Tipo_sql {
    public static function InserirTipo(){
        $sql = 'insert into tb_tipo (nome_tipo, id_usuario) values (?, ?)';
        return $sql;
    }
    
    public static function AlterarTipo(){
        $sql = 'update tb_tipo set nome_tipo = ? where id_novo_tipo = ?';
        return $sql;
    }
    public static function ExcluirTipo(){
        $sql = 'delete from tb_tipo where id_novo_tipo = ?';
        return $sql;
    }
    
    public static function ConsultarTipo(){
        $sql = 'select nome_tipo, id_novo_tipo from tb_tipo order by nome_tipo';
        return $sql;
    }
}
