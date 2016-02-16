<?php

namespace frontend\models;

use common\models\Articles;
use common\models\Comments;
use yii\base\Model;
use yii\data\Pagination;
use Yii;
use yii\web\NotFoundHttpException;

/**
 * This is the model class ...
 */
class Blog extends Model
{
    private static $instance = null;

    static public function getInstance() {
        if(is_null(self::$instance)) self::$instance = new self();

        return self::$instance;
    }

    public function getArticlesPage($category = false)
    {
        $condition = [
            'category_id' => $category->id,
            'status' => 10,
        ];

        if (!$category) $condition = array_splice($condition, 1, 1);

        $query = Articles::find()->where($condition)->with('category');

        if (!$query->count()) return false;

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $articles = $query->orderBy(['id' => SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return [
            'articles' => $articles,
            'pagination' => $pagination,
        ];
    }

    public function getComments($id)
    {
        $query = Comments::find()->where([
            'status' => 10,
            'article_id' => $id,
        ]);

        if (!$query->count()) return false;

        $pagination = new Pagination([
            'defaultPageSize' => 15,
            'totalCount' => $query->count(),
        ]);

        $comments = $query->orderBy(['id' => SORT_DESC])
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return [
            'comments' => $comments,
            'pagination' => $pagination,
        ];
    }
}