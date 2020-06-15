<?php

namespace BrainGames\Games\GameEvenOdd;

use function BrainGames\Engine\Engine\startEngineGame;

function startGame()
{
    $expressionsAndAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $checkedNumber = mt_rand(1, 1000);
        $stringExpression = (string)$checkedNumber;

        $expressionsAndAnswers[$i] = [
                                        "stringWithQuestion" => $stringExpression,
                                        "stringWithAnswer" => isEven($checkedNumber)
                                     ];
    }

    startEngineGame(
        'Answer "yes" if the number is even, otherwise answer "no".',
        $expressionsAndAnswers
    );
}

//функция проверяет четное или нечетное число; возвращает true или false
function isEven($transmittedNumber)
{
    return $transmittedNumber % 2 === 0;
}
