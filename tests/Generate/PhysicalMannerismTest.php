<?php

namespace CommonRoutes\Test\Generate;

use CommonRoutes\Generate\PhysicalMannerism;
use PHPUnit\Framework\TestCase;

class PhysicalMannerismTest extends TestCase
{
    public function testGenerate()
    {
        $generator = new PhysicalMannerism();

        for ($i = 0; $i < 25; $i++) {
            $description = $generator->generate();

            $this->assertIsArray($description);
            $this->assertArrayHasKey('tableTitle', $description);
            $this->assertArrayHasKey('mannerisms', $description);
            $this->assertEquals('Physical Mannerisms', $description['tableTitle']);

            $mannerisms = $description['mannerisms'];

            if (is_array($mannerisms)) {
                $this->assertIsArray($mannerisms);
                $this->assertGreaterThanOrEqual(1, count($mannerisms));

                foreach ($mannerisms as $category => $items) {
                    $this->assertIsArray($items);
                    $this->assertGreaterThanOrEqual(1, count($items));
                    $this->assertLessThanOrEqual(3, count($items));

                    foreach ($items as $item) {
                        $this->assertIsString($item);
                    }
                }
            } else {
                $this->assertIsString($mannerisms);
                $this->assertEquals($mannerisms, 'no remarkable mannerisms');
            }
        }
    }
}
