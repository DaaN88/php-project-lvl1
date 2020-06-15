<?php

namespace BrainGames\Games\GameGCD;

use function BrainGames\Engine\Engine\startEngineGame;

function startGCDGame()
{
    $expressionsAndAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $firstNumber = mt_rand(1, 1000);
        $secondNumber = mt_rand(1, 1000);

        $question = $firstNumber . " " . $secondNumber;

        $expressionsAndAnswers[$i] = [
            "stringWithQuestion" => $question,
            "stringWithAnswer" => findGCD(
                $firstNumber,
                $secondNumber
            ),
        ];
    }

    startEngineGame(
        'What is the result of the expression?',
        $expressionsAndAnswers
    );
}

function findGCD($transmittedFirstNumber, $transmittedSecondNumber)
{
    while ($transmittedSecondNumber !== 0) {
        $buffer = $transmittedFirstNumber % $transmittedSecondNumber;
        $transmittedFirstNumber = $transmittedSecondNumber;
        $transmittedSecondNumber = $buffer;
    }
    return $transmittedFirstNumber;
}
