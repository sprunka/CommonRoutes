<?php

namespace Tests\CommonRoutes\Generate\Background;

use CommonRoutes\Generate\Background\Fears;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class FearsTest extends TestCase
{
    public function testGenerate()
    {
        $fears = new Fears();

        $result = $fears->generate();

        $this->assertIsArray($result);
        $this->assertArrayHasKey('tableTitle', $result);
        $this->assertArrayHasKey('fears', $result);
        $this->assertNotEmpty($result['fears']);
    }
}
