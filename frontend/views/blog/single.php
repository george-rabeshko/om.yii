<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<article id="<?php $article->id ?>" class="post">
    <h2 class="post-title"><?= $article->title ?></h2>
    <img src="/public/images/no-photo.png" alt="no-photo">
    <?= $article->content ?>
</article>

<div id="comments">
    <h3>Додати коментар</h3>

    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

    <?= $form->field($model, 'author') ?>
    <?= $form->field($model, 'content')->textarea() ?>

    <div class="form-group">
        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <h3>Список коментарів</h3>
    <?php $this->render('_comments', [
        'comments' => $model,
    ]); ?>
</div>