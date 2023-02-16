<?php

namespace Controllers;

use Model\Delitos;
use MVC\Router;
class DelitosController{

    public function index(Router $router)
    {
        $router->render('delitos/index');
    }

    public function guardarAPI(){
        getHeadersApi();

        try {
            // $_POST["desc"] = strtoupper($_POST["desc"]);
            $delitos = new Delitos($_POST);
            $valor = $_POST["desc"];
            $existe = Delitos::SQL("select * from amc_delito where situacion =1 AND desc = '$valor'");
            if (count($existe)>0){
               echo json_encode([
                   "mensaje" => "El registro ya existe",
                   "codigo" => 2,
               ]);
               exit;
            }
             
            $resultado = $delitos->guardar();
    
            if($resultado['resultado'] == 1){
                echo json_encode([
                    "mensaje" => "El registro se guardo",
                    "codigo" => 1,
                ]);
                
            }else{
                echo json_encode([
                    "mensaje" => "Ocurrió un error",
                    "codigo" => 0,
                ]);
    
            }
        } catch (Exception $e) {
            echo json_encode([
                "detalle" => $e->getMessage(),       
                "mensaje" => "Ocurrió un error en base de datos",

                "codigo" => 4,
            ]);
        }
        
    }

    public function buscarApi(){
        getHeadersApi();
        $delitos = Delitos::where('situacion', '1');
        echo json_encode($delitos);
    }

    public function modificarAPI(){
        getHeadersApi();
       try {
            $_POST["desc"] = strtoupper($_POST["desc"]);
            $delitos = new Delitos($_POST);
            $valor = $_POST["desc"];
            $existe = Delitos::SQL("select * from amc_delito where situacion =1 AND desc = '$valor'");
            if (count($existe)>0){
               echo json_encode([
                   "mensaje" => "El registro ya existe",
                   "codigo" => 2,
               ]);
               exit;
            }
             
            $resultado = $delitos->guardar();
    
            if($resultado['resultado'] == 1){
                echo json_encode([
                    "mensaje" => "El registro se guardo",
                    "codigo" => 1,
                ]);
                
            }else{
                echo json_encode([
                    "mensaje" => "Ocurrió un error",
                    "codigo" => 0,
                ]);
    
            }
        } catch (Exception $e) {
            echo json_encode([
                "detalle" => $e->getMessage(),       
                "mensaje" => "Ocurrió un error en base de datos",

                "codigo" => 4,
            ]);
        }
    }

    public function eliminarAPI(){
        getHeadersApi();
        $_POST['situacion'] = 0;
        $delitos = new Delitos($_POST);
        
        $resultado = $delitos->guardar();

        if($resultado['resultado'] == 1){
            echo json_encode([
                "resultado" => 1
            ]);
            
        }else{
            echo json_encode([
                "resultado" => 0
            ]);

        }
    }
} 

