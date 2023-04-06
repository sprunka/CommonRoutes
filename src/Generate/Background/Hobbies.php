<?php

namespace CommonRoutes\Generate\Background;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Hobbies extends \CommonRoutes\AbstractRoute
{

    /**
     * @inheritDoc
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args = []
    ): ResponseInterface {
        // TODO: Implement __invoke() method.
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        $minHobbies = 2;
        $maxHobbies = 5;
        $hobbiesAndInterests = [
            'reading',
            'writing',
            'painting',
            'drawing',
            'photography',
            'sculpting',
            'woodworking',
            'gardening',
            'cooking',
            'baking',
            'knitting',
            'crocheting',
            'sewing',
            'quilting',
            'embroidery',
            'calligraphy',
            'origami',
            'pottery',
            'jewelry making',
            'scrapbooking',
            'playing musical instruments',
            'singing',
            'dancing',
            'acting',
            'magic tricks',
            'juggling',
            'stand-up comedy',
            'improvisational theater',
            'watching movies',
            'playing video games',
            'board games',
            'card games',
            'tabletop role-playing games',
            'puzzles',
            'crosswords',
            'Sudoku',
            'chess',
            'collecting',
            'stamp collecting',
            'coin collecting',
            'birdwatching',
            'fishing',
            'hiking',
            'backpacking',
            'camping',
            'mountaineering',
            'rock climbing',
            'bouldering',
            'cycling',
            'running',
            'swimming',
            'yoga',
            'Pilates',
            'martial arts',
            'golf',
            'tennis',
            'soccer',
            'basketball',
            'volleyball',
            'skiing',
            'snowboarding',
            'ice skating',
            'rollerblading',
            'horseback riding',
            'scuba diving',
            'snorkeling',
            'surfing',
            'kayaking',
            'canoeing',
            'sailing',
            'astronomy',
            'geocaching',
            'traveling',
            'blogging',
            'vlogging',
            'podcasting',
            'language learning',
            'wine tasting',
            'brewing',
            'fossil hunting',
            'tarot reading',
            'meditation',
            'bonsai',
            'animal rescue',
            'volunteering',
            'genealogy',
            'history',
            'philosophy',
            'mythology',
            'architecture',
            'urban exploration',
            'parkour'
        ];

        $numHobbies = rand($minHobbies, $maxHobbies);
        $selectedHobbies = [];

        while (count($selectedHobbies) < $numHobbies) {
            $randomHobby = $hobbiesAndInterests[array_rand($hobbiesAndInterests)];

            if (!in_array($randomHobby, $selectedHobbies)) {
                $selectedHobbies[] = $randomHobby;
            }
        }

        return [
            'tableTitle' => 'Hobbies & Interests',
            'hobbyList' => implode(separator: ', ', array: $selectedHobbies)
        ];

    }
}