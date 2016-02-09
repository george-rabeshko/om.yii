<?php

namespace frontend\widgets;

use yii\base\Widget;

class MenuWidget extends Widget
{
    public $items = [];

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('menu', ['menu' => $this->items]);
    }
}