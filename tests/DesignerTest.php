<?php

namespace SurrealCristian\SummaExercise\Test;

use PHPUnit\Framework\TestCase;
use SurrealCristian\SummaExercise\Designer;

class DesignerTest extends TestCase
{
    public function testGettersAndSetters()
    {
        $designer = (new Designer('Designer', 'A', 20))
            ->setId(7)
            ->setFirstName('Des')
            ->setLastName('B')
            ->setAge(25);

        $this->assertEquals(7, $designer->getId());
        $this->assertEquals('Des', $designer->getFirstName());
        $this->assertEquals('B', $designer->getLastName());
        $this->assertEquals(25, $designer->getAge());
    }

    public function testAddType()
    {
        $designer = (new Designer('Designer', 'A', 20))
            ->addType('Graphic')
            ->addType('Web');
        $this->assertEquals(['graphic', 'web'], $designer->getTypes());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testAddTypeThrowsException()
    {
        $designer = (new Designer('Designer', 'A', 20))
            ->addType('Foo');
    }
}
