<?php

namespace Model;

class Servicios extends ActiveRecord {
    //base de datos
    protected static $tabla = 'servicios';
    protected static $columnasDB = ['id', 'nombre', 'precio'];

    public $id;
    public $nombre;
    public $precio;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? '';
    }

    public function validar()
    {
        if(!$this->nombre){
            self::$alertas['error'][] = 'El nombre del servicio es Obligatorio';
        }
        if(!$this->precio){
            self::$alertas['error'][] = 'El precio del servicio es Obligatorio';
        }

        if(!is_numeric($this->precio)){
            self::$alertas['error'][] = 'El precio no es valido';
        }

        return self::$alertas;
    }
}

?>