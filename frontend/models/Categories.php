<?php

namespace frontend\models;

use app\models\Articles;
use Yii;
use yii\db\ActiveRecord;

/**
 * Connect to 'categories' table from db
 */
class Categories extends ActiveRecord
{
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Articles::className(), ['category_id' => 'id']);
    }
}
