<?php

namespace app\models;

use Yii;

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
class Comments extends \yii\db\ActiveRecord
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
            [['author', 'content', 'created', 'approved', 'article_id', 'status'], 'required'],
            [['content'], 'string'],
            [['created', 'approved'], 'safe'],
            [['article_id', 'status'], 'integer'],
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
            'author' => 'Author',
            'content' => 'Content',
            'created' => 'Created',
            'approved' => 'Approved',
            'article_id' => 'Article ID',
            'status' => 'Status',
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
