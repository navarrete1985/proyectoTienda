<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Reader;
use tienda\data\Usuario;
use tienda\tools\Util;

class MainController extends Controller {
    
    function main() {
        // $this->checkIsLogged();
        $this->getModel()->set('twigFile', 'product.twig');
        // $usuario = $this->getSesion()->getLogin()->get();
    }
}
