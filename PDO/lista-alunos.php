<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$pdo = \Alura\Pdo\Infra\Persistence\ConnectionFactory::createConection();

$statement = $pdo->query("SELECT * FROM students WHERE id=1 ;");


while($studentData = $statement->fetch(PDO::FETCH_ASSOC)){
    $student = new Student(
        $studentData['id'],
        $studentData['name'],
        new \DateTimeImmutable ($studentData['birth_date'])
    );

    var_dump($student);
}






