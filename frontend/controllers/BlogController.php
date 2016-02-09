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

        $category = Categories::findOne(['uri' => \Yii::$app->request->get('uri')]);

        if (!$category) {
            \Yii::$app->session->setFlash('incorrect_uri', \Yii::$app->params['incorrect_category_uri']);
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
        $uri = \Yii::$app->request->get('uri');
        $article = Articles::findOne(['id' => \Yii::$app->request->get('id')]);

        if (!$article) {
            \Yii::$app->session->setFlash('incorrect_uri', \Yii::$app->params['incorrect_single_uri']);
            return $this->redirect(['/blog/category?uri=' . $uri], 302);
        }

        if ($article->category->uri != $uri) {
            \Yii::$app->session->setFlash('incorrect_uri', \Yii::$app->params['incorrect_single_uri']);
            return $this->redirect(['/blog/single?uri=' . $article->category->uri . '&id=' . $article->id], 302);
        }

        return $this->render('single', ['article' => $article]);
    }
}
