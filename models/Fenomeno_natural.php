<?php

namespace Model;

class Fenomeno_natural extends ActiveRecord{

    protected static $tabla = 'amc_fenomeno_natural'; //nombre de la tablaX
    protected static $columnasDB = ['ID','DESC','SITUACION'];

    public $id;
    public $desc;
    public $situacion;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->desc = utf8_decode(mb_strtoupper(trim($args['desc']))) ?? '';
        $this->situacion = $args['situacion'] ?? '1';
    }

}