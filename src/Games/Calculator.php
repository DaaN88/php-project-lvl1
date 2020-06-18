<?php

namespace BrainGames\Games\Calculator;

use function BrainGames\Engine\Engine\startGameEngine;

function startCalcGame()
{
    $expressionsAndAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $firstNumber = mt_rand(1, 1000);
        $secondNumber = mt_rand(1, 1000);

        $arithmeticOperations = ['+', '-', '*'];
        $operation = $arithmeticOperations[mt_rand(0, count($arithmeticOperations) - 1)];

        $question = $firstNumber . " " . $operation . " " . $secondNumber;

        $expressionsAndAnswers[$i] = [
                                        "question" => $question,
                                        "expectedAnswer" => evaluateExpression(
                                            $firstNumber,
                                            $operation,
                                            $secondNumber
                                        )
                                     ];
    }

    startGameEngine(
        'What is the result of the expression?',
        $expressionsAndAnswers
    );
}

function evaluateExpression(
    $transmittedFirstNumber,
    $transmittedOperations,
    $transmittedSecondNumber
): string {
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

    return (string)$result;
}
