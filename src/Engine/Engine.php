<?php

namespace BrainGames\Engine\Engine;

use function cli\line;
use function cli\prompt;

function startGameEngine($ruleOfGame, $questionsAndAnswers)
{
    line('Welcome to the Brain Game!');
    line('%s', $ruleOfGame);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    //передаем многомерный массив (внутри 3 одномерных массива)
    //с парой: вопрос и ответ;
    //обходим весь массив и
    //присваиваем $question = вопрос (первый элемент) из массива;
    //$expectedAnswer = это правильный ответ полученный из функции игры
    //(второй элемент)
    foreach ($questionsAndAnswers as $pairQuestionAndAnswer) {
        $question = $pairQuestionAndAnswer['question'];
        $expectedAnswer = $pairQuestionAndAnswer['expectedAnswer'];

        line('Question, %s', $question);

        $userAnswer = prompt('Your answer?');
        line("%s", $userAnswer);

        if ($userAnswer === $expectedAnswer) {
            echo "Correct!" . "\n";
        } else {
            line(
                "%s is wrong answer ;(. Correct answer was %s." . "\n" .
                "Let's try again, %s!" . "\n",
                $userAnswer,
                $expectedAnswer,
                $name
            );
            return;
        }
    }

    line("Congratulations, %s!", $name);
}
