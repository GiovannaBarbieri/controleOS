<?php

require_once 'UsuarioVO.php';

class FuncionarioVO extends UsuarioVO {

    private $idFuncionario;
    private $idUsuarioFuncionario;
    private $idSetor;
    private $emailFuncionario;
    private $telefoneFuncionario;
    private $enderecoFuncionario;
    private $idUserAdm;

    public function getIdFuncionario() {
        return $this->idFuncionario;
    }

    public function getIdUsuarioFuncionario() {
        return $this->idUsuarioFuncionario;
    }

    public function getIdSetor() {
        return $this->idSetor;
    }

    public function getEmailFuncionario() {
        return $this->emailFuncionario;
    }

    public function getTelefoneFuncionario() {
        return $this->telefoneFuncionario;
    }

    public function getEnderecoFuncionario() {
        return $this->enderecoFuncionario;
    }

    public function getIdUserAdm() {
        return $this->idUserAdm;
    }

    public function setIdFuncionario($idFuncionario) {
        $this->idFuncionario = trim($idFuncionario);
    }

    public function setIdUsuarioFuncionario($idUsuarioFuncionario) {
        $this->idUsuarioFuncionario = trim($idUsuarioFuncionario);
    }

    public function setIdSetor($idSetor) {
        $this->idSetor = trim($idSetor);
    }

    public function setEmailFuncionario($emailFuncionario) {
        $this->emailFuncionario = trim($emailFuncionario);
    }

    public function setTelelefoneFuncionario($telefoneFuncionario) {
        $this->telefoneFuncionario = trim($telefoneFuncionario);
    }

    public function setEnderecoFuncionario($enderecoFuncionario) {
        $this->enderecoFuncionario = trim($enderecoFuncionario);
    }

    public function setIdUserAdm($idUserAdm) {
        $this->idUserAdm = trim($idUserAdm);
    }

}
