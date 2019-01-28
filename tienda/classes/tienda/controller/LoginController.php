<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Util;
use tienda\tools\Reader;
use tienda\app\App;
use tienda\tools\Mail;

class LoginController extends Controller {
    
    function main() {
        $this->getModel()->set('login', true);
        $this->getModel()->set('twigFile', '_login.twig');
    }
    
    function signup() {
        $this->getModel()->set('twigFile', '_signup.twig');
    }
}
