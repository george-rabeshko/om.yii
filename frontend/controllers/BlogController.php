<?php

namespace frontend\controllers;

use app\models\Articles;
use app\models\Blog;
use frontend\models\Categories;
use yii\web\Controller;

class BlogController extends Controller
{
    public $layout = 'om-inner';

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

    public function actionCategory()
    {
        $blog = Blog::getInstance();

        $uri = \Yii::$app->request->get('uri');
        $category = Categories::findOne(['uri' => $uri]);

        if (!$category || !$uri || empty($uri)) {
            \Yii::$app->session->setFlash('incorrect_category_uri', \Yii::$app->params['incorrect_category_uri']);
            return $this->redirect(['/blog'], 302);
        }

        if (!$data = $blog->getArticlesPage($category))
            return $this->render('@frontend/views/common/note', ['note' => \Yii::$app->params['no_articles']]);

        return $this->render('index', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
        ]);
    }

    public function actionSingle()
    {
        $article = Articles::findOne(['id' => \Yii::$app->request->get('id')]);

        return $this->render('single', ['article' => $article]);
    }
}
