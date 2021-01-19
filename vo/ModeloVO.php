<?php

class ModeloVO {

    private $idModelo;
    private $nomeModelo;
    private $idUsuario;

    public function getIdModelo() {
        return $this->idModelo;
    }

    public function getNomeModelo() {
        return $this->nomeModelo;
    }
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdModelo($idModelo) {
        $this->idModelo = trim($idModelo);
    }

    public function setNomeModelo($nomeModelo) {
        $this->nomeModelo = trim($nomeModelo);
    }
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = trim($idUsuario);
    }

}

?>