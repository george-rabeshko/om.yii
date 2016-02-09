<?php if (\Yii::$app->session->hasFlash($name)): ?>
    <div class="<?= $name ?> note">
        <p><?= \Yii::$app->session->getFlash($name) ?></p>
    </div>
<?php endif; ?>