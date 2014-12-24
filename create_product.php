<?php
/**
 * Call this on the command line to create a product
 *
 * @package DoctrineExample
 * @license MIT License <http://opensource.org/licenses/mit-license.html>
 */
use MikeFunk\DoctrineExample\Entities\Product;

require_once 'bootstrap.php';

$newProductName = $argv[1];
$product = new Product();
$product->setName($newProductName);

// save to the db
$entityManager->persist($product);
$entityManager->flush();

echo 'created a product with ID' . $product->getId() . "\n";

// What is happening here? Using the Product is pretty standard OOP. The
// interesting bits are the use of the EntityManager service. To notify the
// EntityManager that a new entity should be inserted into the database you
// have to call persist(). To intiate a transaction to actually perform the
// insertion, You have to explicitly call flush() on the EntityManager.

// This distinction between persist and flush is allows to aggregate all writes
// (INSERT, UPDATE, DELETE) into one single transaction, which is executed when
// flush is called. Using this approach the write-performance is significantly
// better than in a scenario where updates are done for each entity in isolation.

// Doctrine follows the UnitOfWork pattern which additionally detects all entities
// that were fetched and have changed during the request. You don’t have to keep
// track of entities yourself, when Doctrine already knows about them.
