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

<?= $content ?>

<?= $this->render('//common/footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
