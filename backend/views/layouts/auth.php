<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use yii\helpers\Html;
use backend\assets\AuthAsset;

AuthAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= \Yii::$app->params['titleAdmin'] ?></title>
    <?php $this->head() ?>
</head>

<body class="login skin-blue">
<?php $this->beginBody() ?>

<!-- Main content -->
<section class="container">
    <?= Alert::widget() ?>
    <?= $content ?>
</section><!-- /.content -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
