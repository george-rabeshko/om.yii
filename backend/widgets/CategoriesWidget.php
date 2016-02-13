<?php

namespace backend\widgets;

use frontend\models\Categories;
use yii\base\Widget;

class CategoriesWidget extends Widget
{
    private $categories = [];

    public function init()
    {
        parent::init();

        $this->categories = Categories::find()->all();
    }

    public function run()
    {
        return $this->render('categories', ['categories' => $this->categories]);
    }
}