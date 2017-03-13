<?php

namespace SurrealCristian\SummaExercise;

use InvalidArgumentException;

class Company
{
    private $id;
    private $name;
    private $employees = [];
    private $employeeIdSequence = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmployees(array $filters = []): array
    {
        if (count($filters) === 0) {
            return array_values($this->employees);
        }
    }

    public function addEmployee(Employee $employee): self
    {
        if ($this->employeeExists($employee)) {
            throw new InvalidArgumentException('The employee is already in the company');
        }

        $this->iterEmployeeIdSequence();

        $employee->setEmployeeId($this->employeeIdSequence);

        $this->employees[$employee->getEmployeeId()] = $employee;

        return $this;
    }

    public function getEmployeeListAsPlainText()
    {
        foreach ($this->getEmployees() as $employeeId => $employee) {
            echo $this->formatEmployeeAsPlainTextLine($employee) . PHP_EOL;
        }
    }

    public function getEmployeeById(int $employeeId): Employee
    {
        if (isset($this->employees[$employeeId])) {
            return $this->employees[$employeeId];
        }

        throw new Exception("The employee $employeeId does not exists");
    }

    public function getAverageAgeOfEmployees(): int
    {
        $ages = [];

        foreach ($this->employees as $employee) {
            $ages[] = $employee->getAge();
        }

        $average = floor(array_sum($ages) / count($ages));

        return $average;
    }

    private function employeeExists($employee): bool
    {
        foreach ($this->employees as $employeeId => $e) {
            if (
                $e->getId() === $employee->getId() &&
                get_class($e) === get_class($employee)
            ) {
                return true;
            }
        }

        return false;
    }

    private function iterEmployeeIdSequence()
    {
        $this->employeeIdSequence += 1;
    }

    public function formatEmployeeAsPlainTextLine($employee)
    {
        $lineParts = [];

        $tmp = explode('\\', get_class($employee));
        $class = array_pop($tmp);

        $lineParts[] = "Employee {$employee->getEmployeeId()}";
        $lineParts[] = $class;
        $lineParts[] = "{$employee->getFirstName()} {$employee->getLastName()}";
        $lineParts[] = "{$employee->getAge()} years old";

        $line = implode(', ', $lineParts);

        return $line;
    }
}
