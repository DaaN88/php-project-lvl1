<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\Engine\startGameEngine;

function startGamePrime()
{
    $expressionsAndAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $number = mt_rand(0, 1000);

        $expressionsAndAnswers[$i] = [
          "question" => $number,
          "expectedAnswer" => ifPrimeYesElseNo($number),
        ];
    }

    startGameEngine(
        'Answer "yes" if given number is prime. Otherwise answer "no".',
        $expressionsAndAnswers
    );
}

function ifPrimeYesElseNo($verifiableNumber)
{
    if ($verifiableNumber <= 1) {
        return 'no';
    }

    $squaredNumber = sqrt($verifiableNumber);

    for ($i = 2; $i <= $squaredNumber; $i++) {
        if ($verifiableNumber % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}
