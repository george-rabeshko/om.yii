<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\OmAsset;

OmAsset::register($this);
$this->title = 'Наше життя - любомльська районна газета';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body id="main-container">
<?php $this->beginBody() ?>

<?= $this->render('//common/header') ?>

<!-- BEGIN page-container -->
<div class="page-container">
    <div id="page">
        <!-- BEGIN sidebar -->
        <div class="slider">
            <img src="/public/images/slide-photo.jpg" alt="Любомльська районна газета">
        </div>
        <!-- END sidebar -->

        <?= $this->render('//common/left-bar') ?>

        <!-- BEGIN content (article block) -->
        <div class="content">
            <?= $content ?>
        </div>
        <!-- END content -->

        <?= $this->render('//common/right-bar') ?>
    </div>
</div>
<!-- END page-container -->

<?= $this->render('//common/footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
