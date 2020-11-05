<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $str = 'Казарезова';
        $str_search = '.*Казаре.*';
        ?>

        <p>Оригинальная строка «<?= $str; ?>»</p>
        <?php
        mb_regex_encoding('UTF-8');
        $m = mb_ereg_match($str_search, $str);
        ?>
        <p>Искомая строка «<?= $str_search; ?>»</p>
        <p>Кол-во: «<= var_dump($matches); ?>»</p>
        <p><?= var_dump($m) ?></p>

    </body>
</html>
