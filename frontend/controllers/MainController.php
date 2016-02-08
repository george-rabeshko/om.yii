<?php

namespace frontend\controllers;

use app\models\Blog;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        $blog = Blog::getInstance();

        if (!$data = $blog->getArticlesPage())
            return $this->render('@frontend/views/common/note', ['note' => \Yii::$app->params['no_data']]);

        return $this->render('index', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
        ]);
    }
}
