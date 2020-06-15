<?php

namespace BrainCalc\GameCalculator;

use function cli\line;
use function cli\prompt;

function startCalcGame()
{
    line('Welcome to the Brain Game!');
    line('What is the result of the expression?');

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $attempt = 0;

    while ($attempt < 3) {
        $firstNumber = mt_rand(1, 1000);
        $secondNumber = mt_rand(1, 1000);

        $arrayOperations = ['+', '-', '*'];
        $operations = $arrayOperations[mt_rand(0, count($arrayOperations) - 1)];

        line('Question, %s %s %s', $firstNumber, $operations, $secondNumber);

        $answer = prompt('Your answer?');
        line("%s", $answer);

        if ((int)$answer === evaluateExpression($firstNumber, $operations, $secondNumber)) {
            echo "Correct!" . "\n";
            $attempt++;
        } else {
            return line(
                "%s is wrong answer ;(. Correct answer was %s." . "\n"
                . "Let's try again, %s!",
                $answer,
                evaluateExpression($firstNumber, $operations, $secondNumber),
                $name
            );
        }
    }

    return line("Congratulations, %s!", $name);
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
