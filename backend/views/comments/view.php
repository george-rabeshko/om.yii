<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Comments */

$this->title = 'Перегляд коментаря';
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Всі коментарі', ['/comments'], ['class' => 'btn btn-success']) ?> |
        <?= Html::a('Редагувати', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви справді хочете видалити цей коментар?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            [
                'attribute' => 'article.title',
                'label' => 'Запис',
            ],
            'author',
            'content:html',
            'created',
            'updated',
            [
                'attribute' => 'status',
                'value' => ($model->status) ? 'Опубліковано' : 'В черзі',
            ],
        ],
        'options' => [
            'class' => 'table table-striped table-bordered detail-view',
        ],
    ]) ?>

</div>
