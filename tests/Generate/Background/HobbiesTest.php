<?php

namespace Tests\CommonRoutes\Generate\Background;

use CommonRoutes\Generate\Background\Hobbies;
use PHPUnit\Framework\TestCase;

class HobbiesTest extends TestCase
{
    private Hobbies $hobbies;

    protected function setUp(): void
    {
        $this->hobbies = new Hobbies();
    }

    public function testGenerate(): void
    {
        $generatedHobbies = $this->hobbies->generate();

        $this->assertArrayHasKey('tableTitle', $generatedHobbies);
        $this->assertEquals('Hobbies & Interests', $generatedHobbies['tableTitle']);

        $this->assertArrayHasKey('hobbyList', $generatedHobbies);
        $this->assertIsString($generatedHobbies['hobbyList']);
        $generatedHobbies['hobbyList'] = explode(separator: ', ',string: $generatedHobbies['hobbyList']);
        $this->assertGreaterThanOrEqual(2, count($generatedHobbies['hobbyList']));
        $this->assertLessThanOrEqual(5, count($generatedHobbies['hobbyList']));

        foreach ($generatedHobbies['hobbyList'] as $hobby) {
            $this->assertIsString($hobby);
        }
    }
}
