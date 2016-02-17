<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
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
    <script src="/uploads/js/tinymce/tinymce.min.js"></script>
    <script src="/uploads/js/tinymce/tinymce-init.js"></script>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

    <?= $this->render('//common/header') ?>

    <?= $this->render('//common/sidebar') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <?= Alert::widget() ?>

            <?= $content ?>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->

<?= $this->render('//common/footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
