<?php
/**
 * create a user via cli
 *
 * @package DoctrineExample
 * @license MIT License <http://opensource.org/licenses/mit-license.html>
 */
use MikeFunk\DoctrineExample\Entities\User;

require_once 'bootstrap.php';

// get the new username from the cli args
$newUsername = $argv[1];

// create the user with the username
$user = new User();
$user->setName($newUsername);

// persist to the db
$entityManager->persist($user);
$entityManager->flush();

echo 'created user with id ' . $user->getId() . "\n";
