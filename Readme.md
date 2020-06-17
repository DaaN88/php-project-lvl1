<a href="https://codeclimate.com/github/DaaN88/php-project-lvl1"><img src="https://api.codeclimate.com/v1/badges/a99a88d28ad37a79dbf6/maintainability" /></a>
![php_сodesniffer](https://github.com/DaaN88/php-project-lvl1/workflows/php_%D1%81odesniffer/badge.svg)<br/>

Пакет представляет собой сборник из 5 консольных игр:<br/>
- четное ли число;<br/>
- вычислить арифметическую операцию;<br/>
- найти НОД;<br/>
- указать пропущенное число в арифметической прогрессии;<br/>
- ответить, является ли число простым.<br/>
Установка пакета:<br/>
- глобально: <code>composer global require anton-shvedov88@yandex.ru</code>;<br/>
- локально: <code>composer require anton-shvedov88@yandex.ru</code>;<br/>
Требования:<br/>
php-version: от 7.0;<br/>
composer-version: от 1.10.6;<br/>

Игра brain-even:<br/>
[![asciicast](https://asciinema.org/a/arQQlpNskxaHcd7Fsr2KJJSIE.svg)](https://asciinema.org/a/arQQlpNskxaHcd7Fsr2KJJSIE)<br/>
Запуск игры:<br/>
- при глобальной установке пакета: осуществляется командой <code>brain-even</code>;<br/>
- при локальной установке пакета: осуществляется командой <code>./bin/brain-even</code>;<br/>
Правила:
В вопросе задается число. Нужно ответить yes - если число четное, no - если число нечетное. В случае неправильного ответа игра прекращается и нужно снова игру запускать.<br/>

Игра brain-calc:<br/>
[![asciicast](https://asciinema.org/a/60lW2o5H76vMsgONiiD8OWPCu.svg)](https://asciinema.org/a/60lW2o5H76vMsgONiiD8OWPCu)<br/>
Запуск игры:<br/>
- при глобальной установке пакета: осуществляется командой <code>brain-calc</code>;<br/>
- при локальной установке пакета: осуществляется командой <code>./bin/brain-calc</code>;<br/>
Правила:
В вопросе задается арифметическая операция. Нужно ввести резеультат вычисления этой операции. В случае неправильного ответа игра прекращается и нужно снова игру запускать.<br/>

Игра brain-gcd:<br/>
[![asciicast](https://asciinema.org/a/0HB6gOom7eOL83bgz1LyAN1ai.svg)](https://asciinema.org/a/0HB6gOom7eOL83bgz1LyAN1ai)<br/>
Запуск игры:<br/>
- при глобальной установке пакета: осуществляется командой <code>brain-gcd</code>;<br/>
- при локальной установке пакета: осуществляется командой <code>./bin/brain-gcd</code>;<br/>
Правила:
В вопросе задаются два числа. Нужно ввести их наибольший общий делитель (НОД). В случае неправильного ответа игра прекращается и нужно снова игру запускать.<br/>

Игра brain-progression:<br/>
[![asciicast](https://asciinema.org/a/SS09ehfOQArrVqC7P4WHc58Ab.svg)](https://asciinema.org/a/SS09ehfOQArrVqC7P4WHc58Ab)<br/>
Запуск игры:<br/>
- при глобальной установке пакета: осуществляется командой <code>brain-progression</code>;<br/>
- при локальной установке пакета: осуществляется командой <code>./bin/brain-progression</code>;<br/>
Правила:
В вопросе задается арифметическая прогрессия с одним пропущенным членом прогрессии. Нужно ввести это пропущенное число. В случае неправильного ответа игра прекращается и нужно снова игру запускать.<br/>

Игра brain-prime:<br/>
[![asciicast](https://asciinema.org/a/zWPXh45x1WO1a8JVu13OtLVZ4.svg)](https://asciinema.org/a/zWPXh45x1WO1a8JVu13OtLVZ4)<br/>
Запуск игры:<br/>
- при глобальной установке пакета: осуществляется командой <code>brain-prime</code>;<br/>
- при локальной установке пакета: осуществляется командой <code>./bin/brain-prime</code>;<br/>
Правила:
В вопросе задается одно число. Нужно ответить yes - если число простое, no - если не простое. В случае неправильного ответа игра прекращается и нужно снова игру запускать.<br/>