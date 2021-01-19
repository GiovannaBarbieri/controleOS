<?php


class TipoVO {
    private $idNovoTipo;
    private $nomeTipo;
    private $idUser;
    
    public function getIdNovoTipo() {
        return $this->idNovoTipo;
    }
    public function getNomeTipo() {
        return $this->nomeTipo;
    }
    public function getIdUser() {
        return $this->idUser;
    }
    public function setIdNovoTipo($idNovoTipo) {
        $this->idNovoTipo = trim($idNovoTipo);
    }
    public function setNomeTipo($nomeTipo) {
        $this->nomeTipo = trim($nomeTipo);
    }
    public function setIdUser($idUser) {
        $this->idUser = trim($idUser);
    }
}
