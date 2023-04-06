<?php

namespace CommonRoutes\Generate;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PhysicalMannerism extends \CommonRoutes\AbstractRoute
{

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $physicalMannerisms = [
            'nervous_habits' => [
                'nail biting',
                'hair twirling',
                'foot tapping',
                'fidgeting',
                'hand wringing',
                'finger drumming',
                'lip biting',
                'pen clicking',
                'leg bouncing',
                'cracking knuckles',
            ],
            'postures' => [
                'slouching',
                'crossed arms',
                'hand on hip',
                'resting chin on fist',
                'leaning against walls',
                'arms akimbo',
                'hands in pockets',
                'standing with feet wide apart',
            ],
            'expressions' => [
                'pursed lips',
                'eye rubbing',
                'rolling eyes',
                'raised eyebrows',
                'squinting',
                'furrowed brow',
                'smirking',
                'pouting',
            ],
            'thinking_habits' => [
                'stroking beard or chin',
                'head scratching',
                'finger snapping',
                'looking up and away',
                'putting finger to temple',
                'rubbing temples',
            ],
            'movement' => [
                'limp',
                'pacing',
                'neck cracking',
                'walking with a bounce',
                'stomping',
                'tiptoeing',
                'swagger',
                'shuffling',
            ],
            'gestures' => [
                'finger pointing',
                'hand waving',
                'thumb twiddling',
                'air quotes',
                'rubbing hands together',
                'clapping hands',
                'snapping fingers',
                'patting others on the back',
            ],
            'speech' => [
                'mumbling',
                'stuttering',
                'speaking quickly',
                'speaking slowly',
                'changing pitch',
                'clearing throat',
                'exaggerated enunciation',
                'whispering',
            ],
            'facial_tics' => [
                'eye twitching',
                'nose wrinkling',
                'cheek puffing',
                'jaw clenching',
                'tongue clicking',
                'eye blinking',
            ],
            'laughing' => [
                'giggling',
                'snorting',
                'belly laughing',
                'chuckling',
                'laughing silently',
                'cackling',
                'wheezing',
                'snickering',
            ],
        ];

        $maxCategories = count($physicalMannerisms);
        $numCategories = rand(0, $maxCategories);

        if ($numCategories === 0) {
            $result = "no remarkable mannerisms";
        } else {
            $selectedCategories = array_rand($physicalMannerisms, $numCategories);
            if (!is_array($selectedCategories)) {
                $selectedCategories = [$selectedCategories];
            }

            $result = [];
            foreach ($selectedCategories as $category) {
                $numItems = rand(1, 3);
                $items = $physicalMannerisms[$category];
                $maxItems = count($items);

                if ($numItems >= $maxItems) {
                    $selectedItems = $items;
                } else {
                    $selectedItems = [];
                    while (count($selectedItems) < $numItems) {
                        $itemIndex = array_rand($items);
                        if (!in_array($items[$itemIndex], $selectedItems)) {
                            $selectedItems[] = $items[$itemIndex];
                        }
                    }
                }
                $result[$category] = $selectedItems;
            }
        }

        return [
            'tableTitle' => 'Physical Mannerisms',
            'mannerisms' => $result,
        ];

    }
}