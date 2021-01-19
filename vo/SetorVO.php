<?php

class SetorVO {

    private $idSetor;
    private $nomeSetor;
    private $idUser;

    public function getIdSetor() {
        return $this->idSetor;
    }

    public function getNomeSetor() {
        return $this->nomeSetor;
    }
    public function getIdUser(){
        return $this->idUser;
    }

    public function setIdSetor($idSetor) {
        $this->idSetor = trim($idSetor);
    }

    public function setNomeSetor($nomeSetor) {
        $this->nomeSetor = trim($nomeSetor);
    }
    public function setIdUser($idUser) {
        $this->idUser = trim($idUser);
    }

}
