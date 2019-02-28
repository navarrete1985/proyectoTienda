<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Reader;
use tienda\data\Usuario;
use tienda\tools\Util;
use tienda\app\App;
use tienda\tools\Mail;
use tienda\tools\Multiupload;

class AjaxController extends Controller {
    
    function main() {
        $this->checkIsAdmin();
    }
    
    function listarUsuario() {
        $this->checkIsAdmin();
        
        $pagina = Reader::read('pagina');
        if($pagina === null || !is_numeric($pagina)) {
            $pagina = 1;
        }
        $orden = Reader::read('orden');
        
        if (!property_exists(App::OBJECT['usuario'],  $orden)) {
            $orden = 'nombre';
        }
                                                //$pagina, $orden
        $r = $this->getModel()->getDoctrineUsuarios($pagina,$orden);
        $this->getModel()->add($r);
    }
    
    function listarZapato() {
        $this->checkIsAdmin();
        
        $pagina = Reader::read('pagina');
        if($pagina === null || !is_numeric($pagina)) {
            $pagina = 1;
        }
        $orden = Reader::read('orden');
        
        if (!property_exists(App::OBJECT['articulo'],  $orden)) {
            $orden = 'marca';
        }
                                                //$pagina, $orden
        $r = $this->getModel()->getDoctrineZapatos($pagina,$orden);
       
        $this->getModel()->add($r);
    }
    
    function deleteuser() {
        $this->checkIsAdmin();
        $id = Reader::read('id');
        $this->getModel()->delete('Usuario',['id' => $id]);
    }
    
    function isavailable() {
        $this->checkIsAdmin();
        $class = ucfirst(strtolower(Reader::read('class')));
        $key = Reader::read('key');
        $value = Reader::read('value');
        $result = $this->getModel()->get($class, [$key => $value]);
        $this->getModel()->set('result', ($result == null) ? 1 : 0);
    }
    
    function isavailableedit(){
        $this->checkIsAdmin();
        $class = ucfirst(strtolower(Reader::read('class')));
        $key = Reader::read('key');
        $newvalue = Reader::read('value');
        $valueestatico = Reader::read('valoranterior');
        
        if($newvalue !== $valueestatico){
            $result = $this->getModel()->get($class, [$key => $newvalue]);
            $this->getModel()->set('result', ($result == null) ? 1 : 0);
        }
    }
    
    function updatedata(){
        $this->checkIsAdmin();
        $class = Reader::read('class');
        $id = Reader::read('id');
        $obj = Reader::readObject(App::OBJECT[$class]);

        switch (strtolower($class)) {
            case 'usuario':
                if($obj->getClave()!==null && trim($obj->getClave() !== '')){
                    $obj->setClave(Util::encriptar($obj->getClave()));
                }
                $obj->setActivo($obj->getActivo() == 'on' ? 1 : 0);
                $obj->setRol($obj->getRol() == 'on' ? 1 : 0);
                break;
        }
        
        $result = 0;
        if ($obj !== null) {
            $this->getModel()->update($obj);
            $result = $obj->getId() > 0 ? 1 : 0;
        }
        
        $this->getModel()->set('result', $result);
    }
    
    function adddata() {
        $this->checkIsAdmin();
        $class = Reader::read('class');
        $obj = Reader::readObject(App::OBJECT[$class]);
        
        switch ($class) {
            case 'usuario':
                $obj->setClave(Util::encriptar($obj->getClave()));
                $obj->setActivo($obj->getActivo() == 'on' ? 1 : 0);
                $obj->setRol($obj->getRol() == 'on' ? 1 : 0);
                break;
            case 'articulo':
                if (isset($_FILES['img']) && $_FILES['img']['name'] !== '') {
                    $blob = Util::getBlobImage(file_get_contents($_FILES['img']['tmp_name']));
                    $obj->setImg($blob);
                }
                break;
        }
        echo Util::varDump($_FILES);
        $upload = new Multiupload('files');
        $result = $upload->setPolicy(Multiupload::POLICITY_OVERWRITE)
                ->upload();
        echo 'El resultado de la subida de las imagenes es --> ' . $result;
        exit;
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
