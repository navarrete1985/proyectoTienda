<?php 

namespace tienda\common;
use tienda\tools\Util;
use tienda\app\App;

trait Crud {
    
    private $prefix = '\tienda\data\\';
    
    function get($clase, array $data = ['id' => '']) {
        return $this->gestor->getRepository($this->prefix . $clase)->findOneBy($data);
    }
    
    function getQuery($dql){
        $query = $this->gestor->createQuery($dql);
        $result = $query->getResult();
        return $result;
    }
    function getAll2 ($clase, array $data = ['id' => '']) {
        return $this->gestor->getRepository($this->prefix . $clase)->findAll($data);
    }
    function getAll ($clase) {
        return $this->gestor->getRepository($this->prefix . $clase)->findAll();
    }
    
    function create($item) {
        $result = 1;
        
        try {
            $r = $this->gestor->persist($item);
            $this->gestor->flush();   
        }catch(\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e){
            $result = -1;
        }    
        catch(\Exception $e){
            $result = 0;
        }
        
        return $result;
    }
    
    /**
     * Función genérica para actualización de objetos en nuestra bd
     * 
     * @param Object Objeto a actualizar de nuestros tipos de datos de la bd
     * @return Object Objeto que apunta a la bd con los valores actualizados
     * 
     */
    function update ($item) {
        $after = $this->__update($item);
        $this->gestor->persist($after);
        $this->gestor->flush();
        return $after;
    }
    
    /**
     * Función encargada de devolver un objeto de nuestra base de datos
     * con los datos del objeto pasado como parámetro, para que así podamos actualizarlo
     * 
     * @param Object $item Objeto con valores modificados
     * @return Object $after Objeto que apunta a la bd con los valores cambiados a actualizar
     * 
     */ 
    private function __update($item) {/*Le pasamos el item que recogemos*/
        /*Conseguimos la clase */
        $class = get_class($item);
        $class = explode('\\', $class);
        $class = end($class);
        $before = $this->get($class, ['id' => $item->getID()]);

        if (get_class($item) === 'tienda\data\Articulo' && $item->getImg() === 'undefined'  ) {
 
            $item->setImg($before->getImg());
        }
        
        $values = $item->getUnset(App::RELATIONSHIP[$class]);
        foreach ($values as $key=>$value) {
            if ($value !== null && $value !== '') {
                $value = is_string($value) ? trim($value) : $value;
                $before->setObject($key, $value);
            }
        }
        return $before;
    }
    
    function delete($clase, array $data = ['id' => '']) {
        $item = $this->gestor->getReference($this->prefix . $clase, $data);
        $this->gestor->remove($item);
        $this->gestor->flush();
        return $item;
    }
    
    function deleteTool($clase, array $data = ['id' => '']) {
        $item = $this->gestor->getReference($this->prefix . $clase, $data);
        $items = $item->getArticulos();
        foreach ($items as $element) {
            $this->gestor->remove($element);
        }
        if ($clase === 'Color') {
            $items = $item->getDetalles();
            foreach ($items as $element) {
                $this->gestor->remove($element);
            }   
        }
        $this->gestor->remove($item);
        $this->gestor->flush();
        return $item;
    }
}