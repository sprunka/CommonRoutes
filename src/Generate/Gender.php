<?php

namespace CommonRoutes\Generate;

use CommonRoutes\AbstractRoute;
use Faker\Factory;
use Faker\Generator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Gender extends AbstractRoute
{
    protected Generator $faker;

    public function __construct(Factory $faker)
    {
        $this->faker = $faker::create();
    }

    /**
     * @inheritDoc
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args = []
    ): ResponseInterface {
        return parent::outputResponse($response, $this->generate());
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        // Weighted with bias towards the Binary
        $genderList = [
            'Male',
            'Female',
            'Non-Binary',
            'Male',
            'Female',
            'Genderqueer',
            'Male',
            'Female',
            'Agender',
            'Male',
            'Female',
            'Bigender',
            'Male',
            'Female',
            'Androgynous',
            'Male',
            'Female',
            'ntersex',
            'Male',
            'Female',
            'Genderfluid',
            'Male',
            'Female',
            'Neutrois',
            'Male',
            'Female',
            'Pangender',
            'Male',
            'Female',
            'Two-Spirit',
            'Male',
            'Female',
            'Male',
            'Female',
            'Transgender'
        ];

        $gender = $this->faker->randomElement($genderList);

        return [
            'tableTitle' => 'Gender Identity and/or Expression',
            'gender' => $gender
        ];

    }
}