<?php

namespace CommonRoutes\Generate\Background;

use CommonRoutes\AbstractRoute;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Fears extends AbstractRoute
{
    /**
     * @inheritDoc
     */
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args = []
    ): ResponseInterface {
        return parent::outputResponse($response, $this->generate('', '', false));
    }

    public function generate($type = '', $gender = '', $laban = false): array
    {
        // You can replace this list with more specific or diverse fears and phobias.
        $fearList = [
            'arachnophobia' => 'fear of spiders',
            'rejection' => 'fear of being rejected',
            'failure' => 'fear of failing',
            'change' => 'fear of change',
            'loss' => 'fear of losing a loved one',
            'commitment' => 'fear of commitment',
            'public_speaking' => 'fear of public speaking',
            'insects' => 'fear of insects',
            'darkness' => 'fear of the dark',
            'strangers' => 'fear of strangers',
            'claustrophobia' => 'fear of confined spaces',
            'intimacy' => 'fear of intimacy',
            'FOMO' => 'fear of missing out',
            'aquaphobia' => 'fear of water',
            'illness' => 'fear of getting sick',
            'thanatophobia' => 'fear of death',
            'acrophobia' => 'fear of heights',
            'aviophobia' => 'fear of flying',
            'zoophobia' => 'fear of animals',
            'abandonment' => 'fear of being abandoned',
            'natural_disasters' => 'fear of natural disasters',
            'crime' => 'fear of crime',
            'war' => 'fear of war',
            'technophobia' => 'fear of technology',
            'authority' => 'fear of authority figures',
            'embarrassment' => 'fear of being embarrassed',
            'aging' => 'fear of getting older',
            'unknown' => 'fear of the unknown',
            'supernatural' => 'fear of supernatural forces',
            'poverty' => 'fear of financial insecurity',
            'betrayal' => 'fear of being betrayed',
            'trapped' => 'fear of being trapped',
            'helplessness' => 'fear of being helpless',
            'separation' => 'fear of being separated from loved ones',
            'identity_loss' => 'fear of losing one\'s identity',
            'criticism' => 'fear of being criticized',
            'being_forgotten' => 'fear of being forgotten',
            'loss_of_independence' => 'fear of losing one\'s independence',
            'vulnerability' => 'fear of being vulnerable',
            'disappointing_others' => 'fear of disappointing others',
            'decision_making' => 'fear of making decisions',
            'unemployment' => 'fear of losing one\'s job',
            'trypanophobia' => 'fear of needles',
            'responsibility' => 'fear of taking on responsibility',
            'crowds' => 'fear of large crowds',
            'loud_noises' => 'fear of loud noises',
            'being_a_burden' => 'fear of being a burden to others',
            'conflict' => 'fear of confrontation',
            'driving' => 'fear of driving',
        ];

        $fears = [];
        $numberOfFears = rand(1, 3); // You can adjust the number of fears generated.

        for ($i = 0; $i < $numberOfFears; $i++) {
            $index = array_rand($fearList);
            $fears[$index] = $fearList[$index];
            unset($fearList[$index]);
        }

        return [
            'tableTitle' => 'Fears and Phobias',
            'fears' => $fears,
        ];
    }
}
