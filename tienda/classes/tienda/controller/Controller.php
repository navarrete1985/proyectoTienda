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
    
    function checkIsLogged() {
        if (!$this->sesion->isLogged() || $this->sesion->getLogin()->getActivo() === 0) {
            $this->sesion->logout();
            $this->sendRedirect('login/main');
        }
    }
    
    function getAlerts($usuario = null) {
        $op = Reader::read('op');
        $resultado = Reader::read('resultado');
        $alert = Alert::getAlert($op, $resultado);
        if ($usuario !== null && $op === 'login') {
            $alert['text'] .= '<strong> ' . $usuario . '<strong>';
        }
        if ($op !== null && $resultado !== null) {
            $this->getModel()->set('alert', $alert);   
        }
    }
    
    function sendRedirect($target = 'index/main') {
        header('Location: ' . App::BASE . $target);
        exit();
    }
    
    function checkIsAdmin() {
        if ($this->checkIsLogged() && $this->__isAdmin()) {
            return;
        }
        $this->sendRedirect();
    }
    
    protected function __isAdmin() {
        return $this->sesion->getLogin()->getAdministrador() == 1;
    }
}