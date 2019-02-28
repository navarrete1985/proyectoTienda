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
    
    function __construct(Model $model) {
        parent::__construct($model);
        $this->checkIsAdmin();
    } 
    
    function main() {
    }
    
    function listarUsuario() {
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
        $id = Reader::read('id');
        $this->getModel()->delete('Usuario',['id' => $id]);
    }
    
    function isavailable() {
        $class = ucfirst(strtolower(Reader::read('class')));
        $key = Reader::read('key');
        $value = Reader::read('value');
        $result = $this->getModel()->get($class, [$key => $value]);
        $this->getModel()->set('result', ($result == null) ? 1 : 0);
    }
    
    function isavailableedit(){
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
        
        $result = 0;
        if ($obj !== null) {
            $this->getModel()->create($obj);
            $result = $obj->getId() > 0 ? 1 : 0;
            $uploadResult = 0;
            
            if ($class == 'usuario' && $result === 1) {
                $mail = Mail::sendActivation($obj);
            } else if ($class == 'articulo' && $result === 1) {
                $upload = new Multiupload('files');
                $status = $upload->setPolicy(Multiupload::POLICITY_OVERWRITE)
                        ->appendTarget('articulos/id_' . $obj->getId());
                if($status) {
                    $uploadResult = $upload->upload();
                }
            }
        }
        $this->getModel()->add(['result' => $result, 'files_uploaded' => $uploadResult]);
    }
}
