<?php

namespace app\models;

use Yii;

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
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
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
