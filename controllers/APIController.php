<?php

namespace Controllers;

use Model\Cita;
use Model\CitasServicios;
use Model\servicios;

class APIController{
    public static function index(){
        $servicios = servicios::all();
        echo json_encode($servicios);
    }

    public static function guardar(){

        //almacena la cita y devuelve el ID
        $cita = new Cita($_POST);
        $resultado = $cita->guardar();

        $id = $resultado['id'];

        //almacenar la cita y el servicio
        $idServicios = explode(",", $_POST['servicios']);

        foreach($idServicios as $idServicio){
            $args = [
                'citaId' => $id,
                'servicioId' => $idServicio
            ];
            $citaServicio = new CitasServicios($args);
            $citaServicio->guardar();
        }


        echo json_encode(['resultado' => $resultado]);
    }

    public static function eliminar(){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $cita = Cita::find($id);
            $cita->eliminar();
            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }
}


?>
