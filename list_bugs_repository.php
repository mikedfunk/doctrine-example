<?php

require_once 'bootstrap.php';

// get all recently created open bugs
$bugRepository = $entityManager
    ->getRepository('MikeFunk\DoctrineExample\Entities\Bug');
$bugs = $bugRepository->getRecentBugs();

// loop through the bugs and echo details of each
foreach ($bugs as $bug) {
    echo $bug->getDescription();
    echo $bug->getCreated()->format('Y-m-d') . "\n";
    echo " Reported by: " . $bug->getReporter()->getName() . "\n";
    echo " Assigned to: " . $bug->getEngineer()->getName() . "\n";

    // echo info about each product connected to this bug
    foreach ($bug->getProducts() as $product) {
        echo "  Product: " . $product->getName() . "\n";
    }
}
