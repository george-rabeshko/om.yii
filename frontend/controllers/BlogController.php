<?php

namespace frontend\controllers;

use yii\web\Controller;

class BlogController extends Controller
{
    public $layout = 'om-inner';

    public function actionIndex()
    {
        return $this->render('index');
    }
}
