<?php use yii\widgets\LinkPager; ?>

<?php foreach($articles as $article): ?>
    <article id="<?= $article->id ?>" class="post">
        <h2 class="post-title"><a href="/blog/<?= $article->id ?>"><?= $article->title ?></a></h2>
        <img src="/public/images/no-photo.png" alt="no-photo">
        <?= $article->content ?>
        <p><a href="/blog/<?= $article->id ?>" class="button">Детальніше...</a><p>
    </article>
<?php endforeach; ?>

<?= LinkPager::widget(['pagination' => $pagination]) ?>