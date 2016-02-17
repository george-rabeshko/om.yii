<?php
use app\modules\search\SearchAssets;

$query = yii\helpers\Html::encode($query);

$this->params['breadcrumbs'][] = ['label' => 'Блог', 'url' => ['/blog']];
$this->title = "Результаты поиска по запросу \"$query\"";
$this->params['breadcrumbs'][] = $this->title;

SearchAssets::register($this);
$this->registerJs("jQuery('.search').highlight('{$query}');");
?>

<div class="row">
    <?php
    if (!empty($hits)):
        foreach ($hits as $hit):
            ?>
            <h3><a href="<?= yii\helpers\Url::to($hit->url, true) ?>"><?= $hit->title ?></a></h3>
            <p class="search"><?= $hit->body ?></p>
            <hr/>
            <?php
        endforeach;
    else:
        ?>
        <div class="alert alert-danger"><h3>По запросу "<?= $query ?>" ничего не найдено!</h3></div>
        <?php
    endif;

    echo yii\widgets\LinkPager::widget([
        'pagination' => $pagination,
    ]);
    ?>
</div>