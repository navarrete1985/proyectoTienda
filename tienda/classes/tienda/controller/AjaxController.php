<?php

namespace tienda\controller;

use tienda\model\Model;
use tienda\tools\Session;
use tienda\tools\Reader;
use tienda\data\Usuario;
use tienda\data\ItemCart;
use tienda\tools\Util;
use tienda\app\App;
use tienda\tools\Mail;
use tienda\tools\Multiupload;
use tienda\tools\Carrito;

class AjaxController extends Controller {
    
    function main() {
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
    
    function listarCatAndDes(){
        $pagina = Reader::read('pagina');
        $orden = Reader::read('orden');
        $clase = Reader::read('data');
        
        if($pagina === null || !is_numeric($pagina)) {
            $pagina = 1;
        }
        
        $orden = Reader::read('orden');
        
        if (!property_exists(App::OBJECT['articulo'],  $orden)) {
            $orden = 'Casual';
        }
                                                //$pagina, $orden
        $r = $this->getModel()->getDoctrineCatAndDes($clase, $pagina, $orden);
        $this->getModel()->add($r);
    }
    
    function listarZapato() {
        $this->checkIsAdmin();
        $pagina = Reader::read('pagina');
        $tipo = Reader::read('tipo');
        
        if($pagina === null || !is_numeric($pagina)) {
            $pagina = 1;
        }
        $orden = Reader::read('orden');
        
        if (!property_exists(App::OBJECT['articulo'],  $orden)) {
            $orden = 'marca';
        }
                                                //$pagina, $orden
        $r = $this->getModel()->getDoctrineZapatos($tipo, $pagina, $orden);
        $this->getModel()->add($r);
    }
    
    
    function listarArticulo() {
        $filtro = Reader::read('filtro');
        $tipo = Reader::read('tipo');
        $pagina = Reader::read('pagina');
        $orden = Reader::read('orden');

        if($filtro === ''){
                $filtro = null;
            }
        
        if($pagina === null || !is_numeric($pagina)) {
            $pagina = 1;
        }
        $orden = Reader::read('orden');
        
        if (!property_exists(App::OBJECT['articulo'],  $orden)) {
            $orden = 'marca';
        }
                                                //$pagina, $orden
        $r = $this->getModel()->getDoctrineArticulos($tipo, $pagina, $orden,$filtro);
        $this->getModel()->add($r);
    }
    
    function deleteuser() {
        $this->checkIsAdmin();
        $id = Reader::read('id');
        $this->getModel()->delete('Usuario',['id' => $id]);
    }
    
    function borrarImgDirectory(){
        $this->checkIsAdmin();
        $id = Reader::read('idimg');
        $img = Reader::read('imgBorrar');
        $folder = './resources/images/articulos/id_' . $id .'/' . $img;
        $resultado = unlink($folder);
        $this->getModel()->set('resultado',$resultado);
    }
    
    function deletetools() {
        $this->checkIsAdmin();
        $item = null;
        $class = ucfirst(strtolower(Reader::read('class')));
        $id = Reader::read('id');
        $item = $this->getModel()->deleteTool($class, ['id' => $id]);
        $this->getModel()->set('result', ($item === null || $item->getId() === null || $item->getId() === 0) ? '1' : '0');
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
        $dest = Reader::read('dest');
        $cat = Reader::read('cat');

        $result = 0;
        if ($class !== null && $id !== null) {
            $class = trim($class);
            $id = trim($id);
            
            $obj = Reader::readObject(App::OBJECT[$class]);
           
            switch (strtolower($class)) {
                case 'usuario':
                    if($obj->getClave()!==null && trim($obj->getClave() !== '')){
                        $obj->setClave(Util::encriptar($obj->getClave()));
                    }
                    $obj->setActivo($obj->getActivo() === 'on' ? 1 : 0);
                    $obj->setRol($obj->getRol() === 'on' ? 1 : 0);
                    break;
                case 'articulo':
                   
                        if (isset($_FILES['img']) && $_FILES['img']['name'] !== '') {
                            $blob = Util::getBlobImage(file_get_contents($_FILES['img']['tmp_name']));
                            $obj->setImg($blob);
                        }
                        $obj->setTipo(Reader::read('tipo') === '1' ? 1 : 0); 
                    break;
            }
            
            if ($obj !== null) {
                $this->getModel()->update($obj);
                $result = $obj->getId() > 0 ? 1 : 0;
                $uploadResult = 0;
                
                if ($class == 'articulo' && $result === 1) {
                    $this->getModel()->addDestinatarios($obj, $dest, 'tienda\data\Destinatario');
                    $this->getModel()->addCategories($obj, $cat, 'tienda\data\Categoria');
                    $upload = new Multiupload($class == 'color' ? 'img' : 'files');
                    $status = $upload->setPolicy(Multiupload::POLICITY_OVERWRITE)
                            ->appendTarget($class == 'color' ? 'colores' : 'articulos/' . 'id_' . $obj->getId() . '/');
                    if($status) {
                        $uploadResult = $upload->upload();
                    }
                }
                
            }   
        }
        $this->getModel()->add(['result' => $result, 'files_uploaded' => $uploadResult, 'id' => $obj !== null && $result === 1 ? $obj->getId() : '-1']);
    }
    
    function adddata() {
        $this->checkIsAdmin();
        $class = Reader::read('class');
        $class = strtolower($class);
        $obj = Reader::readObject(App::OBJECT[$class]);
        $dest = Reader::read('dest');
        $cat = Reader::read('cat');
        switch ($class) {
            case 'usuario':
                $obj->setClave(Util::encriptar($obj->getClave()));
                $obj->setActivo($obj->getActivo() === 'on' ? 1 : 0);
                $obj->setRol($obj->getRol() === 'on' ? 1 : 0);
                break;
            case 'articulo':
                if (isset($_FILES['img']) && $_FILES['img']['name'] !== '') {
                    $blob = Util::getBlobImage(file_get_contents($_FILES['img']['tmp_name']));
                    $obj->setImg($blob);
                }
                $obj->setTipo(Reader::read('tipo') === '1' ? 1 : 0);
                
                break;
        }
        
        $result = 0;
        if ($obj !== null) {
            $result = $this->getModel()->create($obj);
            $result =  $result === 1 && $obj->getId() > 0 ? 1 : 0;
            $uploadResult = 0;
            
            if ($class == 'usuario' && $result === 1) {
                $mail = Mail::sendActivation($obj);
            } else if ($class == 'articulo' && $result === 1) {
               
                $this->getModel()->addDestinatarios($obj, $dest, 'tienda\data\Destinatario');
                $this->getModel()->addCategories($obj, $cat, 'tienda\data\Categoria');
                $upload = new Multiupload($class == 'color' ? 'img' : 'files');
                $status = $upload->setPolicy(Multiupload::POLICITY_OVERWRITE)
                        ->appendTarget($class == 'color' ? 'colores' : 'articulos/' . 'id_' . $obj->getId() . '/');
                if($status) {
                    $uploadResult = $upload->upload();
                }
            }
            
        }
        $this->getModel()->add(['result' => $result, 'files_uploaded' => $uploadResult, 'id' => $obj !== null && $result === 1 ? $obj->getId() : '-1']);
    }
    
    function detallespedido(){
        $id = Reader::read('id');
        $usuario = $this->getSesion()->getLogin();
        $iduser = $usuario->getId();
        
        $r = $this->getModel()->getDetalles($id,$iduser);
        $this->getModel()->set('resultado', $r);
    }
    
    function addtocart() {
        $itemId = Reader::read('id');
        $quantity = Reader::read('quantity');
        $quantity = intval($quantity);
        $articulo = $this->getModel()->get('Articulo', ['id' => $itemId]);
        $result = 0;
        $itemResult = null;
        
        if ($itemId !== null && $itemId !== '' && $articulo !== null) {
            $cart = $this->getSesion()->get('cart');
            
            if ($cart === null) {
                $cart = new Carrito();
            }
            
            $itemCart = new ItemCart($articulo, $quantity);
            $cart->addItem($itemCart, $articulo->getStock());
            $result = 1;
            $itemResult = $cart->getItem($itemId);
            set('cart', $cart);
        }
        
        $this->getModel()->add(['result' => $result, 'object' => $itemResult->get()]);
    }
    
    function terminarCompra() {
        $carrito = $this->getSesion()->get('cart');
        $usuario = $this->getSesion()->getLogin();
        $numero = Reader::read('numtarjeta');
        $fechavalidez = Reader::read('$fechavalidez');
        $cvv = Reader::read('$cvv');
        
        $data = ['numtarjeta' => $numero, 'fechavalidez' => $fechavalidez, 'cvv' => $cvv];
        $result = null;
        if ($carrito !== null) {
            $result = $this->getModel()->addPedido($carrito,$usuario, $data);   
        }
        
        $this->getModel()->add(['result' => $result === null ? 0 : 1]);
    }
}
