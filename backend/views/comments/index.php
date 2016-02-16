<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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
                'format' => 'raw',
                'value' => function($model) {
                    if ($model->article->status) {
                        $host = Yii::$app->request->hostInfo;
                        $url = $host . '/blog/single?uri=' . $model->article->category->uri . '&id=' . $model->article->id;
                        return Html::a($model->article->title, Url::to($url), ['target'=>'_blank']);
                    }

                    return $model->article->title;
                },
                'contentOptions' => [
                    'style' => 'font-weight: bold; width: 200px;',
                ],
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
                    'approve' => function ($url, $model) {
                        if (!$model->status) {
                            return Html::a(Html::tag('span', '', ['class' => 'glyphicon glyphicon-ok']), $url, [
                                'title' => Yii::t('yii', 'Підтвердити'),
                            ]);
                        }

                        return Html::tag('span', '', [
                            'class' => 'glyphicon glyphicon-ok',
                            'style' => 'opacity: .5',
                        ]);
                    },
                ],

                'headerOptions' => ['width' => '97'],
            ],
        ],
    ]); ?>

</div>
