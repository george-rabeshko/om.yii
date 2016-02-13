<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $name
 * @property string $content
 * @property string $created
 * @property string $updated
 * @property string $uri
 * @property integer $status
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'content', 'created', 'updated', 'uri'], 'required'],
            [['content'], 'string'],
            [['created', 'updated'], 'safe'],
            [['status'], 'integer'],
            [['name', 'uri'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'content' => 'Content',
            'created' => 'Created',
            'updated' => 'Updated',
            'uri' => 'Uri',
            'status' => 'Status',
        ];
    }
}