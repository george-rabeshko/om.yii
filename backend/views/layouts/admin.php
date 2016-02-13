<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use backend\assets\AdminAsset;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= \Yii::$app->params['title'] ?></title>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

<?= $this->render('//common/header') ?>

<?= $this->render('//common/sidebar') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Page Header
            <small>Optional description</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <?= $content ?>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->

<?= $this->render('//common/footer') ?>

<?= $this->render('//common/control-sidebar') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
