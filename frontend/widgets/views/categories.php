<ul>
    <?php foreach($categories as $category): ?>
    <li><a href="<?= \Yii::$app->urlManager->createUrl(['blog/category', 'uri' => $category->uri]) ?>" <?php if(\Yii::$app->request->get('uri') == $category->uri) echo "class='active-item'" ?>><?= $category->name ?></a></li>
    <?php endforeach; ?>
</ul>
