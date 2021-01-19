<?php

class Equipamento_sql {

    public static function InserirEquipamento() {
        $sql = ' insert into tb_equipamento (identificacao_equipamento, descricao_equipamento, id_novo_tipo, id_modelo, id_usuario) values(?,?,?,?,?)';

        return $sql;
    }

    public static function FiltrarEquipamento() {
        $sql = '';

        $sql = ' select
                    eq.id_equipamento,
                    nome_tipo,
                    nome_modelo,
                    identificacao_equipamento,
                    descricao_equipamento
                from
                    tb_equipamento as eq
        inner join
                    tb_modelo as mo
                on
                    eq.id_modelo = mo.id_modelo
                inner join
                    tb_tipo as ti
                on
                    ti.id_novo_tipo = eq.id_novo_tipo
                where
                    eq.id_modelo = ?
                and
                    eq.id_usuario = ?

                 ';

        return $sql;
    }

    public static function DetalharEquipamento() {
        $sql = '';

        $sql = ' select
                    eq.id_equipamento,
                    id_novo_tipo,
                    id_modelo,
                    identificacao_equipamento,
                    descricao_equipamento
                from
                    tb_equipamento as eq
                where 
                    eq.id_equipamento = ?
                and
                    eq.id_usuario = ?

                 ';

        return $sql;
    }
    public static function ConsultarEquipamento() {
        $sql = '';
        $sql = ' select
                    eq.id_equipamento,
                    eq.identificacao_equipamento,
                    eq.descricao_equipamento
                from
                    tb_equipamento as eq
                where 
                    eq.id_usuario = ?
                 ';
        return $sql;
    }

    public static function AlterarEquipamento() {
        $sql = 'update 
                    tb_equipamento 
                set  
                    identificacao_equipamento = ?,
                    descricao_equipamento = ?,
                    id_novo_tipo = ?,
                    id_modelo = ?
                where 
                    id_usuario = ? and id_equipamento = ?';
        return $sql;
    }

    public static function FiltrarEquipamentoDisponivel() {
        $sql = '';

        $sql = 'select 
                       eq.id_equipamento,
                       eq.identificacao_equipamento,
                       eq.descricao_equipamento
                  from 
                       tb_equipamento as eq
                 where
                       eq.id_usuario = ?
                   and
                       eq.id_equipamento not in (
                                                  select 
                                                          al.id_equipamento 
                                                    from 
                                                          tb_alocar_setor as al
                                                   where
                                                          al.data_remover is null
                                                      and
                                                          al.id_usuario = ?
                                                )
                ';


        return $sql;
    }

    public static function FiltrarEquipamentoSetor() {
        $sql = '';

        $sql = 'select 
                    seq.id_alocar,
                    eq.id_equipamento,
                    eq.identificacao_equipamento,
                    eq.descricao_equipamento
                from
                    tb_equipamento as eq
                inner join
                    tb_alocar_setor as seq
                on
                    eq.id_equipamento = seq.id_equipamento
                where
                    seq.id_setor = ?
                and
                    seq.data_remover is null
                

            
               ';

        return $sql;
    }
     public static function FiltrarEquipamentoSetorChamado() {
        $sql = '';

        $sql = 'select 
                    eq.id_equipamento,
                    eq.identificacao_equipamento,
                    eq.descricao_equipamento
                from
                    tb_equipamento as eq
                inner join
                    tb_alocar_setor as seq
                on
                    eq.id_equipamento = seq.id_equipamento
                where
                    seq.id_setor = ?
                and
                    seq.data_remover is null
                and 
                    eq.id_equipamento not in (          
                                                select ch.id_equipamento
                                                    from tb_chamado as ch
                                                where
                                                    situacao_chamado <> 3
                                                )

            
               ';

        return $sql;
    }

    public static function AlocarSetorEquipamento() {
        $sql = '';
        $sql = 'insert into tb_alocar_setor (data_alocar, id_setor, id_equipamento,id_usuario)
                values (?,?,?,?)';
        return $sql;
    }
    
    public static function RemoverEquipamentoSetor(){
        $sql = '';
        
        $sql = ' update tb_alocar_setor set data_remover = ? where id_alocar = ?';
        
        return $sql;
    }

}
