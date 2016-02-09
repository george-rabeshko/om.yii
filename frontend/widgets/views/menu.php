<ul>
    <?php
        foreach($menu as $key => $item):
        $uri = \Yii::$app->urlManager->createUrl($item['url']);
    ?>
    <li><a href="<?= $uri ?>" <?php if(stristr($uri, \Yii::$app->request->get('uri')) || $uri == $_SERVER['REQUEST_URI']) echo "class='active'" ?>><?= $item['label'] ?></a></li>
    <?php endforeach; ?>
</ul>