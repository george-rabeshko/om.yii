<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "comments".
 *
 * @property integer $id
 * @property string $author
 * @property string $content
 * @property string $created
 * @property string $updated
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
            [['author', 'created', 'article_id', 'status'], 'required'],
            [['content'], 'string'],
            [['created', 'updated'], 'safe'],
            [['status'], 'integer'],
            [['author'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Автор',
            'content' => 'Контент',
            'created' => 'Створено',
            'updated' => 'Оновлено',
            'article_id' => 'Запис',
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
