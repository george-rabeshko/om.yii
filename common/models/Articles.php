<?php

namespace common\models;

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
 *
 * @property Categories $category
 * @property Comments[] $comments
 */
class Articles extends ActiveRecord
{
    public $image;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'created', 'updated', 'category_id'], 'required'],
            [['content'], 'string'],
            [['created', 'updated'], 'safe'],
            [['category_id', 'comments_status', 'status'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['image'], 'safe'],
            [['image'], 'file', 'extensions' => 'jpg, gif, png'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'content' => 'Контент',
            'created' => 'Створено',
            'updated' => 'Змінено',
            'category_id' => 'ID категорії',
            'comments_status' => 'Коментарі',
            'status' => 'Статус',
            'image' => 'Головне зображення',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comments::className(), ['article_id' => 'id']);
    }
}
