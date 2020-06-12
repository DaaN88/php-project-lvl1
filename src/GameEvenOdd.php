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

    while ($attempt < 3) {
        $checkedNumber = mt_rand(1, 1000);

        line('Question: %s', $checkedNumber);

        $answer = prompt('Your answer?');
        line("%s", $answer);

        if (isYes($answer) === isEven($checkedNumber)) {
            echo "Correct!" . "\n";
            $attempt++;
        } else {
            return line(
                "%s is wrong answer ;(. Correct answer was %s." . "\n" .
                "Let's try again, %s!" . "\n",
                $answer,
                inversionAnswer($checkedNumber),
                $name
            );
        }
    }

    return line("Congratulations, %s!", $name);
}

//функция проверяет четное или нечетное число; возвращает true или false
function isEven($transmittedNumber)
{
    return $transmittedNumber % 2 === 0;
}

//функция проверяет что ввел пользователь и возвращает true или false
function isYes($transmittedAnswer)
{
    if ($transmittedAnswer === 'yes') {
        return true;
    } elseif ($transmittedAnswer === 'no') {
        return false;
    }

    return -1;
}

//функция возвращает yes или no для указания правильного ответа когда
//ошибся пользователь
function inversionAnswer($transmittedNumber)
{
    if (isEven($transmittedNumber)) {
        return 'yes';
    }

    return 'no';
}
