<?php use frontend\widgets\CategoriesWidget; ?>

<!-- BEGIN left-bar (categories block) -->
<div class="left-bar">
    <div class="categories">
        <h3>Категорії</h3>
        <ul>
            <?= CategoriesWidget::widget(); ?>
        </ul>
    </div>
</div>
<!-- END left-bar -->