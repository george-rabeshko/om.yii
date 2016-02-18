<?php

use common\models\Tool;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сторінки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Додати сторінку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'name',
                'format' => 'raw',
                'value' => function($model) {
                    if ($model->status) {
                        $host = Yii::$app->request->hostInfo;
                        $url = $host . '/' . $model->uri;
                        return Html::a($model->name, Url::to($url), ['target'=>'_blank']);
                    }

                    return $model->name;
                },
                'contentOptions' => [
                    'style' => 'font-weight: bold; width: 250px;',
                ],
            ],
            [
                'attribute' => 'content',
                'value' => function($model) {
                    return Tool::getContent($model->content);
                },
                'contentOptions' => [
                    'style' => 'width: 510px',
                ],
            ],
            'created',
            'updated',
            // 'uri',
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
