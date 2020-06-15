<?php

namespace BrainGames\Games\GameCalculator;

use function BrainGames\Engine\Engine\startEngineGame;

function startCalcGame()
{
    $expressionsAndAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $firstNumber = mt_rand(1, 1000);
        $secondNumber = mt_rand(1, 1000);

        $arrayOperations = ['+', '-', '*'];
        $operations = $arrayOperations[mt_rand(0, count($arrayOperations) - 1)];

        $stringExpression = $firstNumber . " " . $operations . " " . $secondNumber;

        $expressionsAndAnswers[$i] = [
                                        (string)$stringExpression =>
                                        evaluateExpression(
                                            $firstNumber,
                                            $operations,
                                            $secondNumber
                                        )
                                     ];
    }

    startEngineGame(
        'What is the result of the expression?',
        $expressionsAndAnswers
    );
}

function evaluateExpression($transmittedFirstNumber, $transmittedOperations, $transmittedSecondNumber)
{
    $result = 0;

    switch ($transmittedOperations) {
        case '+':
            $result = $transmittedFirstNumber + $transmittedSecondNumber;
            break;
        case '-':
            $result = $transmittedFirstNumber - $transmittedSecondNumber;
            break;
        case '*':
            $result = $transmittedFirstNumber * $transmittedSecondNumber;
            break;
    }

    return (int)$result;
}
