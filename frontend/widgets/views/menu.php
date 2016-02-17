<ul>
    <?php
        foreach($menu as $key => $item):
        $catUri = \Yii::$app->urlManager->createUrl($item['url']);
        $requestUri = $_SERVER['REQUEST_URI'];
    ?>
    <li>
        <a href="<?= $catUri ?>"
        <?php
            if(stristr($catUri, \Yii::$app->request->get('uri'))
                || $catUri == $requestUri
                || ($catUri == '/' && stristr($requestUri, 'page-') && !stristr($requestUri, 'category'))
            ) echo "class='active'"
        ?>><?= $item['label'] ?></a>
    </li>
    <?php endforeach; ?>
</ul>