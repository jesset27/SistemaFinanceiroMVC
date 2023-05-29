<?php 
namespace App\Models\Entidades;
class Contato {
    private int $uso_id;
    private string $con_msg;
    private string $con_titulo;
    private string $con_lida;

    public function __construct($uso_id, $con_msg, $con_titulo, $con_lida){
        $this->uso_id = $uso_id;
        $this->con_msg = $con_msg;
        $this->con_titulo = $con_titulo;
        $this->con_lida = $con_lida;
    }

    public function getUsoId() {
        return $this->uso_id;
    }

    public function setUsoId($uso_id) {
        $this->$uso_id = $uso_id;
    }

    public function getConMsg() {
        return $this->con_msg;
    }

    public function setConMsg($con_msg) {
        $this->con_msg = $con_msg;
    }

    public function getConTitulo() {
        return $this->con_titulo;
    }

    public function setConTitulo($con_titulo) {
        $this->con_titulo = $con_titulo;
    }

    public function getConLida() {
        return $this->con_lida;
    }

    public function setConLida($con_lida) {
        $this->con_lida = $con_lida;
    }
}
