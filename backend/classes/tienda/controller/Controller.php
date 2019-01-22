<?php

namespace tienda\controller;

use tienda\app\App;
use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Reader;
use tienda\tools\Alert;

abstract class Controller {

    protected $model;
    protected $sesion;
    
    abstract function main();

    function __construct(Model $model) {
        $this->model = $model;
        $this->sesion = new Session(App::SESSION_NAME);
        $this->getModel()->set('urlbase', App::BASE);
    }
    
    function getModel() {
        return $this->model;
    }
    
    function getSesion() {
        return $this->sesion;
    }
}