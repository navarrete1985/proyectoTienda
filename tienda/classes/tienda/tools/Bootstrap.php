<?php

namespace tienda\tools;

use Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration;
    

class Bootstrap {
    private $entityManager;
    private static $instance = null;

    private function __construct() {
        $paths = array('./cli_doctrine/src/');
        $isDevMode = true;
        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'admintienda',
            'password' => 'tienda',
            'dbname'   => 'tienda',
            'charset'  => 'utf8'
        );
        
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        $this->entityManager = EntityManager::create($dbParams, $config);
    }
    
    public static function getInstance() {
        if (self::$instance === null) {
            $class = get_class();
            self::$instance = new $class;
        }
        return self::$instance; 
    }
    
    function getEntityManager() {
        return $this->entityManager;
    }
    
    public function __clone() {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}