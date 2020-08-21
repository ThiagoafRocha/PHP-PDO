<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infra\Persistence\ConnectionFactory::createConection();

$sqlDelete = 'DELETE FROM students WHERE id = ?';
$preparedStatement = $pdo->prepare($sqlDelete);
$preparedStatement->bindValue(1, 1, PDO::PARAM_INT);
var_dump($preparedStatement->execute());