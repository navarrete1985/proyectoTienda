<?php

namespace tienda\tools;

use Doctrine\ORM\Tools\Setup,
    Doctrine\ORM\EntityManager,
    Doctrine\ORM\Configuration;

class Bootstrap {
    private $entityManager;

    function __construct() {
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
    
    function getEntityManager() {
        return $this->entityManager;
    }
}