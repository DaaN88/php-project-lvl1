<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\Engine\startGameEngine;

function startGCDGame()
{
    $expressionsAndAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $firstNumber = mt_rand(1, 1000);
        $secondNumber = mt_rand(1, 1000);

        $question = $firstNumber . " " . $secondNumber;

        $expressionsAndAnswers[$i] = [
            "question" => $question,
            "expectedAnswer" => findGCD(
                $firstNumber,
                $secondNumber
            ),
        ];
    }

    startGameEngine(
        'Find the greatest common divisor of given numbers.',
        $expressionsAndAnswers
    );
}

function findGCD($verifiableFirstNumber, $verifiableSecondNumber): string
{
    while ($verifiableSecondNumber !== 0) {
        $buffer = $verifiableFirstNumber % $verifiableSecondNumber;
        $verifiableFirstNumber = $verifiableSecondNumber;
        $verifiableSecondNumber = $buffer;
    }
    return $verifiableFirstNumber;
}
