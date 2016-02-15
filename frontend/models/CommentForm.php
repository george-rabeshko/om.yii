<?php
namespace frontend\models;

use common\models\Comments;
use common\models\User;
use yii\base\ErrorException;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class CommentForm extends Model
{
    public $author;
    public $content;
    public $article_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author', 'content'], 'required'],
            [['author'], 'string', 'min' => 2, 'max' => 50],
            [['content'], 'string']
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function addComment()
    {
        try {
            $comments = new Comments();
            $comments->author = $this->author;
            $comments->content = $this->content;
            $comments->created = date('Y-m-d');
            $comments->article_id = $this->article_id;
            $comments->status = 10;
            $comments->save();
        } catch(ErrorException $e) {
            return false;
        }

        return true;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'author' => 'Ім’я',
            'content' => 'Повідомлення',
        ];
    }
}
