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
        $this->getModel()->set('twigFile', 'blog3-col.twig');
        // $usuario = $this->getSesion()->getLogin()->get();
        $pagina = 1;
        $orden = 'marca';
        $r = $this->getModel()->getDoctrineZapatos($pagina,$orden);
        // echo Util::varDump($r);
        // exit();
        $this->getModel()->set('data',$r);
        
    }
    
    
     function listarZapato() {
        $pagina = Reader::read('pagina');
        if($pagina === null || !is_numeric($pagina)) {
            $pagina = 1;
        }
        // $orden = Reader::read('orden');
        
        // if (!property_exists(App::OBJECT['articulo'],  $orden)) {
        //     $orden = 'marca';
        // }
                                                //$pagina, $orden
        $r = $this->getModel()->getDoctrineZapatos($pagina,$orden);
       
        $this->getModel()->add($r);
    }
}
