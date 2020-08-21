<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';


$pdo = \Alura\Pdo\Infra\Persistence\ConnectionFactory::createConnection();

$student = new Student(null, 'Thiago Rocha', new \DateTimeImmutable('1994-11-13'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));

if ($statement->execute()){
    echo "Aluno incluído";
}
