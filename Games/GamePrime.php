<?php

namespace BrainGames\Games\GamePrime;

use function BrainGames\Engine\Engine\startEngineGame;

function startGamePrime()
{
    $expressionsAndAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $primeNumber = mt_rand(0, 1000);

        $expressionsAndAnswers[$i] = [
          "stringWithQuestion" => $primeNumber,
          "stringWithAnswer" => isPrime($primeNumber),
        ];
    }

    startEngineGame(
        'Answer "yes" if given number is prime. Otherwise answer "no".',
        $expressionsAndAnswers
    );
}

function isPrime($transmittedNumber)
{
    if ($transmittedNumber === 1 || $transmittedNumber === 0) {
        return 'no';
    }

    $sqrtNumber = sqrt($transmittedNumber);

    for ($i = 2; $i <= $sqrtNumber; $i++) {
        if ($transmittedNumber % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}
