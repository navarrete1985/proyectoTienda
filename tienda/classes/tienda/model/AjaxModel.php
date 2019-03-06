<?php

namespace tienda\model;

use Doctrine\ORM\Tools\Pagination\Paginator;

use tienda\tools\Pagination;
use tienda\data\Usuario;
use tienda\tools\Util;
use tienda\tools\Bootstrap;
use tienda\data\Pedido;


class AjaxModel extends Model {
    
    use \tienda\common\Crud;
    use \tienda\common\CrudUsuario;
    use \tienda\common\CrudArticulo;
    use \tienda\common\CrudCategoria;
    use \tienda\common\CrudColor;
    use \tienda\common\CrudPedido;

    function getDoctrineUsuarios($pagina = 1, $orden = 'nombre', $limit = 6) {
         $dql = 'select c from tienda\data\Usuario c where c.nombre < :nombre 
        order by c.'. $orden .', c.nombre, c.correo, c.apellidos, c.alias,c.direccion,c.activo,c.rol';
        $query = $this->gestor->createQuery($dql)->setParameter('nombre', 'zz');
        $paginator = new Paginator($query);
        $paginator->getQuery()
            ->setFirstResult($limit * ($pagina - 1))
            ->setMaxResults($limit);
        $pagination = new Pagination($paginator->count(), $pagina, $limit);
        // return $paginator;
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
        // return $paginator;
        $zapatos = array();
        foreach($paginator as $zapato) {
            // echo 'Esta es la marca->'.$zapato->getMarca();
            if ($zapato->getImg() !== null) {
                $img = base64_encode(stream_get_contents($zapato->getImg()));
                $etiqueta =  '<img width="40px" src="data:image/jpg;base64,'.$img.'"/>';
                $zapato->setImg($etiqueta);    
            }
            $zapatos[] = $zapato->getUnset(array('estampando','coleccion','colores', 'categorias', 'destinatarios', 'stocks', 'detalles','material','estampado','detalle','cierre','tipo','paisfabricacion','altura','temporada','formatacon','puntera','alto','ancho','profundo','numbolsillos','otrascaracteristicas'));
            
        }
        return ['zapatos' => $zapatos, 'paginas' => $pagination->values()];
        
    }
    
     function getDetalles($id){
        $iduser='37';
        // $dql = 'SELECT d  FROM tienda\data\Detalle  d join pedido p join color c join articulo a
        
        // WHERE d.id = '.$id .' AND d.idPedido = p.id AND d.idColor=c.id AND d.idArticulo=a.id';  
        // $dql = 'SELECT d  FROM tienda\data\Detalle  d join pedido p on d.pedido=p.id join  color c on d.color=c.id join articulo a on d.articulo=a.id
        
        // WHERE d.id = '.$id .' AND d.idPedido = p.id AND d.idColor=c.id AND d.idArticulo=a.id';  
        // $dql = 'SELECT *  FROM Pedido  where id = :id';
        
             // $query = $this->gestor->createQuery($dql)->setParameter('id',$iduser )->getResult();
        // $result = $this->get('Pedido', ['id' => 1]);
        
        //  $dql = 'SELECT p, d  FROM tienda\data\Pedido p join p.usuario u join p.detalles d WHERE p.id = :pedidoid';
        // $resultado = $this->get('Pedido', ['id' => $id]);
   
        // $pedido = $this->getQuery($dql);
        // $resultado = array();
        // $resultado = $pedido[0]->getUnset(array('usuario','justin'));
        // $usuario = $this->getQuery($dql);
        //  $result = $this->gestor->createQuery($dql)
        //         ->setParameter( 'pedidoid', $id)
        //         ->getResult();
        // echo Util::varDump($usuario);
        // $resultado = $usuario[0]->getPedidos();
        // $pedido = new Pedido();
        // $pedido->set($usuario[0]);
        // echo Util::varDump($result);   
        // foreach($result as $item) {
            
        //     // $usuario = new Usuario();
        //     // $usuario->set($item);
            
        //     echo Util::varDump($item);    
        //     exit();
        // }
        // echo Util::varDump($usuario);
        // $pedidos = $this->get('Pedido', ['id' => $id]);
        // $detalles = $pedidos->getDetalles();
        
        // $detalles = $this->get('Detalle', ['id' => $id]);
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
        // echo Util::varDump($resultado);
        // exit();
        // // $articulo = $this->get('Articulo', ['id' => $detalles->getArticulo()->getId()]);


       
        // // $articulo = $this->get('Articulo', ['id' => $detalles->getArticulo()->getId()]);
        // // foreach($detalles as $detalle) {
              
            
        // $resultado['articulo']=$articulo->getUnset(array('colores','img','__initializer__','__cloner__','__isInitialized__','id', 'modelo','categorias', 'destinatarios', 'stocks', 'detalles','material','estampado','detalle','cierre','tipo','paisfabricacion','altura','temporada','formatacon','puntera','alto','ancho','profundo','numbolsillos','otrascaracteristicas'));
           
        // // }
        //  $resultado['detalle']=$detalles->getUnset(array('articulo','pedido','color'));
         

            // echo Util::varDump($resultado);  
            // echo $articulo->getModelo();
        // echo Util::varDump();
        
        // exit();
        
        
        return $resultado;
        // return ['pedidos' => $pedidos, 'paginas' => $pagination->values()];
        
    }
    
    
    // function  updateUser($obj,$userId){
    //     $usuario = $this->get('Usuario',['id' => $userId]);
    //     // echo 'objeto'. Util::varDump($obj).'</br>';
    //     $usuario->setNombre($obj->getNombre());
    //     $usuario->setCorreo($obj->getCorreo());
    //     $usuario->setApellidos($obj->getApellidos());
    //     $usuario->setAlias($obj->getAlias());
    //     $usuario->setDireccion($obj->getDireccion());
    //     $usuario->setActivo($obj->getActivo());
    //     $usuario->setRol($obj->getRol());
        
    //     // echo 'referencia'. Util::varDump($usuario).'</br>';
    //     return $this->update($usuario);
    // }
    
    
    function getDoctrineCatAndDes($clase,$pagina = 1 , $id, $limit = 6){
        $resultado = $this->get('CategoriaArticulo', ['id' => 7]);
        // echo Util::varDump($resultado);
        // exit();
        if($clase === 'Destinatario'){
            
            $dql = 'select a,d from tienda\data\Articulo a join a.destinatarios d  where d.destinatario = :id
            order by a.marca, a.modelo, a.precio, a.peso,a.referencia,a.coleccion';
            $query = $this->gestor->createQuery($dql)->setParameter('id', $id);
        
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
        return ['articulos' => $zapatos, 'paginas' => $pagination->values()];
        
    }
}