<?php

namespace CommonRoutes\Test\Generate\Background;

use CommonRoutes\Generate\Background\Values;
use PHPUnit\Framework\TestCase;

class ValuesTest extends TestCase
{
    public function testGenerateValuesAndBeliefs()
    {
        $valuesGenerator = new Values();

        $generatedValues = $valuesGenerator->generate();

        $this->assertArrayHasKey('tableTitle', $generatedValues);
        $this->assertEquals('Values and Beliefs', $generatedValues['tableTitle']);

        $this->assertArrayHasKey('values', $generatedValues);
        $this->assertArrayHasKey('political_leanings', $generatedValues['values']);
        $this->assertArrayHasKey('religious_beliefs', $generatedValues['values']);
        $this->assertArrayHasKey('moral_principles', $generatedValues['values']);
    }
}
