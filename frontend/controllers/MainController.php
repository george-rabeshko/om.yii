<?php

namespace frontend\controllers;

use frontend\models\Categories;
use yii\web\Controller;

class MainController extends Controller
{
    const STATUS_SIDEBAR_CATEGORY = 0;

    public function actionIndex()
    {
        $categories = Categories::findAll(['status' => self::STATUS_SIDEBAR_CATEGORY]);
        return $this->render('index', ['categories' => $categories]);
    }
}
