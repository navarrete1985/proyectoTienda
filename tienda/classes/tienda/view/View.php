<?php

namespace tienda\view;

use tienda\model\Model;
use tienda\tools\Util;

class View {

    private $model;

    function __construct(Model $model) {
        $this->model = $model;
        $this->getModel()->set('twigFolder', 'twigtemplates/admintemplate');
        $this->getModel()->set('twigFile', '_index.twig');
    }
    
    function getModel() {
        return $this->model;
    }

    function render($accion) {
        $data = $this->getModel()->getViewData();
        $loader = new \Twig_Loader_Filesystem($data['twigFolder']);
        $twig = new \Twig_Environment($loader);
        return $twig->render($data['twigFile'], $data);
    }
}