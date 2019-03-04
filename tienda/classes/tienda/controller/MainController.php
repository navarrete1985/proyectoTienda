<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Reader;
use tienda\data\Usuario;
use tienda\tools\Util;

class MainController extends Controller {
    
    function main() {
        $this->getModel()->set('twigFile', '_main.twig');
        $pagina = 1;
        $orden = 'marca';
        $r = $this->getModel()->getDoctrineZapatos($pagina,$orden);
        $this->getModel()->set('data',$r);
    }
    
    function item() {
        $product_id = Reader::read('id');
        $product = $this->getModel()->get('Articulo', ['id' => $product_id]);
        if ($product === null) {
            $this->sendRedirect('index');
        }
        $img = base64_encode(stream_get_contents($product->getImg()));
        $folder = './resources/images/articulos/id_' . $product_id;
        $this->getModel()->set('twigFile', 'product.twig');
        $this->getModel()->set('img', $img);
        $this->getModel()->set('images', Util::getImagesUrls($folder));
        $this->getModel()->set('item', $product);
    }
    
     function listarZapato() {
        $pagina = Reader::read('pagina');
        if($pagina === null || !is_numeric($pagina)) {
            $pagina = 1;
        }
        
        $r = $this->getModel()->getDoctrineZapatos($pagina,$orden);
        $this->getModel()->add($r);
    }
}
