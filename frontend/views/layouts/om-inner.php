<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use frontend\assets\OmAsset;

$asset = OmAsset::register($this);
$basePath = $asset->basePath;
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
<body id="page-wrap">
<?php $this->beginBody() ?>

<?= $this->render('//common/header') ?>

<!-- BEGIN page-container -->
<div class="page-container">
    <div id="page">
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
