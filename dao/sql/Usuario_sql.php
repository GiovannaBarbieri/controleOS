<?php

class Usuario_sql {

    public static function InserirUsuario() {
        $sql = 'insert into tb_usuario (nome_usuario, login_usuario, senha_usuario, tipo_usuario) values (?,?,?,?)';

        return $sql;
    }

    public static function InserirFuncionario() {
        $sql = 'insert into tb_funcionario (email_funcionario, telefone_funcionario, endereco_funcionario, 
            id_usuario_funcionario, id_usuario_adm, id_setor) values (?,?,?,?,?,?)';

        return $sql;
    }

    public static function FiltrarUsuario() {
        $sql = 'select
                    usu.id_usuario,
                    nome_usuario,
                    tipo_usuario,
                    nome_setor,
                    se.id_setor,
                    fun.id_funcionario,
                    fun.email_funcionario,
                    fun.endereco_funcionario,
                    fun.telefone_funcionario
                from 
                    tb_usuario as usu
                left join
                    tb_funcionario as fun
                  on
                    usu.id_usuario = fun.id_usuario_funcionario
                left join
                    tb_setor as se
                 on
                    se.id_setor = fun.id_setor
                where
                    usu.tipo_usuario = ? 
                order by 
                    usu.nome_usuario';
        return $sql;
    }

    public static function AlterarAdm() {
        $sql = 'update tb_usuario set nome_usuario = ? where id_usuario = ?';

        return $sql;
    }

    public static function AlterarFuncionario() {
        $sql = ' update tb_funcionario 
                    set email_funcionario = ?,
                        telefone_funcionario = ?,
                        endereco_funcionario = ?,
                        id_setor = ?
                    where
                        id_usuario_funcionario = ?';
        return $sql;
    }

    public static function ConsultarEmailDuplicadoCadastro() {
        $sql = 'select count (*) as contar
                from
                    tb_funcionario
                where email_funcionario = ?
         
                ';
        return $sql;
    }

    public static function ValidarLogin() {
        $sql = '';

        $sql = 'select senha_usuario,
                us.id_usuario, 
                us.tipo_usuario,
                fu.id_setor,
                fu.id_funcionario
            from tb_usuario  as us
            
        left join
        
            tb_funcionario as fu 
        on  
            us.id_usuario = fu.id_usuario_funcionario
            
        where login_usuario = ?';

        return $sql;
    }

    public static function CarregarDadosUsuario() {
        $sql = '';

        $sql = ' select 
                    nome_usuario,
                    email_funcionario,
                    telefone_funcionario,
                    endereco_funcionario
                from
                    tb_funcionario as f
                inner join tb_usuario as u
                on
                    f.id_usuario_funcionario = u.id_usuario
                where
                    f.id_usuario_funcionario = ?;
                ';

        return $sql;
    }
    public static function CarregarDadosTecnico() {
        $sql = '';

        $sql = ' select 
                    nome_usuario,
                    email_funcionario,
                    telefone_funcionario,
                    endereco_funcionario
                from
                    tb_funcionario as f
                inner join tb_usuario as u
                on
                    f.id_usuario_funcionario = u.id_usuario
                where
                    f.id_usuario_funcionario = ?;
                ';

        return $sql;
    }

    public static function AlterarUsuarioNome() {
        $sql = 'update tb_usuario
                    set nome_usuario = ?
                where
                    id_usuario = ?';
        return $sql;
    }
    
    public static function AlterarUsuarioFuncionario() {
        $sql = ' update tb_funcionario 
                    set email_funcionario = ?,
                        telefone_funcionario = ?,
                        endereco_funcionario = ?
                    where
                        id_usuario_funcionario = ?';
        return $sql;
    }
    public static function AlterarUsuarioTecnico() {
        $sql = ' update tb_funcionario 
                    set email_funcionario = ?,
                        telefone_funcionario = ?,
                        endereco_funcionario = ?
                    where
                        id_usuario_funcionario = ?';
        return $sql;
    }

}
