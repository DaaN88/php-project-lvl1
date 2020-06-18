<?php

namespace BrainGames\Games\EvenOdd;

use function BrainGames\Engine\Engine\startGameEngine;

function startGameEvenOdd()
{
    $expressionsAndAnswers = [];

    for ($i = 0; $i < QUANTITY_ATTEMPT; $i++) {
        $number = mt_rand(1, 1000);
        $question = (string)$number;

        $expressionsAndAnswers[$i] = [
                                        "question" => $question,
                                        "expectedAnswer" => ifEvenYesElseNo($number)
                                     ];
    }

    startGameEngine(
        'Answer "yes" if the number is even, otherwise answer "no".',
        $expressionsAndAnswers
    );
}

//функция проверяет четное или нечетное число; возвращает true или false
function ifEvenYesElseNo($verifiableNumber)
{
    if ($verifiableNumber % 2 === 0) {
        return 'yes';
    }

    return 'no';
}
