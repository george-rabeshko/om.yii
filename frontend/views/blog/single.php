<?php
use frontend\widgets\NoteWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<article id="<?php $article->id ?>" class="post">
    <h2 class="post-title"><?= $article->title ?></h2>
    <img src="/public/images/no-photo.png" alt="no-photo">
    <?= $article->content ?>
</article>

<div id="comments">
    <div class="add-comment">
        <h3>Додати коментар</h3>

        <?= NoteWidget::widget(['name' => 'success-msg']); ?>
        <?= NoteWidget::widget(['name' => 'warning-msg']); ?>

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'author')->textInput(['maxlength' => 50]) ?>
        <?= $form->field($model, 'content')->textarea(['maxlength' => 750]) ?>

        <?= Html::submitButton('Надіслати', ['class' => 'button', 'name' => 'button']) ?>

        <?php ActiveForm::end(); ?>
    </div>

    <div class="comments-list">
        <h3>Список коментарів</h3>
        <?php if (!$comments): ?>
        <p>Коментарі відсутні</p>
        <?php else: ?>



        <?= $this->render('_comments', ['comments' => $comments]); ?>

        <?php endif; ?>
    </div>
</div>