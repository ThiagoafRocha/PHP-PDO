<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infra\Persistence\ConnectionFactory;
use Alura\Pdo\Infra\Repository\PdoStudentRepository;


require_once 'vendor/autoload.php';

$connection = ConnectionFactory::createConnection();
$studentRepository = new PdoStudentRepository($connection);


$connection->beginTransaction();

try {
    $aStudent = new Student(
        null,
        'Nico Steppat',
        new DateTimeImmutable('1985-05-01')
    );

    $studentRepository->save($aStudent);

    $anotherStudent = new Student(
        null,
        'Sergio Lopes',
        new DateTimeImmutable('1985-05-01')
    );
    $studentRepository->save($anotherStudent);

    $connection->commit();
} catch (\PDOException $e){
    echo $e->getMessage();
    $connection->rollBack();
}

//rollback() é um método para desfazer toda a transação.