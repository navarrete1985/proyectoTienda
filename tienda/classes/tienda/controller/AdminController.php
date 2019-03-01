<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Reader;
use tienda\data\Usuario;
use tienda\tools\Util;

class AdminController extends Controller {
    
    function __construct(Model $model) {
        parent::__construct($model);
        $this->checkIsLogged();
        $usuario = $this->getSesion()->getLogin()->get();
        $this->getModel()->set('session', $usuario);
    } 
    
    function main() {
        $this->getModel()->set('twigFile', '_index.twig');
    }
    
    function tables(){
        $this->getModel()->set('twigFile', '_tables.twig');
    }
    
    function adduser(){
        $this->getModel()->set('twigFile', '_admin-register.twig');
    }
    
    function addzapatos(){
        $this->getModel()->set('twigFile', '_admin-registerproduct.1.twig');
        $this->getModel()->set('zapato', true);
    }
    
    function addcomplementos(){
        $this->getModel()->set('twigFile', '_admin-registerproduct.1.twig');
    }
    
    function listadousuarios(){    
        $this->getModel()->set('twigFile', '_listadousuarios.twig');
        $this->getModel()->set('data', $this->getModel()->getAllUsers());
    }
    
    function addcolor() {
        $this->getModel()->set('twigFile', '_admin-registercolor.twig');
    }
    
    function adddestinatario() {
        $this->getModel()->set('twigFile', '_admin-registercaracteristica.twig');
        $this->getModel()->set('section', ['type' => 2, 'action' => 'data-type="destinatario"']);
    }
    
    function addcategoria() {
        $this->getModel()->set('twigFile', '_admin-registercaracteristica.twig');
        $this->getModel()->set('section', ['type' => 1, 'action' => 'data-type="categoria"']);
    }
    
    function edituser(){
        $id = Reader::read('id');
        $this->getModel()->set('twigFile', '_admin-register.twig');
        $user = $this->getModel()->get('Usuario',['id' => $id]);
        
        $this->getModel()->set('user', $user);
        $this->getModel()->set('edit', true);
    }
    
    function checkPermission() {
        if ($this->getSesion()->getLogin()->getRol() != 1) {
            $this->sendRedirect('index/main');
        }
    }
}
