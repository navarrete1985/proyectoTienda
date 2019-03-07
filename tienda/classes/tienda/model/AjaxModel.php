<?php

namespace tienda\model;

use Doctrine\ORM\Tools\Pagination\Paginator;
use tienda\tools\Pagination;
use tienda\data\Usuario;
use tienda\data\Color;
use tienda\data\Articulo;
use tienda\data\Detalle;
use tienda\tools\Util;
use tienda\tools\Bootstrap;
use tienda\data\Pedido;

class AjaxModel extends Model {
    
    use \tienda\common\Crud;
    use \tienda\common\CrudArticulo;

    function getDoctrineUsuarios($pagina = 1, $orden = 'nombre', $limit = 6) {
         $dql = 'select c from tienda\data\Usuario c where c.nombre < :nombre 
        order by c.'. $orden .', c.nombre, c.correo, c.apellidos, c.alias,c.direccion,c.activo,c.rol';
        $query = $this->gestor->createQuery($dql)->setParameter('nombre', 'zz');
        $paginator = new Paginator($query);
        $paginator->getQuery()
            ->setFirstResult($limit * ($pagina - 1))
            ->setMaxResults($limit);
        $pagination = new Pagination($paginator->count(), $pagina, $limit);
        $usuarios = array();
        foreach($paginator as $user) {
            $usuarios[] = $user->getUnset(array('clave','fechaalta','pedidos',));
        }
        
        return ['usuarios' => $usuarios, 'paginas' => $pagination->values()];
    }
    
    function getDoctrineZapatos($tipo,$pagina = 1, $orden = 'marca', $limit = 6) {
         $dql = 'select c from tienda\data\Articulo c where c.marca < :marca and c.tipo = :tipo
        order by c.'. $orden .', c.marca, c.modelo, c.precio, c.peso,c.referencia,c.coleccion';
        $query = $this->gestor->createQuery($dql)->setParameter('marca', 'zz')->setParameter('tipo', $tipo);
        $paginator = new Paginator($query);
        $paginator->getQuery()
            ->setFirstResult($limit * ($pagina - 1))
            ->setMaxResults($limit);
        $pagination = new Pagination($paginator->count(), $pagina, $limit);
        $zapatos = array();
        foreach($paginator as $zapato) {
            if ($zapato->getImg() !== null) {
                $img = base64_encode(stream_get_contents($zapato->getImg()));
                $etiqueta =  '<img width="40px" src="data:image/jpg;base64,'.$img.'"/>';
                $zapato->setImg($etiqueta);    
            }
            $zapatos[] = $zapato->getUnset(array('estampando','coleccion','colores', 'categorias', 'destinatarios', 'stocks', 'detalles','material','estampado','detalle','cierre','tipo','paisfabricacion','altura','temporada','formatacon','puntera','alto','ancho','profundo','numbolsillos','otrascaracteristicas'));
        }
        
        return ['zapatos' => $zapatos, 'paginas' => $pagination->values()];
    }
    
     function getDetalles($id,$iduser){
        
        
        $resultado = array();
        $resultado2 = array();
        $resultado3 = array();
        $resultadofinal = array();
        
        $dql = 'SELECT d,p,a  FROM tienda\data\Detalle d join d.pedido p join d.articulo a WHERE d.pedido = :id';
        $query = $this->gestor->createQuery($dql)->setParameter('id', $id);
   
        $detalles=$query->getResult();
        
        foreach($detalles as $detalle) {
            $resultado['resultado'][]  = $detalle->getUnset(array('pedido','color'));
            $resultado['detalles'][] = $detalle->getUnset(array('articulo','pedido','color'));
        }
        
        foreach($resultado['resultado'] as $detalle) {
            $resultado['articulo'][] = $detalle['articulo']->getUnset(array('colores','img','__initializer__','__cloner__','__isInitialized__','id', 'categorias', 'destinatarios', 'stocks', 'detalles','material','estampado','detalle','cierre','tipo','paisfabricacion','altura','temporada','formatacon','puntera','alto','ancho','profundo','numbolsillos','otrascaracteristicas'));
        }
        unset($resultado['resultado']);
        
        
        $usuario = $this->get('Usuario', ['id' => $iduser]);
        $resultado['usuario']=$usuario->getUnset(array('__initializer__','__cloner__','__isInitialized__','pedidos','fechaalta','clave'));
        $resultado['pedido']=$id;
        
        return $resultado;
    }
  
    function getDoctrineCatAndDes($clase,$pagina = 1 , $id, $limit = 6){
        $resultado = $this->get('CategoriaArticulo', ['id' => 7]);

        if($clase === 'Destinatario'){
            
            // $dql = 'select a from tienda\data\DestinatarioArticulo da join da.destinatario d join da.articulo a where d.id = :id
            // order by a.marca, a.modelo, a.precio, a.peso,a.referencia,a.coleccion';
            // $query = $this->gestor->createQuery($dql)->setParameter('id', $id);
        
            
            
            // $dql = 'select a,d from tienda\data\Destinatario d join d.articulos a where d.id = :id';
            // $query = $this->gestor->createQuery($dql)->setParameter('id', $id);
        
            // $dql = 'select a from tienda\data\Articulo a join a.destinatarios d join d.destinatario dd where dd.id = :id
            // order by a.marca, a.modelo, a.precio, a.peso,a.referencia,a.coleccion';
            // $query = $this->gestor->createQuery($dql)->setParameter('id', $id);
        
            
        }else if ($clase === 'Categoria'){
            $dql = 'select c from tienda\data\Articulo c join c.categorias cc join cc.categoria ccc where ccc.id = :id
            order by c.marca, c.modelo, c.precio, c.peso,c.referencia,c.coleccion';
            $query = $this->gestor->createQuery($dql)->setParameter('id', $id);

        }
        // $resultado = $this->get('CategoriaArticulo', ['id' => 7]);
        // echo Util::varDump($resultado);
        // exit();
        
        
        
        $paginator = new Paginator($query);
        $paginator->getQuery()
            ->setFirstResult($limit * ($pagina - 1))
            ->setMaxResults($limit);
        $pagination = new Pagination($paginator->count(), $pagina, $limit);
        // return $paginator;
        $zapatos = array();
        foreach($paginator as $zapato) {
            // echo 'Esta es la marca->'.$zapato->getMarca();
            if ($zapato->getImg() !== null) {
                $img = base64_encode(stream_get_contents($zapato->getImg()));
                // $etiqueta =  '<img width="340px" src="data:image/jpg;base64,'.$img.'"/>';
                $etiqueta = $img;
                $zapato->setImg($etiqueta);    
            }
            $text =  Util::excerpt($zapato->getDetalle(),130);
        
            
            
            $zapato->setDetalle($text);
 
            $zapatos[] = $zapato->getUnset(array('colores', 'categorias', 'destinatarios', 'stocks','peso','coleccion', 'detalles','material','estampando','cierre','tipo','paisfabricacion','altura','temporada','formatacon','puntera','alto','ancho','profundo','numbolsillos','otrascaracteristicas'));
            
           
        }
        
        echo Util::varDump($zapatos);
        exit();
        return ['articulos' => $zapatos, 'paginas' => $pagination->values()];
        
    }
    
    function getDoctrineArticulos($tipo,$pagina = 1, $orden = 'marca', $filtro, $limit = 6) {

        if($filtro !== null){
            $dql = 'select c from tienda\data\Articulo c where c.marca like :filtro
            or c.modelo like :filtro or c.precio like :filtro or  c.peso like :filtro or c.referencia like :filtro or c.coleccion like :filtro';
            $query = $this->gestor->createQuery($dql)->setParameter('filtro','%'.$filtro.'%' );
        }else if($tipo == 2){
            
            $dql = 'select c from tienda\data\Articulo c where c.marca < :marca
            order by c.'. $orden .', c.marca, c.modelo, c.precio, c.peso,c.referencia,c.coleccion';
            $query = $this->gestor->createQuery($dql)->setParameter('marca', 'zz');
        }else{
            $dql = 'select c from tienda\data\Articulo c where c.marca < :marca and c.tipo = :tipo
            order by c.'. $orden .', c.marca, c.modelo, c.precio, c.peso,c.referencia,c.coleccion';
            $query = $this->gestor->createQuery($dql)->setParameter('marca', 'zz')->setParameter('tipo', $tipo);            
        }
        
        $paginator = new Paginator($query);
        $paginator->getQuery()
            ->setFirstResult($limit * ($pagina - 1))
            ->setMaxResults($limit);
        $pagination = new Pagination($paginator->count(), $pagina, $limit);
        $zapatos = array();
        foreach($paginator as $zapato) {
            if ($zapato->getImg() !== null) {
                $img = base64_encode(stream_get_contents($zapato->getImg()));
                $etiqueta = $img;
                $zapato->setImg($etiqueta);    
            }
            
            $text =  Util::excerpt($zapato->getDetalle(),130);
            $zapato->setDetalle($text);
            $zapatos[] = $zapato->getUnset(array('colores', 'categorias', 'destinatarios', 'stocks','peso','coleccion', 'detalles','material','estampando','cierre','tipo','paisfabricacion','altura','temporada','formatacon','puntera','alto','ancho','profundo','numbolsillos','otrascaracteristicas'));
        }
        
        return ['articulos' => $zapatos, 'paginas' => $pagination->values()];
    }
    
    function addPedido($cart, $user, $data = ['numtarjeta' => 4555455545554555, 'fechavalidez' => '09/20', 'cvv' => '177']) {
        $pedido = new Pedido();
        // $data = ['numtarjeta' => 4555455545554555, 'fechavalidez' => '09/20', 'cvv' => '177'];
        $pedido->set($data);
        $user = $this->gestor->getReference('tienda\data\Usuario', ['id' => $user->getId()]);
        $pedido->setUsuario($user);
        $this->gestor->persist($pedido);
        foreach($cart as $item) {
            $newDetalle = new Detalle();
            $newDetalle->set($item->getUnset(['id']));
            $newDetalle->setPrecio($newDetalle->getCantidad() * $newDetalle->getPrecio());
            $newDetalle->setArticulo($this->gestor->getReference('tienda\data\Articulo', ['id' => $item->getId()]));
            $newDetalle->setColor($this->gestor->getReference('tienda\data\Color', ['id' => 3]));
            $newDetalle->setPedido($pedido);
            $this->gestor->persist($newDetalle);
            $pedido->addDetalle($newDetalle);
        }
        $this->gestor->persist($pedido);
        $this->gestor->flush();
        
        return $pedido;
    }
}