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
            return $this->render('@frontend/views/common/note', ['note' => \Yii::$app->params['noBlogData']]);

        return $this->render('index', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
        ]);
    }
}
