<?php

require_once 'bootstrap.php';

use MikeFunk\DoctrineExample\Entities\Bug;

// get some cli params to use on creating the bug
$reporterId = $argv[1];
$engineerId = $argv[2];
$productIds = explode(',', $argv[3]);

// get some repositories
$userRepository = $entityManager
    ->getRepository('MikeFunk\DoctrineExample\Entities\User');
$productRepository = $entityManager
    ->getRepository('MikeFunk\DoctrineExample\Entities\Product');

// get the reporter and engineer by id
$reporter = $userRepository->find($reporterId);
$engineer = $userRepository->find($engineerId);
if (!$reporter || !$engineer) {
    die("No reporter and/or engineer found for the input.\n");
}

// create the bug
$bug = new Bug();
$bug->setDescription('It is broked.');
$bug->setCreated(new DateTime('now'));
$bug->setStatus('OPEN');

// assign bug to the designated related products
foreach ($productIds as $productId) {
    $product = $productRepository->find($productId);
    $bug->assignToProduct($product);
}

// set the reporter and engineer
$bug->setReporter($reporter);
$bug->setEngineer($engineer);

// save to db
$entityManager->persist($bug);
$entityManager->flush();

// notify user
echo "Bug created with id " . $bug->getId() . "\n";
