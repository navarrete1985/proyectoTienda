<?php

namespace tienda\model;

use tienda\tools\Bootstrap;

class Model {
    
    protected $datosVista = array();
    
    protected $bootstrap,
              $gestor;
    
    function __construct() {
        $this->bootstrap = Bootstrap::getInstance();
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
    
    function add(array $array) {
        foreach($array as $indice => $valor) {
            $this->set($indice, $valor);
        }
    }
}
 