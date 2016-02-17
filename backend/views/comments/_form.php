<?php

use backend\widgets\ActiveListWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use anmaslov\autocomplete\AutoComplete;

/* @var $this yii\web\View */
/* @var $model common\models\Comments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'updated')->textInput() ?>

    <?php
        echo $form->field($model, 'article_id')->widget(AutoComplete::className(), [
            'name' => 'link',
            'data' => $data,
            'value' => '',
            'clientOptions' => [
                'minChars' => 2,
            ],
            'options' => [
                'placeholder' => 'Шукати по заголовку...',
            ]
        ]);
    ?>

    <?= ActiveListWidget::widget([
        'model' => $model,
        'attribute' => 'status',
        'items' => $items,
        'label' => 'Статус',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Додати' : 'Оновити', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
