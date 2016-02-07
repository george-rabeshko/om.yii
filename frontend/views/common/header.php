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
            ['label' => 'Новини', 'url' => ['/blog/novyny']],
            ['label' => 'Відеогалерея', 'url' => ['/blog/videohalereia']],
            ['label' => 'Світлини', 'url' => ['/blog/svitlyny']],
            ['label' => 'Історія газети', 'url' => ['/page/istoriia-hazety']],
            ['label' => 'Передплата та ціни', 'url' => ['/page/peredplata-ta-tsiny']],
            ['label' => 'Контакти', 'url' => ['/page/kontakty']],
        ],
    ]);
    NavBar::end();
    ?>
</header>
<!-- END header -->