<ul>
    <?php foreach($categories as $category): ?>
    <li><a href="<?= \Yii::$app->urlManager->createUrl(['blog/category', 'uri' => $category->uri]) ?>"><?= $category->name ?></a></li>
    <?php endforeach; ?>
</ul>