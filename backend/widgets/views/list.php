<?php use yii\helpers\Html; ?>

<div class="form-group">
    <label for="articles-category_id"><?= $label ?></label>
    <?= Html::activeDropDownList($model, $attribute, $items, ['class' => 'form-control']) ?>
</div>
