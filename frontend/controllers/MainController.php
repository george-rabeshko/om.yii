<?php

namespace frontend\controllers;

use frontend\models\Blog;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        $blog = Blog::getInstance();

        if (!$data = $blog->getArticlesPage())
            return $this->render('@note', ['msg' => 'noBlogData']);

        return $this->render('index', ['data' => $data]);
    }
}
