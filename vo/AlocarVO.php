<?php


class AlocarVO {
    private $idAlocar;
    private $dataAloc;
    private $dataRemov;
    private $idSetor;
    private $idEquip;
    private $idUser;
    
    public function getIdAlocar() {
        return $this->idAlocar;
    }
    public function getDataAloc() {
        return $this->dataAloc;
    }
    public function getDataRemov() {
        return $this->dataRemov;
    }
    public function getIdSetor() {
        return $this->idSetor;
    }
    public function getIdEquip(){
        return $this->idEquip;
    }
    public function getIdUser() {
        return $this->idUser;
    }
    public function setIdAlocar($idAlocar) {
        $this->idAlocar = trim($idAlocar);
    }
    public function setDataAloc($dataAloc) {
        $this->dataAloc = trim($dataAloc);
    }
    public function setDataRemov($dataRemov) {
        $this->dataRemov = trim($dataRemov);
    }
    public function setIdSetor($idSetor) {
        $this->idSetor = trim($idSetor);
    }
    public function setIdEquip($idEquip) {
        $this->idEquip = trim($idEquip);
    }
    public function setIdUser($idUser) {
        $this->idUser = trim($idUser);
    }
    
}
