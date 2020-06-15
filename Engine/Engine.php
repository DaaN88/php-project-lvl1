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

    $attempt = 0;

    //передаем многомерный массив (внутри 3 одномерных массива)
    //с парой: выражение и ответ;
    //извлекаем последний массив из основного;
    //присваиваем $stringExpression = выражение из массива (ключ извлеченного
    //массива). Это будет фраза выводимая в приветствии игрока;
    //$verifiableNumber = это правильный ответ полученный из функции игры
    //(значение в извлеченном массиве)
    while ($attempt < 3) {
        $pairExpressionAndAnswer = array_pop($expressionsAndAnswers);
        $stringExpression = $pairExpressionAndAnswer['stringWithQuestion'];
        $verifiableNumber = $pairExpressionAndAnswer['stringWithAnswer'];

        line('Question, %s', $stringExpression);

        $answer = prompt('Your answer?');
        line("%s", $answer);

        if (checkedAnswer($answer) === $verifiableNumber) {
            echo "Correct!" . "\n";
            $attempt++;
        } else {
            return line(
                "%s is wrong answer ;(. Correct answer was %s." . "\n" .
                "Let's try again, %s!" . "\n",
                $answer,
                $verifiableNumber,
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
        return true;
    } elseif (is_numeric($verifiableAnswer)) {
        return (int)$verifiableAnswer;
    }

    return false;
}
