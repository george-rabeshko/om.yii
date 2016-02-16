<?php

use frontend\widgets\NoteWidget;
use yii\widgets\LinkPager;
use common\models\Tool;

?>

<?= NoteWidget::widget(['name' => 'warning-msg']) ?>

<?php foreach($articles as $article): ?>
<article id="<?= $article->id ?>" class="post">
    <h2 class="post-title">
        <a href="<?= \Yii::$app->urlManager->createUrl([
            'blog/single',
            'uri' => $article->category->uri,
            'id' => $article->id,
        ]) ?>"><?= $article->title ?></a>
    </h2>
    <img src="/<?= $article->getImage()->getPath() ?>" height="280" width="580" alt="no-photo">
    <p class="article-description"><?= Tool::getContent($article->content) ?></p>
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
