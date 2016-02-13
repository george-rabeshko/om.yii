<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\widgets\ActiveListWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 10]) ?>

    <?php if (!$model->isNewRecord) echo $form->field($model, 'created')->textInput() ?>

    <?= ActiveListWidget::widget([
        'model' => $model,
        'attribute' => 'category_id',
        'items' => $items['categories'],
        'label' => 'Категорія',
    ]) ?>

    <?= ActiveListWidget::widget([
        'model' => $model,
        'attribute' => 'status',
        'items' => $items['article_status'],
        'label' => 'Статус',
    ]) ?>

    <?= ActiveListWidget::widget([
        'model' => $model,
        'attribute' => 'comments_status',
        'items' => $items['comments_status'],
        'label' => 'Коментарі',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Оновити', [
            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
