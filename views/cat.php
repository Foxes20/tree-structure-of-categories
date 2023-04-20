<?php
/**
 * @var $arr_new;
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/cat.css">
</head>
    <body>
            <br>
        <ul class="breadcrumb">
            <a href="/">Главная</a><br><br>
            <?php  foreach ($arr_new as $key) :?>
            <li><a href="/cat?category_id=<?=$key['id'];?>"><?=$key['name'];?></a>
            <?php endforeach;?>
        </ul>
    </body>
</html>
