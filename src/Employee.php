<?php

namespace SurrealCristian\SummaExercise;

use InvalidArgumentException;

abstract class Employee
{
    protected $employeeId;
    protected $firstName;
    protected $lastName;
    protected $age;

    public function __construct(
        string $firstName, string $lastName, int $age
    ) {
        $this->assertAge($age);

        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }

    public function getEmployeeId(): ?int
    {
        return $this->employeeId;
    }

    public function setEmployeeId(int $employeeId): self
    {
        $this->employeeId = $employeeId;

        return $this;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    protected function assertAge(int $age)
    {
        if ($age < 0) {
            throw new InvalidArgumentException('Invalid age');
        }
    }
}
