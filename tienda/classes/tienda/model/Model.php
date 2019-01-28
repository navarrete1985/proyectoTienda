<?php

namespace tienda\model;

class Model {

    protected $db;
    protected $datosVista = array();

    function __construct() {
        // $this->db = new Database();
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