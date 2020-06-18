<?php

namespace BrainGames\Engine\Engine;

use function cli\line;
use function cli\prompt;

function startEngineGame($messageGame, $expressionsAndAnswers)
{
    line('Welcome to the Brain Game!');
    line('%s', $messageGame);

    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    //передаем многомерный массив (внутри 3 одномерных массива)
    //с парой: вопрос и ответ;
    //извлекаем последний массив из основного;
    //присваиваем $question = вопрос (первый элемент) из массива;
    //$expectedAnswer = это правильный ответ полученный из функции игры
    //(второй элемент)
    while ($expressionsAndAnswers) {
        $pairExpressionAndAnswer = array_pop($expressionsAndAnswers);
        $question = $pairExpressionAndAnswer['question'];
        $expectedAnswer = $pairExpressionAndAnswer['expectedAnswer'];

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

//проверяем ответ игрока: если ответ цифра - явно преобразуем в цифровое значение
//если ответ yes - возвращаем true
function checkedAnswer($verifiableAnswer)
{
    if ($verifiableAnswer === 'yes') {
        return 'yes';
    } elseif ($verifiableAnswer === 'no') {
        return 'no';
    } elseif (is_numeric($verifiableAnswer)) {
        return (int)$verifiableAnswer;
    }

    return false;
}
