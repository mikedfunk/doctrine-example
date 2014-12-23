<?php
/**
 * The main doctrine example file
 *
 * @package DoctrineExample
 * @license MIT License <http://opensource.org/licenses/mit-license.html>
 */
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// get composer autoloader
require __DIR__ . '/vendor/autoload.php';

$isDevMode = true;

// create a simple default doctrine ORM config for annotations
// $config = Setup::createAnnotationMetadataConfiguration(
    // [__DIR__ . '/src'],
    // $isDevMode
// );

// yaml version
$config = Setup::createYAMLMetadataConfiguration(
    [__DIR__ . '/config/yaml'],
    $isDevMode
);
// xml? never heard of it! (ugggh)

// set up the connection
$connection = ['driver' => 'pdo_sqlite', 'path' => __DIR__ . '/db.sqlite'];

// get our entity manager
$entityManager = EntityManager::create($connection, $config);
