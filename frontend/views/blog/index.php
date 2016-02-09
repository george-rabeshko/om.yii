<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>

<?php if (\Yii::$app->session->hasFlash('incorrect_uri')): ?>
<div class="warning-msg">
    <p><?= \Yii::$app->session->getFlash('incorrect_uri') ?></p>
</div>
<?php endif; ?>

<?php foreach($articles as $article): ?>
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
