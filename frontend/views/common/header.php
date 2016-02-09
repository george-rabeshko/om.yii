<?php

use frontend\widgets\MenuWidget;

?>

<!-- BEGIN header -->
<header id="header">
    <div class="logo">
        <h1>Наше життя</h1>
        <h4>Любомльська районна газета</h4>
    </div>

    <div class="menu" id="menu">
        <nav>
            <?= MenuWidget::widget(['items' => [
                ['label' => 'Головна', 'url' => Yii::$app->homeUrl],
                ['label' => 'Новини', 'url' => ['blog/category', 'uri' => 'novyny']],
                ['label' => 'Відеогалерея', 'url' => ['blog/category', 'uri' => 'videohalereia']],
                ['label' => 'Світлини', 'url' => ['blog/category', 'uri' => 'svitlyny']],
                ['label' => 'Історія газети', 'url' => ['page/index', 'uri' => 'istoriia-hazety']],
                ['label' => 'Передплата та ціни', 'url' => ['page/index', 'uri' => 'peredplata-ta-tsiny']],
                ['label' => 'Контакти', 'url' => ['page/index', 'uri' => 'kontakty']],
            ]]) ?>
        </nav>
    </div>
</header>
<!-- END header -->