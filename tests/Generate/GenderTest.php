<?php

namespace CommonRoutes\Test\Generate;

use PHPUnit\Framework\TestCase;
use CommonRoutes\Generate\Gender;
use Faker\Factory;

class GenderTest extends TestCase
{
    public function testGenerate()
    {
        $genderGenerator = new Gender(new Factory());

        $generatedGender = $genderGenerator->generate();

        $this->assertArrayHasKey('tableTitle', $generatedGender);
        $this->assertArrayHasKey('gender', $generatedGender);

        $this->assertEquals('Gender Identity and/or Expression', $generatedGender['tableTitle']);

        $this->assertIsString($generatedGender['gender']);
    }
}
