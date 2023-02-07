<?php

namespace Model;

class Nacionalidad extends ActiveRecord{

    protected static $tabla = 'amc_nacionalidad'; //nombre de la tablaX
    protected static $columnasDB = ['ID','DESC','PAIS','SITUACION'];

    public $id;
    public $desc;
    public $pais;
    public $situacion;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->desc = utf8_decode(mb_strtoupper(trim($args['desc']))) ?? '';
        $this->pais = utf8_decode(mb_strtoupper(trim($args['pais']))) ?? '';
        $this->situacion = $args['situacion'] ?? '1';
    }

}