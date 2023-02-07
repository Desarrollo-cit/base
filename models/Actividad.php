<?php

namespace Model;

class Actividad extends ActiveRecord{

    protected static $tabla = 'amc_actividad_vinculada'; //nombre de la tablaX
    protected static $columnasDB = ['ID','DESC', 'SITUACION'];

    public $id;
    public $desc;
    public $situacion;


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->desc = $args['desc'] ?? '';
        $this->situacion = $args['situacion'] ?? '1';
    }

}