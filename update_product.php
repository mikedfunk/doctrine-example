<?php
/**
 * update a product via cle
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
