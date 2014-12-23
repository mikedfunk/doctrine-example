<?php
/**
 * list bugs via cli
 *
 * @package DoctrineExample
 * @license MIT License <http://opensource.org/licenses/mit-license.html>
 */
require_once 'bootstrap.php';

// doctrine query language
$dql = "SELECT b, e, r FROM MikeFunk\DoctrineExample\Entities\Bug b JOIN b.engineer e JOIN b.reporter r ORDER BY "
    . "b.created DESC";

// query for bugs with their stuff and get the result
$query = $entityManager->createQuery($dql);
$query->setMaxResults(30);
$bugs = $query->getResult();
// array version
// $bugs = $query->getArrayResult();

// show the result with children
foreach ($bugs as $bug) {
    echo $bug->getDescription() . "\n";
    echo "Reported by: " . $bug->getReporter()->getName() . "\n";
    echo "Assigned to: " . $bug->getEngineer()->getName() . "\n";

    // show all products for this bug
    foreach ($bug->getProducts() as $product) {
        echo "Platform: " . $product->getName() . "\n";
    }
}
