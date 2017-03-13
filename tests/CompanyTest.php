<?php

namespace SurrealCristian\SummaExercise\Test;

use PHPUnit\Framework\TestCase;
use SurrealCristian\SummaExercise\Company;
use SurrealCristian\SummaExercise\Developer;

class CompanyTest extends TestCase
{
    public function testGettersAndSetters()
    {
        $company = (new Company('Company A'))
            ->setId(7)
            ->setName('Company B');

        $this->assertEquals(7, $company->getId());
        $this->assertEquals('Company B', $company->getName());
    }

    public function testAddEmployee()
    {
        $company = (new Company('Company A'))
            ->setId(7);

        $dev = new Developer('Foo', 'Bar', 99);

        $company->addEmployee($dev);

        $employees = $company->getEmployees();

        $this->assertEquals('Foo', $employees[0]->getFirstName());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testAddEmployeeTwiceThrowsException()
    {
        $company = (new Company('Company A'))
            ->setId(7);

        $dev = new Developer('Foo', 'Bar', 99);

        $company
            ->addEmployee($dev)
            ->addEmployee($dev);
    }

    public function testGetEmployeeById()
    {
        $company = (new Company('Company A'))
            ->setId(7);

        $dev = new Developer('Foo', 'Bar', 99);

        $company->addEmployee($dev);

        $employee = $company->getEmployeeById(1);

        $this->assertEquals('Foo', $employee->getFirstName());
    }
}
