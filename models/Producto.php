<?php

namespace Model;

class Producto extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'productos';
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

    public function validar() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'El Nombre del Producto es Obligatorio';
        }

        if(!$this->precio) {
            self::$alertas['error'][] = 'El Precio del Producto es Obligatorio';
        }

        if(!is_numeric($this->precio)) {
            self::$alertas['error'][] = 'El Precio no es válido';
        }

        return self::$alertas;
    }
}

?>