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
        $str = 'Гааапошшшкина';
        $str_search = '/(ш)/i';
        // preg_match('/(Гапош)/', $str, $matches, PREG_OFFSET_CAPTURE);
        // print_r($matches);
        // echo '<hr />';
        // echo $str;
        // foreach($matches as $s){
        // echo '<hr />';        
        // foreach($s as $v){
        // echo $v.'; ';
        // }
        // }
        ?>
        <p>Оригинальная строка «<?= $str; ?>»</p>
        <?php $pm = preg_match($str_search, $str, $matches); ?>
        <p>Искомая строка «<?= $str_search; ?>»</p>
        <p>Кол-во: «<?= count($matches); ?>»</p>
        <hr />
        <?php foreach ($matches as $s): ?>
            <?= $s ?>
            <hr />
        <?php endforeach; ?>
    </body>
</html>
