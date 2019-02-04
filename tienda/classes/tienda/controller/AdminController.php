<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Reader;
use tienda\data\Usuario;
use tienda\tools\Util;

class AdminController extends Controller {
    
    function main() {
        $this->checkIsLogged();
        $this->getModel()->set('twigFile', '_index.twig');
        $usuario = $this->getSesion()->getLogin()->get();
    }
    
    function tables(){
        $this->checkIsLogged();
        $this->getModel()->set('twigFile', '_tables.twig');
        $usuario = $this->getSesion()->getLogin()->get();
    }
    
    function adduser(){
        $this->checkIsLogged();
        $this->getModel()->set('twigFile', '_admin-register.twig');
        $usuario = $this->getSesion()->getLogin()->get();
    }
    function addproduct(){
        $this->checkIsLogged();
        $this->getModel()->set('twigFile', '_admin-registerproduct.twig');
        $usuario = $this->getSesion()->getLogin()->get();
    }
    
    
    function listadousuarios(){
        $this->checkIsLogged();    
        $this->getModel()->set('twigFile', '_listadousuarios.twig');
        $this->getModel()->set('data', $this->getModel()->getAllUsers());
        $usuario = $this->getSesion()->getLogin()->get();
    }
    
}
