<?php

namespace CommonRoutes\Generate\Background;

use CommonRoutes\AbstractRoute;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Traits extends AbstractRoute
{
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
        $personalityTraits = [
            'adventurousness' => ['adventurous', 'daring', 'cautious', 'guarded', 'meticulous'],
            'agreeableness' => ['agreeable', 'friendly', 'diplomatic', 'disagreeable', 'hostile'],
            'thinking_style' => ['analytical', 'logical', 'intuitive', 'imaginative', 'creative'],
            'composure' => ['anxious', 'nervous', 'composed', 'calm', 'serene'],
            'confidence' => ['confident', 'assured', 'modest', 'insecure', 'timid'],
            'ambition' => ['content', 'satisfied', 'aspiring', 'ambitious', 'driven'],
            'adaptability' => ['creative', 'innovative', 'adaptable', 'practical', 'rigid'],
            'discipline' => ['disciplined', 'controlled', 'flexible', 'impulsive', 'reckless'],
            'empathy' => ['empathetic', 'compassionate', 'indifferent', 'apathetic', 'callous'],
            'generosity' => ['generous', 'benevolent', 'prudent', 'frugal', 'selfish'],
            'independence' => ['independent', 'self-reliant', 'interdependent', 'dependent', 'reliant'],
            'introversion_extroversion' => ['introvert', 'introspective', 'ambivert', 'outgoing', 'extrovert'],
            'methodicalness' => ['methodical', 'systematic', 'adjustable', 'spontaneous', 'haphazard'],
            'openness' => ['open-minded', 'curious', 'receptive', 'conservative', 'closed-minded'],
            'organization' => ['organized', 'orderly', 'systematic', 'disorganized', 'chaotic'],
            'patience' => ['patient', 'enduring', 'tolerant', 'impatient', 'restless'],
            'optimism' => ['pessimistic', 'cynical', 'realistic', 'hopeful', 'optimistic'],
            'sociability' => ['reserved', 'introverted', 'amiable', 'outgoing', 'sociable'],
            'sensitivity' => ['sensitive', 'responsive', 'even-tempered', 'assertive', 'bold'],
            'humor' => ['dry', 'witty', 'lighthearted', 'goofy', 'slapstick']
            ];

        // How many traits should we pull?
        $min = 3;
        $max = 7;

        $selectedTraits = [];
        $numTraits = rand($min, $max);
        $traitKeys = array_keys($personalityTraits);

        while (count($selectedTraits) < $numTraits) {
            $randomTraitKey = $traitKeys[array_rand($traitKeys)];

            if (!isset($selectedTraits[$randomTraitKey])) {
                $randomWord = $personalityTraits[$randomTraitKey][array_rand($personalityTraits[$randomTraitKey])];
                $selectedTraits[$randomTraitKey] = $randomWord;
            }
        }

        return [
            'tableTitle' => 'Personality Traits',
            'personalityTraits' => $selectedTraits
        ];

    }
}