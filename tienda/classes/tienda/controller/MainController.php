<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Reader;

class MainController extends Controller {
    
    function main() {
        $this->getModel()->set('twigFile', '_index.twig');
    }
    
}
