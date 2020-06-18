<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\Engine\startGameEngine;

function startGCDGame()
{
    $expressionsAndAnswers = [];

    for ($i = 0; $i < GAME_ROUND; $i++) {
        $firstNumber = random_int(1, 1000);
        $secondNumber = random_int(1, 1000);

        $question = $firstNumber . " " . $secondNumber;

        $expressionsAndAnswers[$i] = [
            "question" => $question,
            "expectedAnswer" => (string)findGCD(
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

function findGCD($verifiableFirstNumber, $verifiableSecondNumber)
{
    while ($verifiableSecondNumber !== 0) {
        $buffer = $verifiableFirstNumber % $verifiableSecondNumber;
        $verifiableFirstNumber = $verifiableSecondNumber;
        $verifiableSecondNumber = $buffer;
    }
    return $verifiableFirstNumber;
}
