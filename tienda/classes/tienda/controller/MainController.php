<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Util;
use tienda\tools\Reader;
use tienda\app\App;
use tienda\tools\Mail;

class MainController extends Controller {
    
    function main() {
        $this->getModel()->set('twigFile', '_index.twig');
    }
    
    function dodelete() {
        $this->checkIsLogged();
        if ($this->__isAdmin()) {
            $result = $this->getModel()->deleteUser(Reader::read('id'));
            $this->sendRedirect('Location: index/main?op=delete&resultado=' . $result);
        }else {
            $this->sendRedirect();
        }
    }
}
