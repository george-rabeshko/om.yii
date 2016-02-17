<?php

use yii\widgets\LinkPager;
use common\models\Tool;

$um = \Yii::$app->urlManager;

?>

<?php foreach($data['articles'] as $article): ?>
<article id="<?= $article->id ?>" class="post">
    <h2 class="post-title">

        <?php
            echo \yii\helpers\Html::a($article->title, $um->createUrl([
                'blog/single', 'uri' => $article->category->uri, 'id' => $article->id,
            ]));
        ?>

    </h2>
    <img src="/<?= $article->getImage()->getPath() ?>" height="280" width="580" alt="no-photo">
    <p class="article-description"><?= Tool::getContent($article->content) ?></p>
    <p>

        <?php
            echo \yii\helpers\Html::a('Дізнатися більше', $um->createUrl([
                'blog/single', 'uri' => $article->category->uri, 'id' => $article->id,
            ]), ['class' => 'button']);
        ?>

    <p>
</article>
<?php endforeach; ?>

<?= LinkPager::widget(['pagination' => $data['pagination']]) ?>
