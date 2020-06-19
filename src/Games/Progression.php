<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\Engine\startGameEngine;

const ARITHMETIC_PROGRESSION_LENGTH = 10;

function startGameProgression()
{
    $expressionsAndAnswers = [];
    $ruleOfGame = 'What number is missing in the progression?';

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        $firstNumberOfProgression = random_int(0, 100);
        $progressionStep = random_int(2, 10);
        $arithmeticProgression = [];

        //создаем и заполняем прогрессию
        for ($k = 1; $k <= ARITHMETIC_PROGRESSION_LENGTH; $k++) {
            $arithmeticProgression[] = $firstNumberOfProgression + $progressionStep * ($k - 1);
        }

        $indexOfHiddenElement = array_rand($arithmeticProgression);

        //запоминаем скрытый элемент
        $rightAnswer = $arithmeticProgression[$indexOfHiddenElement];
        //скрываем элемент
        $arithmeticProgression[$indexOfHiddenElement] = '..';

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
