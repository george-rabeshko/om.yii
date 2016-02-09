<?php

namespace frontend\widgets;

use yii\base\Widget;

class NoteWidget extends Widget
{
    public $name;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('note', ['name' => $this->name]);
    }
}