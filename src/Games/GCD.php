<?php

namespace BrainGames\Games\GCD;

use function BrainGames\Engine\Engine\startGameEngine;

function startGCDGame()
{
    $expressionsAndAnswers = [];
    $ruleOfGame = 'Find the greatest common divisor of given numbers.';

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
        $ruleOfGame,
        $expressionsAndAnswers
    );
}

function findGCD($firstNumber, $secondNumber)
{
    while ($secondNumber !== 0) {
        $buffer = $firstNumber % $secondNumber;
        $firstNumber = $secondNumber;
        $secondNumber = $buffer;
    }
    return $firstNumber;
}
