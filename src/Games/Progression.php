<?php

namespace BrainGames\Games\GameProgression;

use function BrainGames\Engine\Engine\startEngineGame;

function startGameProgression()
{
    $expressionsAndAnswers = [];

    for ($i = 0; $i < 3; $i++) {
        $indexInProgression = mt_rand(0, 9);
        $memberProgression = mt_rand(0, 100);
        $progressionStep = mt_rand(2, 10);
        $progression = [];

        //создаем и заполняем прогрессию
        for ($k = 0; $k < 10; $k++) {
            $memberProgression += $progressionStep;
            $progression[] = $memberProgression;
        }

        $expressionsAndAnswers[$i] = [
            "stringWithQuestion" => elementSubstitution($progression, $indexInProgression),
            "stringWithAnswer" => $progression[$indexInProgression],
        ];
    }

    startEngineGame(
        'What number is missing in the progression?',
        $expressionsAndAnswers
    );
}

function elementSubstitution($transmittedArray, $transmittedIndex)
{
    $transmittedArray[$transmittedIndex] = '..';

    return implode(' ', $transmittedArray);
}
