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

    public static function hasAddressBarIt($url)
    {
        return (stristr($_SERVER['REQUEST_URI'], $url)) ? true : false;
    }

    public static function getModelForAutocomplete()
    {
        return Articles::find()
            ->select(['id as value', 'title as value'])
            ->asArray()
            ->all();
    }
}
