<?php

namespace frontend\controllers;

use frontend\models\Blog;
use frontend\models\CommentForm;
use common\models\Articles;
use common\models\Categories;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

class BlogController extends Controller
{
    public $layout = 'om-inner';

    public function actionIndex()
    {
        $blog = Blog::getInstance();

        if (!$data = $blog->getArticlesPage())
            return $this->render('@note', ['msg' => 'noBlogData']);

        return $this->render('index', ['data' => $data]);
    }

    public function actionCategory()
    {
        $blog = Blog::getInstance();

        $category = Categories::findOne(['uri' => \Yii::$app->request->get('uri')]);

        if (!$category) {
            \Yii::$app->session->setFlash('incorrectCategoryUri', 'warning');
            return $this->redirect(['/category'], 302);
        }

        if (!$data = $blog->getArticlesPage($category))
            return $this->render('@note', ['msg' => 'noArticles']);

        return $this->render('index', ['data' => $data]);
    }

    public function actionSingle()
    {
        $model = new CommentForm();
        $blog = Blog::getInstance();

        $uri = \Yii::$app->request->get('uri');
        $article = Articles::findOne(['id' => \Yii::$app->request->get('id')]);

        if (!$article) {
            \Yii::$app->session->setFlash('articleNotFound', 'warning');
            // Look at UrlManager configurations
            // Real address is['/blog/category?uri=' . $uri]
            return $this->redirect(['/category/' . $uri], 302);
        }

        $articleCatUri = $article->category->uri;
        $articleId = $article->id;

        if ($articleCatUri != $uri)
            // Look at UrlManager configurations
            // Real address is ['/blog/single?uri=' . $articleCatUri . '&id=' . $articleId]
            return $this->redirect(['/category/' . $articleCatUri . '/' . $articleId], 302);

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->article_id = $articleId;

            $answer = ($model->addComment())
                ? ['name' => 'commentSuccessSending', 'type' => 'success']
                : ['name' => 'commentWarningSending', 'type' => 'error'];

            \Yii::$app->session->setFlash($answer['name'], $answer['type']);
            return $this->refresh();
        }

        $data = $blog->getComments($articleId);

        return $this->render('single', [
            'article' => $article,
            'model' => $model,
            'data' => $data,
        ]);
    }

    public function actionSearch($q = '')
    {
        /** @var \himiklab\yii2\search\Search $search */
        $search = \Yii::$app->search;
        $searchData = $search->find($q); // Search by full index.
        //$searchData = $search->find($q, ['model' => 'page']); // Search by index provided only by model `page`.

        $dataProvider = new ArrayDataProvider([
            'allModels' => $searchData['results'],
            'pagination' => ['pageSize' => 10],
        ]);

        return $this->render('found', [
            'hits' => $dataProvider->getModels(),
            'pagination' => $dataProvider->getPagination(),
            'query' => $searchData['query']
        ]);
    }
}
