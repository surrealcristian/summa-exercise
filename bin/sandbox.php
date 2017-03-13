<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';

use SurrealCristian\SummaExercise\Company;
use SurrealCristian\SummaExercise\Developer;
use SurrealCristian\SummaExercise\Designer;

$company = new Company('Company A');
$company->setId(1);

$developerA = (new Developer('Developer', 'A', 20))
    ->setId(1)
    ->addLanguage('PHP')
    ->addLanguage('Python');

$developerB = (new Developer('Developer', 'B', 30))
    ->setId(2)
    ->addLanguage('.NET');

$designerA = (new Designer('Designer', 'A', 40))
    ->setId(1)
    ->addType('Graphic');

$designerB = (new Designer('Designer', 'A', 50))
    ->setId(2)
    ->addType('Web');

$company
    ->addEmployee($developerA)
    ->addEmployee($developerB)
    ->addEmployee($designerA)
    ->addEmployee($designerB);

echo "[Employees list]" . PHP_EOL;
echo $company->getEmployeeListAsPlainText();

echo PHP_EOL;

$employee = $company->getEmployeeById(3);

echo "[Get employee by ID: 3]" . PHP_EOL;
echo $company->formatEmployeeAsPlainTextLine($employee) . PHP_EOL;

echo PHP_EOL;

echo "[Average age of the employees]" . PHP_EOL;
echo $company->getAverageAgeOfEmployees() . PHP_EOL;
