<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * User model
 */
class Tool extends Model
{
    public static function getContent($content, $length = 550)
    {
        $description = strip_tags($content);

        return (iconv_strlen($description) > $length)
            ? trim(substr($description, 0, strpos($description, ' ', $length)), "!,.-*^#@ ") . '...'
            : substr($description, 0);
    }

    public static function setFlash($name, $msg)
    {
        return \Yii::$app->session->setFlash($name, \Yii::$app->params[$msg]);
    }

    public static function setActiveItem($url, $activeItemName = 'active')
    {
        return (stristr($_SERVER['REQUEST_URI'], $url)) ? $activeItemName : 'bla';
    }
}
