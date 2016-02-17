<?php
/**
 * @link https://github.com/himiklab/yii2-search-component-v2
 * @copyright Copyright (c) 2014 HimikLab
 * @license http://opensource.org/licenses/MIT MIT
 */

use common\modules\search\SearchAssets;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var ZendSearch\Lucene\Search\QueryHit[] $hits */
/** @var string $query */
/** @var yii\data\Pagination $pagination */

$query = Html::encode($query);

$this->title = "Results for \"$query\"";
$this->params['breadcrumbs'] = ['Search', $this->title];

SearchAssets::register($this);
$this->registerJs("jQuery('.search').highlight('{$query}');");

if (!empty($hits)):
    foreach ($hits as $hit):
        ?>
        <h3><a href="<?= Url::to($hit->id, true) ?>"><?= $hit->title ?></a></h3>
        <p class="search"><?= $hit->content ?></p>
        <hr />
    <?php
    endforeach;
else:
    ?>
    <h3>The "<?= $query ?>" isn't found!</h3>
<?php
endif;

echo LinkPager::widget([
    'pagination' => $pagination,
]);
