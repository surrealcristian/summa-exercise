<?php

namespace SurrealCristian\SummaExercise;

use InvalidArgumentException;

class Designer extends Employee
{
    private $validTypes = ['graphic', 'web'];
    private $types = [];

    protected $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTypes(): array
    {
        return $this->types;
    }

    public function addType($type)
    {
        $type = strtolower($type);

        $this->assertType($type);

        if (!in_array($type, $this->types)) {
            $this->types[] = $type;
        }

        return $this;
    }

    public function removeType(string $type): self
    {
        $type = strtolower($type);

        $this->assertType($type);

        $key = array_search($type, $this->types);

        if ($key !== false) {
            unset($this->types[$key]);
        }

        return $this;
    }

    private function assertType($type)
    {
        if (!in_array($type, $this->validTypes)) {
            throw new InvalidArgumentException('The type is invalid');
        }
    }
}
