<?php

namespace BrainGames\Games\Calculator;

use function BrainGames\Engine\Engine\startGameEngine;

function startCalcGame()
{
    $expressionsAndAnswers = [];

    for ($i = 0; $i < GAME_ROUND; $i++) {
        $firstNumber = random_int(1, 1000);
        $secondNumber = random_int(1, 1000);

        $arithmeticOperations = ['+', '-', '*'];
        $operation = $arithmeticOperations[array_rand($arithmeticOperations)];

        $question = $firstNumber . " " . $operation . " " . $secondNumber;

        $expressionsAndAnswers[$i] = [
                                        "question" => $question,
                                        "expectedAnswer" => (string)evaluateExpression(
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

    return $result;
}
