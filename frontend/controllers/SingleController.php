<?php

namespace frontend\controllers;

use app\models\Articles;
use yii\web\Controller;

class SingleController extends Controller
{
    public $layout = 'om-inner';

    public function actionIndex()
    {
        $article = Articles::findOne(['id' => \Yii::$app->request->get('article_id')]);
        return $this->render('index', ['article' => $article]);
    }
}
