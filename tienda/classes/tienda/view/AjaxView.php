<?php

namespace tienda\view;

use tienda\model\Model;

class AjaxView extends View {

    function render($accion) {
        header('Content-type:application/json');

        $data = $this->getModel()->getViewData();
        return json_encode($data, true);
    }
}