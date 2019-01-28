<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Reader;
use tienda\data\Usuario;
use tienda\tools\Util;

class MainController extends Controller {
    
    function main() {
        if($this->getSesion()->isLogged()) {
        $this->getModel()->set('twigFile', '_index.twig');
        $usuario = $this->getSesion()->getLogin()->get();
        }
    }
    
    function tables(){
        if($this->getSesion()->isLogged()) {
            $this->getModel()->set('twigFile', '_tables.twig');
            $usuario = $this->getSesion()->getLogin()->get();
        }
    }
    function adduser(){
       if($this->getSesion()->isLogged()) {
        $this->getModel()->set('twigFile', '_admin-register.twig');
        $usuario = $this->getSesion()->getLogin()->get();
       }
    }
    
    
    function listadousuarios(){
        if($this->getSesion()->isLogged()) {
            $this->getModel()->set('twigFile', '_listadousuarios.twig');
            
            $this->getModel()->set('data', $this->getModel()->getAllUsers());
            $usuario = $this->getSesion()->getLogin()->get();
        }
    }
    
}
