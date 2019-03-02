<?php

namespace tienda\model;

use Doctrine\ORM\Tools\Pagination\Paginator;

use tienda\tools\Pagination;
use tienda\data\Usuario;
use tienda\data\Pedido;
use tienda\data\Detalle;
use tienda\data\Color;
use tienda\data\Articulo;
use tienda\tools\Util;
use tienda\tools\Bootstrap;

class ProductosModel extends Model {
    
    use \tienda\common\Crud;
    use \tienda\common\CrudArticulo;
    
   
    function getDoctrineZapatos($pagina = 1, $orden = 'marca', $limit = 5) {
         $dql = 'select c from tienda\data\Articulo c where c.marca < :marca 
        order by c.'. $orden .', c.marca, c.modelo, c.precio, c.peso,c.referencia,c.coleccion';
        $query = $this->gestor->createQuery($dql)->setParameter('marca', 'zz');
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
            
            $zapatos[] = $zapato->getUnset(array('colores','id', 'categorias', 'destinatarios', 'stocks','peso','coleccion', 'detalles','material','estampando','cierre','tipo','paisfabricacion','altura','temporada','formatacon','puntera','alto','ancho','profundo','numbolsillos','otrascaracteristicas'));
            
           
        }
        return ['zapatos' => $zapatos, 'paginas' => $pagination->values()];
        
    }
}