<?php

namespace CommonRoutes\Test\Generate;

use CommonRoutes\Generate\PhysicalDescription;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class PhysicalDescriptionTest extends TestCase
{
    public function testGenerate()
    {
        $physicalDescriptionGenerator = new PhysicalDescription(new Factory());

        $generatedPhysicalDescription = $physicalDescriptionGenerator->generate();

        $this->assertArrayHasKey('tableTitle', $generatedPhysicalDescription);
        $this->assertArrayHasKey('apparentAge', $generatedPhysicalDescription);
        $this->assertArrayHasKey('height', $generatedPhysicalDescription);
        $this->assertArrayHasKey('weight', $generatedPhysicalDescription);
        $this->assertArrayHasKey('bmi', $generatedPhysicalDescription);
        $this->assertArrayHasKey('build', $generatedPhysicalDescription);
        $this->assertArrayHasKey('skinTone', $generatedPhysicalDescription);
        $this->assertArrayHasKey('eyeColor', $generatedPhysicalDescription);
        $this->assertArrayHasKey('hairColor', $generatedPhysicalDescription);
        $this->assertArrayHasKey('facialFeatures', $generatedPhysicalDescription);
        $this->assertArrayHasKey('noticeableMarkings', $generatedPhysicalDescription);
        $this->assertArrayHasKey('clothingStyle', $generatedPhysicalDescription);

        $this->assertEquals('Physical Description', $generatedPhysicalDescription['tableTitle']);
        $this->assertIsString($generatedPhysicalDescription['apparentAge']);
        $this->assertIsString($generatedPhysicalDescription['height']);
        $this->assertIsString($generatedPhysicalDescription['weight']);
        $this->assertIsNumeric($generatedPhysicalDescription['bmi']);
        $this->assertIsString($generatedPhysicalDescription['build']);
        $this->assertIsString($generatedPhysicalDescription['skinTone']);
        $this->assertIsString($generatedPhysicalDescription['eyeColor']);
        $this->assertIsString($generatedPhysicalDescription['hairColor']);
        $this->assertIsString($generatedPhysicalDescription['facialFeatures']);
        $this->assertIsString($generatedPhysicalDescription['noticeableMarkings']);
        $this->assertIsString($generatedPhysicalDescription['clothingStyle']);
    }
}
