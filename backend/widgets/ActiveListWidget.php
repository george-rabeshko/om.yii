<?php

namespace backend\widgets;

use yii\base\Widget;

class ActiveListWidget extends Widget
{
    public $model;
    public $attribute;
    public $items;
    public $label;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('list', [
            'model' => $this->model,
            'attribute' => $this->attribute,
            'items' => $this->items,
            'label' => $this->label,
        ]);
    }
}