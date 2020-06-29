<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\Engine\playGame;

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
        for ($k = 0; $k < ARITHMETIC_PROGRESSION_LENGTH; $k++) {
            $arithmeticProgression[] = $firstNumberOfProgression + $progressionStep * $k;
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

    playGame(
        $ruleOfGame,
        $expressionsAndAnswers
    );
}
