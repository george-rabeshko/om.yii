<?php

namespace frontend\widgets;

use common\models\Categories;
use yii\base\Widget;

class CategoriesWidget extends Widget
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