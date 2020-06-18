<?php

namespace BrainGames\Engine\Engine;

use function cli\line;
use function cli\prompt;

function startGameEngine($ruleGame, $questionsAndAnswers)
{
    line('Welcome to the Brain Game!');
    line('%s', $ruleGame);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    //передаем многомерный массив (внутри 3 одномерных массива)
    //с парой: вопрос и ответ;
    //извлекаем последний массив из основного;
    //присваиваем $question = вопрос (первый элемент) из массива;
    //$expectedAnswer = это правильный ответ полученный из функции игры
    //(второй элемент)
    while ($questionsAndAnswers) {
        $pairQuestionAndAnswer = array_pop($questionsAndAnswers);
        $question = $pairQuestionAndAnswer['question'];
        $expectedAnswer = $pairQuestionAndAnswer['expectedAnswer'];

        line('Question, %s', $question);

        $userAnswer = prompt('Your answer?');
        line("%s", $userAnswer);

        if ($userAnswer === $expectedAnswer) {
            echo "Correct!" . "\n";
        } else {
            return line(
                "%s is wrong answer ;(. Correct answer was %s." . "\n" .
                "Let's try again, %s!" . "\n",
                $userAnswer,
                $expectedAnswer,
                $name
            );
        }
    }

    return line("Congratulations, %s!", $name);
}
