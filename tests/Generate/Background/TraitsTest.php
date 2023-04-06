<?php

namespace CommonRoutes\Test\Generate\Background;

use PHPUnit\Framework\TestCase;
use CommonRoutes\Generate\Background\Traits;

class TraitsTest extends TestCase
{
    public function testGenerate()
    {
        $traitsGenerator = new Traits();

        $generatedTraits = $traitsGenerator->generate();

        $this->assertArrayHasKey('tableTitle', $generatedTraits);
        $this->assertArrayHasKey('personalityTraits', $generatedTraits);

        $this->assertEquals('Personality Traits', $generatedTraits['tableTitle']);

        $this->assertIsArray($generatedTraits['personalityTraits']);
        $this->assertGreaterThanOrEqual(3, count($generatedTraits['personalityTraits']));
        $this->assertLessThanOrEqual(7, count($generatedTraits['personalityTraits']));
    }
}
