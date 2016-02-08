<?php

namespace app\models;

use frontend\models\Categories;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $created
 * @property string $updated
 * @property integer $category_id
 * @property integer $comments_status
 * @property integer $status
 */
class Articles extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'created', 'updated', 'category_id', 'comments_status', 'status'], 'required'],
            [['content'], 'string'],
            [['created', 'updated'], 'safe'],
            [['category_id', 'comments_status', 'status'], 'integer'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'created' => 'Created',
            'updated' => 'Updated',
            'category_id' => 'Category ID',
            'comments_status' => 'Comments Status',
            'status' => 'Status',
        ];
    }
}
