<?php

namespace frontend\controllers;

use common\models\Pages;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PageController extends Controller
{
    public $layout = 'om-inner';

    public function actionIndex()
    {
        $page = Pages::findOne([
            'uri' => \Yii::$app->request->get('uri'),
            'status' => 10,
        ]);

        if (!$page) throw new NotFoundHttpException('Сторінки, яку Ви шукаєте не існує.');

        return $this->render('index', ['page' => $page]);
    }

}
