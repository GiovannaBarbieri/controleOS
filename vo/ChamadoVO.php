<?php

class ChamadoVO {

    private $idChamado;
    private $dataAbert;
    private $horaAbert;
    private $descricao;
    private $situacao;
    private $dataAtend;
    private $horaAtend;
    private $laudo;
    private $idEquipamento;
    private $idFuncSetor;
    private $idFuncTec;

    public function getIdChamado() {
        return $this->idChamado;
    }

    public function getDataAbert() {
        return $this->dataAbert;
    }

    public function getHoraAbert() {
        return $this->horaAbert;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function getDataAtend() {
        return $this->dataAtend;
    }

    public function getHoraAtend() {
        return $this->horaAtend;
    }

    public function getLaudo() {
        return $this->laudo;
    }

    public function getIdEquipamento() {
        return $this->idEquipamento;
    }

    public function getIdFuncSertor() {
        return $this->idFuncSetor;
    }

    public function getFuncTec() {
        return $this->idFuncTec;
    }

    public function setIdChamado($idChamado) {
        $this->idChamado = trim($idChamado);
    }

    public function setDataAbert($dataAbert) {
        $this->dataAbert = trim($dataAbert);
    }

    public function setHoraAbertura($horaAbertura) {
        $this->horaAbert = trim($horaAbertura);
    }

    public function setDescricao($descricao) {
        $this->descricao = trim($descricao);
    }

    public function setSituacao($situacao) {
        $this->situacao = trim($situacao);
    }

    public function setDataAtend($dataAtend) {
        $this->dataAtend = trim($dataAtend);
    }

    public function setHoraAtend($horaAtend) {
        $this->horaAtend = trim($horaAtend);
    }

    public function setLaudo($laudo) {
        $this->laudo = trim($laudo);
    }

    public function setIdEquipamento($idEquipamento) {
        $this->idEquipamento = trim($idEquipamento);
    }

    public function setIdFuncSetor($idFuncSetor) {
        $this->idFuncSetor = trim($idFuncSetor);
    }

    public function setIdFuncTec($idFuncTec) {
        $this->idFuncTec = trim($idFuncTec);
    }

}
