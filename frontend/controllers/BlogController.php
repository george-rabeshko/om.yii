<?php

namespace frontend\controllers;

use app\models\Articles;
use yii\data\Pagination;
use yii\web\Controller;

class BlogController extends Controller
{
    public $layout = 'om-inner';

    public function actionIndex()
    {
        $query = Articles::find()->where(['category_id' => 2]);

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $articles = $query->orderBy(['id' => SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'articles' => $articles,
            'pagination' => $pagination,
        ]);
        // todo: додати масив з назвами категорій і відобразити ці назви у посиланнях на статтю
    }
}
