<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\Engine\startGameEngine;

function startGamePrime()
{
    $expressionsAndAnswers = [];
    $ruleOfGame = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    for ($i = 0; $i < ROUND_COUNTS; $i++) {
        $number = random_int(0, 1000);

        $expressionsAndAnswers[$i] = [
          "question" => $number,
          "expectedAnswer" => isPrime($number) ? 'yes' : 'no',
        ];
    }

    startGameEngine(
        $ruleOfGame,
        $expressionsAndAnswers
    );
}

function isPrime($number)
{
    if ($number <= 1) {
        return false;
    }

    $squaredNumber = sqrt($number);

    for ($i = 2; $i <= $squaredNumber; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
