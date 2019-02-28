<?php

namespace tienda\mvc;

class Router {

    private static $instance;
    private $rutas, $ruta;
    
    function __construct() {
        $this->rutas = array(
            'index'     => new Route('ProductosModel', 'MainView' , 'MainController'),
            'login'     => new Route('UserModel', 'AdminView', 'LoginController'),
            'admin'     => new Route('UserModel', 'AdminView' , 'AdminController'),
            'cuenta'     => new Route('UserModel', 'MainView', 'UserController'),
            'pedidos'     => new Route('PedidosModel', 'MainView' , 'PedidosController'),
            'productos'     => new Route('ProductosModel', 'MainView' , 'ProductosControllers'),
            'ajax'      => new Route('AjaxModel', 'AjaxView', 'AjaxController')
        );
    }

    static function getInstance($ruta) {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }
        self::$instance->__setRoute($ruta);
        return self::$instance;
    }

    function getRoute() {
        $ruta = $this->rutas['index'];
        if(isset($this->rutas[$this->ruta])) {
            $ruta = $this->rutas[$this->ruta];
        }
        return $ruta;
    }
    
    function __setRoute($ruta) {
        $this->ruta = $ruta;
    }
    
    function __clone() {
        trigger_error("No se puede crear un clon de la clase " . get_class($this) . " class.", E_USER_ERROR);
    }
}