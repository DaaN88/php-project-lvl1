<?php

namespace BrainEven\GameEvenOdd;

use function cli\line;
use function cli\prompt;

function startGame()
{
    line('Welcome to the Brain Game!');
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    $attempt = 0;
    $goodAttempt = 0;

    while ($attempt < 3) {
        $checkedNumber = mt_rand(0, 1000);

        line('Question: %s', $checkedNumber);

        $answer = prompt('Your answer?');
        line("%s", $answer);

        if (isYes($answer) === isEven($checkedNumber)) {
            echo "Correct!" . "\n";
            $goodAttempt++;
        } elseif (isYes($answer) === -1) {
            echo "'yes' is wrong answer ;(. Correct answer was 'no'." . "\n";
            echo "Let's try again, Bill!" . "\n";
        }
        $attempt++;
    }

    if ($goodAttempt === 3) {
        line("Congratulations, %s", $name);
    }
}

function isEven($transmittedNumber)
{
    return $transmittedNumber % 2 === 0;
}

function isYes($transmittedAnswer)
{
    if ($transmittedAnswer === 'yes') {
        return true;
    } elseif ($transmittedAnswer === 'no') {
        return false;
    }

    return -1;
}