<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\Engine\startGameEngine;

function startGameProgression()
{
    $expressionsAndAnswers = [];
    $ruleOfGame = 'What number is missing in the progression?';
    $lastElementProgression = LENGTH_ARITHMETIC_PROGRESSION - 1;

    for ($i = 0; $i < ROUND_COUNTS; $i++) {
        $indexHiddenElement = random_int(0, $lastElementProgression);
        $numberOfProgression = random_int(0, 100);
        $progressionStep = random_int(2, 10);
        $arithmeticProgression = [];

        //создаем и заполняем прогрессию
        for ($k = 0; $k < LENGTH_ARITHMETIC_PROGRESSION; $k++) {
            $numberOfProgression += $progressionStep;
            $arithmeticProgression[] = $numberOfProgression;
        }

        //запоминаем скрытый элемент
        $rightAnswer = $arithmeticProgression[$indexHiddenElement];
        //скрываем элемент
        $arithmeticProgression[$indexHiddenElement] = '..';

        $expressionsAndAnswers[$i] = [
            "question" => implode(' ', $arithmeticProgression),
            "expectedAnswer" => (string)$rightAnswer,
        ];
    }

    startGameEngine(
        $ruleOfGame,
        $expressionsAndAnswers
    );
}
