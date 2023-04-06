<?php

namespace CommonRoutes\Generate;

use CommonRoutes\AbstractRoute;
use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Occupation extends AbstractRoute
{
    private Generator $faker;

    public function __construct(Factory $fakerFactory)
    {
        $this->faker = $fakerFactory::create();
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $occupation = $this->faker->jobTitle;
        return [
            'tableTitle' => 'Occupation',
            'occupation' => $occupation
        ];
    }
}
