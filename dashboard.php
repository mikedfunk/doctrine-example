<?php

require_once 'bootstrap.php';

$userId = $argv[1];

// crete a query to get stuff for this user with placeholders for PDO replacement
// aka bound parameters
$dql = "SELECT b, e, r FROM MikeFunk\DoctrineExample\Entities\Bug b JOIN "
    . "b.engineer e JOIN b.reporter r WHERE b.status = 'OPEN' AND (e.id = ?1 "
    . 'OR r.id = ?1) ORDER BY b.created DESC';

// get the result, swapping placeholders
$myBugs = $entityManager->createQuery($dql)
    ->setParameter(1, $userId)
    ->setMaxResults(15)
    ->getResult();

// echo the result
echo 'you have ' . count($myBugs) . " open bugs created or assigned to you:\n\n";

foreach ($myBugs as $bug) {
    echo $bug->getId() . ' - ' . $bug->getDescription() . "\n";
}
