<?php

namespace CommonRoutes\Test\Generate;

use CommonRoutes\Generate\Voice;
use Faker\Factory;
use PHPUnit\Framework\TestCase;

class VoiceTest extends TestCase
{
    /**
     * @dataProvider labanProvider
     */
    public function testGenerate(bool $laban)
    {
        $voiceGenerator = new Voice(new Factory());

        $generatedVoice = $voiceGenerator->generate(laban: $laban);

        $this->assertArrayHasKey('tableTitle', $generatedVoice);
        $this->assertArrayHasKey('base_voice', $generatedVoice);
        $this->assertArrayHasKey('add_ons', $generatedVoice);

        $this->assertIsString($generatedVoice['tableTitle']);
        $this->assertIsString($generatedVoice['base_voice']);
        $this->assertIsArray($generatedVoice['add_ons']);

        $this->assertNotEmpty($generatedVoice['add_ons']);

    }

    public function labanProvider()
    {
        return [
            [true],
            [false],
        ];
    }
}
