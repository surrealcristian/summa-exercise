<?php

namespace SurrealCristian\SummaExercise\Test;

use PHPUnit\Framework\TestCase;
use SurrealCristian\SummaExercise\Developer;

class DeveloperTest extends TestCase
{
    public function testGettersAndSetters()
    {
        $dev = (new Developer('Developer', 'A', 20))
            ->setId(7)
            ->setFirstName('Dev')
            ->setLastName('B')
            ->setAge(25);

        $this->assertEquals(7, $dev->getId());
        $this->assertEquals('Dev', $dev->getFirstName());
        $this->assertEquals('B', $dev->getLastName());
        $this->assertEquals(25, $dev->getAge());
    }
}
