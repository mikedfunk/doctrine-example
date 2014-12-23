<?php

require_once 'bootstrap.php';

// get product by id
$productId = $argv[1];
$product = $entityManager
    ->find('MikeFunk\DoctrineExample\Entities\Product', $productId);

// do we have a product?
if (!$product) {
    die("Product not found.\n");
}

// echo the product name
echo $product->getName() . "\n";
