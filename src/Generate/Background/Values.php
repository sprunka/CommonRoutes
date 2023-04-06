<?php

namespace CommonRoutes\Generate\Background;

use CommonRoutes\AbstractRoute;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Values extends AbstractRoute
{

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $valuesAndBeliefs = [
            'political_leanings' => [
                'centrist',
                'conservative',
                'green',
                'liberal',
                'libertarian',
                'nationalist',
                'progressive',
                'socialist'
            ],
            'religious_beliefs' => [
                'African Traditional Religion',
                'agnostic',
                'Animist',
                'atheist',
                'Baha\'i',
                'Buddhist',
                'Christian',
                'Confucian',
                'deist',
                'Hindu',
                'Indigenous beliefs',
                'Jain',
                'Jewish',
                'Muslim',
                'Native American spirituality',
                'New Age',
                'Pagan',
                'pantheist',
                'secular_humanist',
                'Shamanism',
                'Shinto',
                'Sikh',
                'spiritual_but_not_religious',
                'Taoist',
                'Unitarian Universalist',
                'universalist',
                'Wiccan',
                'Zoroastrian'
            ],
            'moral_principles' => [
                'altruism',
                'ambition',
                'assertiveness',
                'compassion',
                'courage',
                'diligence',
                'duty',
                'empathy',
                'equality',
                'fairness',
                'forgiveness',
                'freedom',
                'generosity',
                'honesty',
                'honor',
                'humility',
                'integrity',
                'justice',
                'kindness',
                'loyalty',
                'optimism',
                'patience',
                'perseverance',
                'respect',
                'responsibility',
                'self-discipline',
                'temperance',
                'tolerance',
                'trustworthiness',
                'wisdom',
                // Questionable moral stances
                'apathy',
                'authoritarianism',
                'cynicism',
                'dogmatism',
                'egoism',
                'elitism',
                'exploitation',
                'fatalism',
                'hedonism',
                'machiavellianism',
                'manipulation',
                'materialism',
                'narcissism',
                'nihilism',
                'opportunism',
                'pessimism',
                'prejudice',
                'rationalization',
                'relativism',
                'skepticism'
            ]
        ];

        $selectedValuesAndBeliefs = [
            'political_leanings' => $valuesAndBeliefs['political_leanings'][array_rand($valuesAndBeliefs['political_leanings'])],
            'religious_beliefs' => $valuesAndBeliefs['religious_beliefs'][array_rand($valuesAndBeliefs['religious_beliefs'])],
            'moral_principles' => $valuesAndBeliefs['moral_principles'][array_rand($valuesAndBeliefs['moral_principles'])],
        ];

        return [
            'tableTitle' => 'Values and Beliefs',
            'values' => $selectedValuesAndBeliefs
        ];

    }
}