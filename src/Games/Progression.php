<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\Engine\startGameEngine;

function startGameProgression()
{
    $expressionsAndAnswers = [];
    $ruleOfGame = 'What number is missing in the progression?';

    for ($i = 0; $i < GAME_ROUND; $i++) {
        $indexHiddenElement = random_int(0, 9);
        $firstNumberProgression = random_int(0, 100);
        $progressionStep = random_int(2, 10);
        $arithmeticProgression = [];

        //создаем и заполняем прогрессию
        for ($k = 0; $k < 10; $k++) {
            $firstNumberProgression += $progressionStep;
            $arithmeticProgression[] = $firstNumberProgression;
        }

        $expressionsAndAnswers[$i] = [
            "question" => implode(' ', hideProgressionElement($arithmeticProgression, $indexHiddenElement)),
            "expectedAnswer" => (string)$arithmeticProgression[$indexHiddenElement],
        ];
    }

    startGameEngine(
        $ruleOfGame,
        $expressionsAndAnswers
    );
}

function hideProgressionElement($progression, $indexOfHiddenElement)
{
    $progression[$indexOfHiddenElement] = '..';

    return $progression;
}
