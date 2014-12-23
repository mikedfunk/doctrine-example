<?php

require_once 'bootstrap.php';

// get all products
$productRepository = $entityManager
    ->getRepository('MikeFunk\DoctrineExample\Entities\Product');
$products = $productRepository->findAll();

// loop through all products and tell me about them
foreach ($products as $product) {
    echo $product->getName() . "\n";
}
