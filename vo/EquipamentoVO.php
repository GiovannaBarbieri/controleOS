<?php

class EquipamentoVO {

    private $IdEquip;
    private $identEquip;
    private $descricao;
    private $idNovoTipo;
    private $idModelo;
    private $idUsuario;

    public function getIdEquip() {
        return $this->IdEquip;
    }

    public function getIdentEquip() {
        return $this->identEquip;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getIdNovoTipo() {
        return $this->idNovoTipo;
    }

    public function getIdModelo() {
        return $this->idModelo;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdEquip($IdEquip) {
        $this->IdEquip = trim($IdEquip);
    }

    public function setIdentEquip($identEquip) {
        $this->identEquip = trim($identEquip);
    }

    public function setDescricao($descricao) {
        $this->descricao = trim($descricao);
    }

    public function setIdNovoTipo($idNovoTipo) {
        $this->idNovoTipo = trim($idNovoTipo);
    }

    public function setIdModelo($idModelo) {
        $this->idModelo = trim($idModelo);
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = trim($idUsuario);
    }

}
