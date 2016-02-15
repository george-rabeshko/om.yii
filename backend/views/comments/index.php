<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CommentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Коментарі';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comments-index">

    <?= Alert::widget(); ?>

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати коментар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'article_id',
                'contentOptions' => [
                    'style' => 'font-weight: bold; width: 200px;',
                ],
                'value' => 'article.title',
            ],
            [
                'attribute' => 'author',
                'contentOptions' => [
                    'style' => 'width: 180px;',
                ],
            ],
            [
                'attribute' => 'content',
                'value' => function($model) {
                    return strip_tags($model->content);
                },
                'contentOptions' => [
                    'style' => 'width: 250px;',
                ],
            ],
            'created',
            'updated',
            [
                'attribute' => 'status',
                'value' => function($model) {
                    return ($model->status) ? 'Опубліковано' : 'В черзі';
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',

                'template'=>'{view}{approve}{update}{delete}',

                'buttons' => [
                    'approve' => function ($url) {
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, [
                            'title' => Yii::t('yii', 'Підтвердити'),
                        ]);
                    },
                ],

                'headerOptions' => ['width' => '97'],
            ],
        ],
    ]); ?>

</div>
