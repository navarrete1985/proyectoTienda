<?php

namespace tienda\data;

use tienda\data\Articulo;
use tienda\tools\Util;

class ItemCart {

    use \tienda\common\Common;
    
    private $id, $modelo, $cantidad, $precio, $img;
    private $talla = 32;
    
    function __construct(Articulo $articulo, $cantidad = 1) {
        $this->set($articulo->get());
        $this->cantidad = $cantidad;
        $this->img = base64_encode(stream_get_contents($articulo->getImg()));
    }
    
    function getId() {
        return $this->id;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getPrecio() {
        return $this->precio;
    }
    
    function getImg() {
        return $this->img;
    }

    function setId($id) {
        $this->id = $id;
        return $this;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
        return $this;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
        return $this;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
        return $this;
    }
    
    function setImg($img) {
        $this->img = $img;
        return $this;
    }
}