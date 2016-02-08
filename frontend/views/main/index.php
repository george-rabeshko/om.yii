<?php use yii\widgets\LinkPager; ?>

<?php if ($error): ?>
    <h2>О-о-ой...</h2>
    <p><?= \Yii::$app->params['no_data'] ?></p>
<?php else: foreach($articles as $article): ?>
    <article id="<?= $article->id ?>" class="post">
        <h2 class="post-title">
            <a href="<?= \Yii::$app->urlManager->createUrl([
                'blog/single',
                'uri' => $article->category->uri,
                'id' => $article->id,
            ]) ?>"><?= $article->title ?></a>
        </h2>
        <img src="/public/images/no-photo.png" alt="no-photo">
        <?= $article->content ?>
        <p>
            <a href="<?= \Yii::$app->urlManager->createUrl([
                'blog/single',
                'uri' => $article->category->uri,
                'id' => $article->id,
            ]) ?>" class="button">Детальніше...</a>
        <p>
    </article>
<?php endforeach; ?>

    <?= LinkPager::widget(['pagination' => $pagination]) ?>

<?php endif; ?>