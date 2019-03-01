<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Reader;
use tienda\data\Usuario;
use tienda\tools\Util;

class PedidosController extends Controller {
    
    function main() {
        // $this->checkIsLogged();
        $this->getModel()->set('twigFile', 'pedidos.twig');
        $pagina=1;
        $orden = "fechaexp";
        $pedidos = $this->getModel()->getPedidos($this->getSesion()->getLogin()->getId(), $pagina, $orden);
        
        // echo Util::varDump($pedidos);
        // exit();
        $this->getModel()->set('data',$pedidos);

         
    }
    
    
    function detallespedido(){
        $id = Reader::read('id');
        $r = $this->getModel()->getDetalles($id);
        // echo Util::varDump($detalles);
        // exit();
         $this->getModel()->add($r);
    }
}
