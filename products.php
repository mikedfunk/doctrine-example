<?php

require_once 'bootstrap.php';

// this time we get a count and group by to tell it how to add up the count.
$dql = "SELECT p.id, p.name, count(b.id) AS openBugs FROM "
    . "MikeFunk\DoctrineExample\Entities\Bug b JOIN b.products p WHERE "
    . "b.status = 'OPEN' GROUP BY p.id";

// we have to use a different final method because of the aggregate function
$productBugs = $entityManager->createQuery($dql)->getScalarResult();

foreach ($productBugs as $productBug) {
    echo $productBug['name'] . " has " . $productBug['openBugs'] . " open "
        . "bug(s).\n";
}
