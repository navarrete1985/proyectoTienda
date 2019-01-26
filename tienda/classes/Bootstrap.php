<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Bootstrap {
    private $entityManager;

    function __construct() {
        $paths = array('');
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
    
    function getEntityManager() {
        return $this->entityManager;
    }
}