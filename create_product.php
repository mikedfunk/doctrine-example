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
