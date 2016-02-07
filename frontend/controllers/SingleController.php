<?php

namespace frontend\controllers;

class SingleController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
