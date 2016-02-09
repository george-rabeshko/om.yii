<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property string $author
 * @property string $content
 * @property string $created
 * @property string $approved
 * @property integer $article_id
 * @property integer $status
 *
 * @property Articles $article
 */
class Comments extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author', 'content', 'created', 'article_id', 'status'], 'required'],
            [['content'], 'string'],
            [['created', 'approved'], 'safe'],
            [['article_id', 'status'], 'integer'],
            [['author'], 'string', 'min' => 2, 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Ім’я',
            'content' => 'Повідомлення',
            'created' => 'Створено',
            'approved' => 'Опубліковано',
            'article_id' => 'ID запису',
            'status' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Articles::className(), ['id' => 'article_id']);
    }
}
