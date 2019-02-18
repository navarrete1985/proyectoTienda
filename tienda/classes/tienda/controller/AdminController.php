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
    
    function addzapatos(){
        $this->checkIsLogged();
        $this->getModel()->set('twigFile', '_admin-registerproduct.1.twig');
        $this->getModel()->set('zapato', true);
        $usuario = $this->getSesion()->getLogin()->get();
    }
    
    function addcomplementos(){
        $this->checkIsLogged();
        $this->getModel()->set('twigFile', '_admin-registerproduct.1.twig');
        $usuario = $this->getSesion()->getLogin()->get();
    }
    
    function listadousuarios(){
        $this->checkIsLogged();    
        $this->getModel()->set('twigFile', '_listadousuarios.twig');
        $this->getModel()->set('data', $this->getModel()->getAllUsers());
        $usuario = $this->getSesion()->getLogin()->get();
    }
    
    
    
    function edituser(){
        $this->checkIsLogged();  
        $id = Reader::read('id');
        

            $this->getModel()->set('twigFile', '_admin-register.twig');
            $user = $this->getModel()->get('Usuario',['id' => $id]);
            
            $this->getModel()->set('user', $user);
            $this->getModel()->set('edit', true);
            

    }
    
    
}
