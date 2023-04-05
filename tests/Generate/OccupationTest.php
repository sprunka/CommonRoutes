<?php

namespace CommonRoutes\Test\Generate;

use CommonRoutes\Generate\Occupation;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class OccupationTest extends TestCase
{
    public function testGenerate()
    {
        $occupationGenerator = new Occupation(new Factory());

        $generatedOccupation = $occupationGenerator->generate();

        $this->assertArrayHasKey('tableTitle', $generatedOccupation);
        $this->assertArrayHasKey('occupation', $generatedOccupation);

        $this->assertEquals('Occupation', $generatedOccupation['tableTitle']);
        $this->assertIsString($generatedOccupation['occupation']);
    }
}
