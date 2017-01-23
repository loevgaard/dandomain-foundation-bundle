<?php
$appDir = getcwd();

require_once $appDir . "/vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [$appDir . '/Model'];
$isDevMode = true;

// the connection configuration
$dbParams = array(
    'host'      => 'achilles-mysql',
    'driver'    => 'pdo_mysql',
    'user'      => 'root',
    'password'  => '123456',
    'dbname'    => 'dandomain_foundation',
);

$config = Setup::createConfiguration($isDevMode);
$driver = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver(new \Doctrine\Common\Annotations\AnnotationReader(), $paths);
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');
$config->setMetadataDriverImpl($driver);
$entityManager = EntityManager::create($dbParams, $config);