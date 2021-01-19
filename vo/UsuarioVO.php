<?php

class UsuarioVO {

    private $idUsuario;
    private $nome;
    private $login;
    private $senha;
    private $tipo;

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = trim($idUsuario);
    }

    public function setNome($nome) {
        $this->nome = trim($nome);
    }

    public function setLogin($login) {
        $this->login = trim($login);
    }

    public function setSenha($senha) {
        $this->senha = trim($senha);
    }

    public function setTipo($tipo) {
        $this->tipo = trim($tipo);
    }

}
