<?php

namespace BrainGames\Games\Calculator;

use function BrainGames\Engine\Engine\startGameEngine;

function startGameCalc()
{
    $expressionsAndAnswers = [];
    $ruleOfGame = 'What is the result of the expression?';

    for ($i = 0; $i < GAME_ROUNDS; $i++) {
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
        $ruleOfGame,
        $expressionsAndAnswers
    );
}

function evaluateExpression($firstOperand, $operation, $secondOperand)
{
    $result = 0;

    switch ($operation) {
        case '+':
            $result = $firstOperand + $secondOperand;
            break;
        case '-':
            $result = $firstOperand - $secondOperand;
            break;
        case '*':
            $result = $firstOperand * $secondOperand;
            break;
    }

    return $result;
}
