<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Reader;
use tienda\data\Usuario;
use tienda\tools\Util;

class AjaxController extends Controller {
    
    function main() {
        $this->getModel()->set('twigFile', 'blog3-col.twig');
    }
    
    function listarUsuario() {
        // $ordenes = [
        //     'id' => '',
        //     'nombre' => '',
        //     'correo' => '',
        //     'apellidos' => '',
        //     'alias' => '',
        //     'direccion' => '',
        //     'activo' => '',
        //     'rol' => '',
        //     'fechaalta' => '',
        //     'clave' => ''
        // ];
        // $pagina = Reader::read('pagina');
        // if($pagina === null || !is_numeric($pagina)) {
        //     $pagina = 1;
        // }
        // $orden = Reader::read('orden');
        // if(!isset($ordenes[$orden])) {
        //     $orden = 'nombre';
        // }
        $r = $this->getModel()->getDoctrineUsuarios($pagina, $orden);
        $this->getModel()->add($r);
    }
    
    
    
    


    
}
