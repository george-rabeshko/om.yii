<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        Відбулося помилка, коли веб-сервер обробляв запит.
    </p>
    <p>
        Будь ласка <a href="mailto:george.rabeshko@gmail.com"><b>напишіть розробнику</b></a> якщо Ви думаєте, що проблема саме з сервером. Дякую!
    </p>

</div>
