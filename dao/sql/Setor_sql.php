<?php


class Setor_sql {
    public static function InserirSetor(){
        $sql = 'insert into tb_setor (nome_setor, id_usuario) values(?, ?)';
        return $sql;
    }
    
    public static function AlterarSetor(){
        $sql = 'update tb_setor set nome_setor = ?, id_usuario = ? where id_setor = ?';
        return $sql;
    }
    
    public static function ExcluirSetor(){
        $sql = 'delete from tb_setor where id_setor = ?';
        return $sql;
    }
    
    public static function ConsultarSetor(){
        $sql = 'select nome_setor, id_setor from tb_setor order by nome_setor';
        return $sql;
    }
}
