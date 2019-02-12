<?php

namespace tienda\model;

use tienda\tools\BoostrapSingleton;

class Model {
    
    protected $datosVista = array();
    
    private $bootstrap,
             $gestor;
    
    function __construct() {
        $this->bootstrap = BoostrapSingleton::getInstance();
        $this->gestor = $this->bootstrap->getEntityManager();
    }

    function get($name) {
        if(isset($this->datosVista[$name])) {
            return $this->datosVista[$name];
        }
        return null;
    }

    function getViewData() {
        return $this->datosVista;
    }

    function set($name, $value) {
        $this->datosVista[$name] = $value;
        return $this;
    }
}
 