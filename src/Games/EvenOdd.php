<?php

namespace BrainGames\Games\EvenOdd;

use function BrainGames\Engine\Engine\startGameEngine;

function startGameEvenOdd()
{
    $expressionsAndAnswers = [];
    $ruleOfGame = 'Answer "yes" if the number is even, otherwise answer "no".';

    for ($i = 0; $i < GAME_ROUND; $i++) {
        $number = random_int(1, 1000);

        $expressionsAndAnswers[$i] = [
          "question" => $number,
          "expectedAnswer" => isEven($number) ? 'yes' : 'no',
        ];
    }

    startGameEngine(
        $ruleOfGame,
        $expressionsAndAnswers
    );
}

//функция проверяет четное или нечетное число; возвращает true или false
function isEven($number)
{
    if ($number % 2 === 0) {
        return true;
    }

    return false;
}
