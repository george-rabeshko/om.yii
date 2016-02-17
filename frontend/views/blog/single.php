<?php
use frontend\widgets\NoteWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<article id="<?php $article->id ?>" class="post">
    <h2 class="post-title"><?= $article->title ?></h2>
    <img src="/<?= $article->getImage()->getPath() ?>" height="280" width="580" alt="no-photo">
    <?= $article->content ?>
</article>

<div id="comments">
    <div class="add-comment">
        <h3>Додати коментар</h3>

        <?php
            $form = ActiveForm::begin();

            echo $form->field($model, 'author')->textInput(['maxlength' => 50]);
            echo $form->field($model, 'content')->textarea(['maxlength' => 750]);

            echo Html::submitButton('Надіслати', ['class' => 'button', 'name' => 'button']);

            ActiveForm::end();
        ?>

    </div>

    <div class="comments-list">
        <h3>Список коментарів</h3>

        <?php
            echo (!$data['comments'])
                ? Html::tag('p', 'Коментарі відсутні')
                : $this->render('_comments', [
                    'comments' => $data['comments'],
                    'pagination' => $data['pagination'],
                ]);
        ?>

    </div>
</div>