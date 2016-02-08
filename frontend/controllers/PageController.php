<?php

namespace frontend\controllers;

use app\models\Pages;
use yii\web\Controller;

class PageController extends Controller
{
    public $layout = 'om-inner';

    public function actionIndex()
    {
        $page = Pages::findOne([
            'uri' => \Yii::$app->request->get('uri'),
            'status' => 1,
        ]);

        return $this->render('index', ['page' => $page]);
    }

}
