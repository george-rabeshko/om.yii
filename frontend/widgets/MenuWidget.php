<?php

namespace frontend\widgets;

use frontend\models\Categories;
use yii\base\Widget;

class MenuWidget extends Widget
{
    const STATUS_SIDEBAR_CATEGORY = 0;

    private $categories = [];

    public function init()
    {
        parent::init();

        $this->categories = Categories::findAll(['status' => self::STATUS_SIDEBAR_CATEGORY]);
    }

    public function run()
    {
        return $this->render('categories', ['categories' => $this->categories]);
    }
}