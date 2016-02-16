<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */

$this->title = 'Перегляд запису';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Всі записи категорії', ['/articles', 'uri' => $model->category->uri], ['class' => 'btn btn-success']) ?> |
        <?= Html::a('Редагувати', ['update', 'uri' => $model->category->uri, 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Видалити', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Ви справді хочете видалити цей запис?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'title',
            'content:html',
            'created',
            'updated',
            'category.name',
            [
                'attribute' => 'status',
                'value' => ($model->status) ? 'Опубліковано' : 'Прихована стаття',
            ],
            [
                'attribute' => 'comments_status',
                'value' => ($model->comments_status) ? 'Дозволені' : 'Заборонені',
            ],
        ],
        'options' => [
            'class' => 'table table-striped table-bordered detail-view',
        ],
    ]) ?>

</div>
