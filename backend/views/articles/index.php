<?php

use yii\helpers\Html;
use yii\grid\GridView;
use \yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ArticlesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Записи категорії: ' . $currentCategoryName;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати запис', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute' => 'title',
                'format' => 'raw',
                'value' => function($model) {
                    if ($model->status) {
                        $host = Yii::$app->request->hostInfo;
                        $url = $host . '/blog/single?uri=' . $model->category->uri . '&id=' . $model->id;
                        return Html::a($model->title, Url::to($url), ['target'=>'_blank']);
                    }

                    return $model->title;
                },
                'contentOptions' => [
                    'style' => 'font-weight: bold; width: 250px;',
                ],
            ],
            [
                'attribute' => 'content',
                'value' => function($model) {
                    return strip_tags($model->content);
                },
                'contentOptions' => [
                    'style' => 'width: 510px',
                ],
            ],
            'created',
            'updated',
            // 'comments_status',
            [
                'attribute' => 'status',
                'value' => function($model) {
                    return ($model->status) ? 'Опубліковано' : 'В черзі';
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'headerOptions' => ['width' => '30'],
            ],
        ],
    ]); ?>

</div>
