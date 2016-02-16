<?php

namespace frontend\controllers;

use frontend\models\Blog;
use frontend\models\CommentForm;
use common\models\Articles;
use common\models\Comments;
use common\models\Categories;
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
            \Yii::$app->session->setFlash('warning-msg', \Yii::$app->params['incorrectCategoryUri']);
            return $this->redirect(['/blog'], 302);
        }

        if (!$data = $blog->getArticlesPage($category))
            return $this->render('@frontend/views/common/note', ['note' => \Yii::$app->params['noArticles']]);

        return $this->render('index', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination'],
        ]);
    }

    public function actionSingle()
    {
        $model = new CommentForm();

        $uri = \Yii::$app->request->get('uri');
        $article = Articles::findOne(['id' => \Yii::$app->request->get('id')]);

        if (!$article) {
            \Yii::$app->session->setFlash('warning-msg', \Yii::$app->params['incorrectSingleUri']);
            return $this->redirect(['/blog/category?uri=' . $uri], 302);
        }

        if ($article->category->uri != $uri) {
            \Yii::$app->session->setFlash('warning-msg', \Yii::$app->params['incorrectSingleUri']);
            return $this->redirect(['/blog/single?uri=' . $article->category->uri . '&id=' . $article->id], 302);
        }

        if ($model->load(\Yii::$app->request->post()) && $model->validate()) {
            $model->article_id = $article->id;

            $answer = ($model->addComment())
                ? ['name' => 'success-msg', 'description' => 'commentSuccessSending']
                : ['name' => 'error-msg', 'description' => 'commentWarningSending'];

            \Yii::$app->session->setFlash($answer['name'], \Yii::$app->params[$answer['description']]);

            return $this->refresh();
        }

        $comments = Comments::find()->where(['status' => 10, 'article_id' => $article->id])->orderBy(['id' => SORT_DESC])->all();

        return $this->render('single', [
            'article' => $article,
            'model' => $model,
            'comments' => $comments,
        ]);
    }
}
