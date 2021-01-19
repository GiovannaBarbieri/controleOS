<?php

class UtilCtrl {

    private static function IniciarSessao() {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public static function CriarSessao($id, $tipo, $idSetor, $idFunc) {

        self::IniciarSessao();
        $_SESSION['tipo'] = $tipo;
        $_SESSION['idUser'] = $id;
        if ($idSetor != '') {
            $_SESSION['idsetor'] = $idSetor;
        }
        if ($idSetor != '') {
            $_SESSION['idFunc'] = $idFunc;
        }
    }

    public static function ReornarIdSetor() {
        self::IniciarSessao();
        return $_SESSION['idsetor'];
    }
    
      public static function ReornarIdFunc() {
        self::IniciarSessao();
        return $_SESSION['idFunc'];
    }

    public static function Deslogar() {
        self::IniciarSessao();
        unset($_SESSION['tipo']);
        unset($_SESSION['idUser']);

        if(isset($_SESSION['idsetor'])){
            unset($_SESSION['idsetor']);
        }
        if(isset($_SESSION['idFunc'])){
            unset($_SESSION['idFunc']);
        }
        
        header('location: login.php');
    }

    public static function VerTipoPermissao($tipo) {
        if ($tipo != self::RetornarCodigoTipoLogado()) {
            self::Deslogar();
        }
    }

    public static function VerificarLogado() {
        self::IniciarSessao();
        if (!(isset($_SESSION['idUser'])) && !(isset($_SESSION['tipo']))) {
            header('location: login.php');
        }
    }

    public static function RetornarCodigoUserAdm() {
        self::IniciarSessao();
        return $_SESSION['idUser']; //retorna o numero do id usuario adm logado
    }

    public static function RetornarCodigoTipoLogado() {
        self::IniciarSessao();
        return $_SESSION['tipo'];
    }

    public static function RetornaTipoUsuario($tipo) {

        $nome = '';

        switch ($tipo) {
            case 1:
                $nome = 'Administrador';

                break;

            case 2:
                $nome = 'Setor';
                break;

            case 3:
                $nome = 'Técnico';
                break;
        }
        return $nome;
    }
public static function RetornaSituacao($sit) {

        $nome = '';

        switch ($sit) {
            case 1:
                $nome = '<i>Aguardando atendimento</i>';

                break;

            case 2:
                $nome = '<i>Em atendimento</i>';
                break;

            case 3:
                $nome = '<i>Finalizado</i>';
                break;
        }
        return $nome;
    }

    private static function SetarFusoHorario() {
        date_default_timezone_set('America/Sao_Paulo');
    }

    public static function DataAtual() {
        self::SetarFusoHorario();
        return date('Y-m-d');
    }
    
     public static function HoraAtual() {
        self::SetarFusoHorario();
        return date('H:i:s');
    }
    public static function MostrarData($data){
        return explode('-', $data)[2] . '/' . explode( '-', $data)[1] . '/' .explode('-', $data)[0];
    }
    public static function MostraHora($hora){
        return explode(':', $hora)[0].explode(':', $hora)[1];
    }
}
