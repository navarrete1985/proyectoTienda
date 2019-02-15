<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Reader;
use tienda\data\Usuario;
use tienda\tools\Util;
use tienda\app\App;
use tienda\tools\Mail;

class AjaxController extends Controller {
    
    function main() {
        // $this->checkIsAdmin();
    }
    
    function listarUsuario() {
        // $this->checkIsAdmin();
        $ordenes = [
            'id' => '',
            'nombre' => '',
            'correo' => '',
            'apellidos' => '',
            'alias' => '',
            'direccion' => '',
            'activo' => '',
            'rol' => '',
        ];
        $pagina = Reader::read('pagina');
        if($pagina === null || !is_numeric($pagina)) {
            $pagina = 1;
        }
        $orden = Reader::read('orden');
        if(!isset($ordenes[$orden])) {
            $orden = 'nombre';
        }                                        //$pagina, $orden
        $r = $this->getModel()->getDoctrineUsuarios($pagina,$orden);
        $this->getModel()->add($r);
    }
    
    function deleteuser() {
        $this->checkIsAdmin();
        $id = Reader::read('id');
        $this->getModel()->delete('Usuario',['id' => $id]);
    }
    
    function isavailable() {
        // $this->checkIsAdmin();
        $class = ucfirst(strtolower(Reader::read('class')));
        $key = Reader::read('key');
        $value = Reader::read('value');
        $result = $this->getModel()->get($class, [$key => $value]);
        $this->getModel()->set('result', ($result == null) ? 1 : 0);
    }
    
    function adddata() {
        // $this->checkIsAdmin();
        $class = Reader::read('class');
        $obj = Reader::readObject(App::OBJECT[$class]);
        switch ($class) {
            case 'usuario':
                $obj->setClave(Util::encriptar($obj->getClave()));
                $obj->setActivo($obj->getActivo() == 'on' ? 1 : 0);
                $obj->setRol($obj->getRol() == 'on' ? 1 : 0);
                break;
        }
        $result = 0;
        if ($obj !== null) {
            $this->getModel()->create($obj);
            $result = $obj->getId() > 0 ? 1 : 0;
            if ($class == 'usuario') {
                $mail = Mail::sendActivation($obj);
            }
        }
        
        $this->getModel()->set('result', $result);
    }

    
}
