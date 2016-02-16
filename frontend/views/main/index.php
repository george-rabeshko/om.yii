<?php use yii\widgets\LinkPager; ?>

<?php $this->title .= \Yii::$app->params['description']; ?>

<?php foreach($articles as $article): ?>
    <article id="<?= $article->id ?>" class="post">
        <h2 class="post-title">
            <a href="<?= \Yii::$app->urlManager->createUrl([
                'blog/single',
                'uri' => $article->category->uri,
                'id' => $article->id,
            ]) ?>"><?= $article->title ?></a>
        </h2>
        <img class="main-photo" src="/<?= $article->getImage()->getPath() ?>" height="280" width="580" alt="no-photo">
        <p class="article-description"><?= $blog->getContent($article->content) ?></p>
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