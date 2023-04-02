<?php

namespace CommonRoutes\Test\Generate;

use PHPUnit\Framework\TestCase;
use CommonRoutes\Generate\Name;
use CommonRoutes\Generic\ListFactory;
use CommonRoutes\Generic\RecordFactory;
use Faker\Factory;

class NameTest extends TestCase
{
    public function testGenerate()
    {
        $nameGenerator = new Name(new Factory(), new ListFactory(), new RecordFactory());

        $generatedName = $nameGenerator->generate();

        $this->assertArrayHasKey('tableTitle', $generatedName);
        $this->assertArrayHasKey('name', $generatedName);

        $this->assertEquals('Name', $generatedName['tableTitle']);

        $this->assertIsString($generatedName['name']);
    }
}
