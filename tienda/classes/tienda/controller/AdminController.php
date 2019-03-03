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
        $this->checkPermission();
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
        $this->getModel()->set('user', false);
        $this->getModel()->set('edit', false);
    }
    
    function addzapatos(){
        $this->getModel()->set('twigFile', '_admin-registerproduct.1.twig');
        $this->getModel()->set('zapato', true);
        $this->getModel()->set('destinatarios', $this->getModel()->getAll('Destinatario'));
        $this->getModel()->set('categories', $this->getModel()->getAll('Categoria'));
    }
    
    function addcomplementos(){
        $this->getModel()->set('twigFile', '_admin-registerproduct.1.twig');
        $this->getModel()->set('destinatarios', $this->getModel()->getAll('Destinatario'));
        $this->getModel()->set('categories', $this->getModel()->getAll('Categoria'));
    }
    
    function listadousuarios(){    
        $this->getModel()->set('twigFile', '_listadousuarios.twig');
        $this->getModel()->set('data', $this->getModel()->getAllUsers());
    }
    
    function addcolor() {
        $this->getModel()->set('twigFile', '_admin-registercolor.twig');
        $this->getModel()->set('colors', $this->getModel()->getAll('Color'));
    }
    
    function adddestinatario() {
        $elements = $this->getModel()->getAll('Destinatario');
        $this->getModel()->set('twigFile', '_admin-registercaracteristica.twig');
        $this->getModel()->add(['section' => ['type' => 2, 'action' => 'data-type="destinatario"'], 'data' => $elements]);
    }
    
    function addcategoria() {
        $elements = $this->getModel()->getAll('Categoria');
        $this->getModel()->set('twigFile', '_admin-registercaracteristica.twig');
        $this->getModel()->add(['section' => ['type' => 1, 'action' => 'data-type="categoria"'], 'data' => $elements]);
    }
    
    function edituser(){
        $id = Reader::read('id');
        $this->getModel()->set('twigFile', '_admin-register.twig');
        $user = $this->getModel()->get('Usuario',['id' => $id]);
        
        $this->getModel()->set('user', $user);
        $this->getModel()->set('edit', true);
    }
    
    function editarticulo(){
        $id = Reader::read('id');
        $this->getModel()->set('twigFile', '_admin-registerproduct.1.twig');
        $articulo = $this->getModel()->get('Articulo',['id' => $id]);
        
        $this->getModel()->set('articulo', $articulo);
        
        $categorias = $this->getModel()->getAll('Categoria');
        $catArt=[];
        foreach($articulo->getCategorias() as $valor){
            $catArt[]  = $valor->getCategoria()->getUnset(array('articulos','nombre','categoria'))['id'];
        }
        // echo Util::varDump($catArt);
        // exit();
        $this->getModel()->set('categories', $categorias);
        $this->getModel()->set('catArt', $catArt);
        $this->getModel()->set('edit', true);
    }
    
    function checkPermission() {
        if ($this->getSesion()->getLogin()->getRol() != 1) {
            $this->sendRedirect('index/main');
        }
    }
}
