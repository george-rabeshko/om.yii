<?php
namespace frontend\models;

use app\models\Comments;
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
            $comments->created = time();
            $comments->article_id = 1;
            $comments->status = 10;
            $comments->save();
        } catch(ErrorException $e) {
            return false;
        }

        return true;
    }
}
