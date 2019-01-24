<?php

namespace tienda\mvc;

class Route {

    private $modelo, $vista, $controlador;

    function __construct($modelo, $vista, $controlador) {
        $this->modelo = $modelo;
        $this->vista = $vista;
        $this->controlador = $controlador;
    }
    
    function getController() {
        return 'tienda\\controller\\' . $this->controlador;
    }

    function getModel() {
        return 'tienda\\model\\' . $this->modelo;
    }

    function getView() {
        return 'tienda\\view\\' . $this->vista;
    }
}