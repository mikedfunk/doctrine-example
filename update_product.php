<?php
/**
 * update a product via cli
 *
 * @package DoctrineExample
 * @license MIT License <http://opensource.org/licenses/mit-license.html>
 */
require_once 'bootstrap.php';

$productId = $argv[1];
$productName = $argv[2];

// the product repository also has a find method
$productRepository = $entityManager
    ->getRepository('MikeFunk\DoctrineExample\Entities\Product');
$product = $productRepository->find($productId);

// do we have a product?
if (!$product) {
    die("Product $productId does not exist.\n");
}

// update it
$product->setName($productName);
echo "Product $productId updated with name $productName\n";
$entityManager->flush();

// Doctrine follows the UnitOfWork pattern which additionally detects all entities
// that were fetched and have changed during the request. You don’t have to
// keep track of entities yourself, when Doctrine already knows about them.

// Updating a product name demonstrates the functionality UnitOfWork of pattern
// discussed before. We only need to find a product entity and all changes to
// its properties are written to the database:
