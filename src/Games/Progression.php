<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\Engine\startGameEngine;

function startGameProgression()
{
    $expressionsAndAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $indexHiddenElement = mt_rand(0, 9);
        $firstNumberProgression = mt_rand(0, 100);
        $progressionStep = mt_rand(2, 10);
        $arithmeticProgression = [];

        //создаем и заполняем прогрессию
        for ($k = 0; $k < 10; $k++) {
            $firstNumberProgression += $progressionStep;
            $arithmeticProgression[] = $firstNumberProgression;
        }

        $expressionsAndAnswers[$i] = [
            "question" => hideProgressionElement($arithmeticProgression, $indexHiddenElement),
            "expectedAnswer" => (string)$arithmeticProgression[$indexHiddenElement],
        ];
    }

    startGameEngine(
        'What number is missing in the progression?',
        $expressionsAndAnswers
    );
}

function hideProgressionElement($progression, $indexOfHiddenElement)
{
    $progression[$indexOfHiddenElement] = '..';

    return returnChangedProgression($progression);
}

function returnChangedProgression($progression)
{
    return implode(' ', $progression);
}
