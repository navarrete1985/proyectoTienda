<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Reader;
use tienda\data\Usuario;
use tienda\tools\Util;

class PedidosController extends Controller {
    
    function main() {
        $this->checkIsLogged();
        $cart = $this->getSesion()->get('cart');
        $this->getModel()->set('cart', $cart);
        $this->getModel()->set('twigFile', 'pedidos.twig');
        $pagina=1;
        $orden = "fechaexp";
        $pedidos = $this->getModel()->getPedidos($this->getSesion()->getLogin()->getId(), $pagina, $orden);
        
        $this->getModel()->set('data',$pedidos);
    }
    
    function detallespedido(){
        $id = Reader::read('id');
        $r = $this->getModel()->getDetalles($id);
         $this->getModel()->add($r);
    }
}
