<?php

namespace frontend\controllers;

use app\models\Articles;
use yii\data\Pagination;
use yii\web\Controller;

class MainController extends Controller
{
    public function actionIndex()
    {
        $query = Articles::find();

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
    }
}
