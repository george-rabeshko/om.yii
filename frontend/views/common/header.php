<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;

?>

<!-- BEGIN header -->
<header id="header">
    <div class="logo">
        <h1>Наше життя</h1>
        <h4>Любомльська районна газета</h4>
    </div>

    <?php
    NavBar::begin(['options' => ['class' => 'menu']]);

    (Url::to('') == Yii::$app->homeUrl)
        ? $activeItem = true
        : $activeItem = false;

    echo Nav::widget([
        'items' => [
            ['label' => 'Головна', 'url' => Yii::$app->homeUrl, 'active' => $activeItem],
            ['label' => 'Новини', 'url' => \Yii::$app->urlManager->createUrl(['blog/category', 'uri' => 'novyny'])],
            ['label' => 'Відеогалерея', 'url' => \Yii::$app->urlManager->createUrl(['blog/category', 'uri' => 'videohalereia'])],
            ['label' => 'Світлини', 'url' => \Yii::$app->urlManager->createUrl(['blog/category', 'uri' => 'svitlyny'])],
            ['label' => 'Історія газети', 'url' => \Yii::$app->urlManager->createUrl(['page/index', 'uri' => 'istoriia-hazety'])],
            ['label' => 'Передплата та ціни', 'url' => \Yii::$app->urlManager->createUrl(['page/index', 'uri' => 'peredplata-ta-tsiny'])],
            ['label' => 'Контакти', 'url' => \Yii::$app->urlManager->createUrl(['page/index', 'uri' => 'kontakty'])],
        ],
    ]);
    NavBar::end();
    ?>
</header>
<!-- END header -->