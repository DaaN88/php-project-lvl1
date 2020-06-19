<?php

namespace BrainGames\Games\Calculator;

use Exception;

use function BrainGames\Engine\Engine\startGameEngine;

function startGameCalc()
{
    $expressionsAndAnswers = [];
    $ruleOfGame = 'What is the result of the expression?';

    for ($i = 0; $i < ROUND_COUNTS; $i++) {
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
    switch ($operation) {
        case '+':
            return $firstOperand + $secondOperand;
        case '-':
            return $firstOperand - $secondOperand;
        case '*':
            return $firstOperand * $secondOperand;
    }

    throw new Exception('Wrong operation');
}
