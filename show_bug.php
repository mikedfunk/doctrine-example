<?php
/**
 * show a bug via cli
 *
 * @package DoctrineExample
 * @license MIT License <http://opensource.org/licenses/mit-license.html>
 */
require_once 'bootstrap.php';

$bugId = $argv[1];

$bugRepository = $entityManager
    ->getRepository('MikeFunk\DoctrineExample\Entities\Bug');
$bug = $bugRepository->find($bugId);

echo "Bug: " . $bug->getDescription() . "\n";
echo "Engineer: " . $bug->getEngineer()->getName() . "\n";
