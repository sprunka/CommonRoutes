<?php

namespace CommonRoutes\Test\Generate;

use PHPUnit\Framework\TestCase;
use CommonRoutes\Generate\Name;
use CommonRoutes\Generic\ListFactory;
use CommonRoutes\Generic\RecordFactory;
use Faker\Factory;

class NameTest extends TestCase
{
    protected Name $nameGenerator;

    public function setUp(): void
    {
        $this->nameGenerator = new Name(new Factory(), new ListFactory(), new RecordFactory());
    }

    public function testGenerate()
    {
        $generatedName = $this->nameGenerator->generate();

        $this->assertArrayHasKey('tableTitle', $generatedName);
        $this->assertArrayHasKey('name', $generatedName);

        $this->assertEquals('Name', $generatedName['tableTitle']);

        $this->assertIsString($generatedName['name']);
    }

    /**
     * @dataProvider generateDataProvider
     */
    public function testGenerateWithParameters($type, $gender)
    {
        $generatedName = $this->nameGenerator->generate($type, $gender);

        $this->assertArrayHasKey('tableTitle', $generatedName);
        $this->assertArrayHasKey('name', $generatedName);

        $this->assertEquals('Name', $generatedName['tableTitle']);

        $this->assertIsString($generatedName['name']);
    }

    public function generateDataProvider()
    {
        return [
            ['first', 'any'],
            ['first', 'neutral'],
            ['first', 'male'],
            ['first', 'female'],
            ['last', 'any'],
            ['full', 'any'],
            ['full', 'neutral'],
            ['full', 'male'],
            ['full', 'female'],
        ];
    }
}
