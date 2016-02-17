<?php

namespace common\widgets;

use yii\bootstrap\Widget;
use yii\helpers\Html;

class Alert extends Widget
{
    /**
     * @var array the alert types configuration for the flash messages.
     * This array is setup as $key => $value, where:
     * - $key is the name of the session flash variable
     * - $value is the alert type
     */
    public $msgTypes = [
        'warning' => 'alert-warning',
        'error'   => 'alert-danger',
        'success' => 'alert-success',
        'info'    => 'alert-info',
    ];

    public function init()
    {
        parent::init();

        foreach (\Yii::$app->session->getAllFlashes() as $key => $type) {
            echo Html::tag('div', Html::tag('p', \Yii::$app->params[$key]), [
                'class' => 'alert ' . $this->msgTypes[$type],
            ]);
        }
    }
}
