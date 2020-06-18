<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\Engine\startGameEngine;

function startGamePrime()
{
    $expressionsAndAnswers = [];

    for ($i = 0; $i < GAME_ROUND; $i++) {
        $number = random_int(0, 1000);

        $expressionsAndAnswers[$i] = [
          "question" => $number,
          "expectedAnswer" => isPrime($number) ? 'yes' : 'no',
        ];
    }

    startGameEngine(
        'Answer "yes" if given number is prime. Otherwise answer "no".',
        $expressionsAndAnswers
    );
}

function isPrime($verifiableNumber)
{
    if ($verifiableNumber <= 1) {
        return false;
    }

    $squaredNumber = sqrt($verifiableNumber);

    for ($i = 2; $i <= $squaredNumber; $i++) {
        if ($verifiableNumber % $i === 0) {
            return false;
        }
    }
    return true;
}
