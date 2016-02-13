<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 10]) ?>

    <?php if (!$model->isNewRecord) echo $form->field($model, 'created')->textInput() ?>

    <?//= $form->field($model, 'updated')->textInput(['value' => date('Y-m-d')]) ?>

    <div class="form-group">
        <label for="articles-category_id">Категорія</label>
        <?= Html::activeDropDownList($model, 'category_id', $items['categories'], ['class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <label for="articles-category_id">Статус</label>
        <?= Html::activeDropDownList($model, 'status', $items['article_status'], ['class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <label for="articles-category_id">Коментарі</label>
        <?= Html::activeDropDownList($model, 'comments_status', $items['comments_status'], ['class' => 'form-control']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
