<?php

use backend\widgets\CategoriesWidget;
use common\models\Tool;
use yii\helpers\Url;
use anmaslov\autocomplete\AutoComplete;

?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <?php
//                    echo AutoComplete::widget([
//                        'name' => 'link',
//                        'data' =>  Tool::getModelForAutocomplete(),
//                        'clientOptions' => [
//                            'minChars' => 2,
//                        ],
//                        'options' => [
//                            'placeholder' => 'Пошук...',
//                        ]
//                    ]);
                ?>
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Управління контентом</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="treeview <?= (Tool::hasAddressBarIt('articles')) ? 'active' : ''; ?>">
                <a href="<?= Url::toRoute(['/articles']) ?>">
                    <i class="fa fa-list"></i> <span>Категорії</span> <i class="fa fa-angle-down pull-right"></i>
                </a>
                <?= CategoriesWidget::widget() ?>
            </li>
            <li <?= (Tool::hasAddressBarIt('pages')) ? "class='active'" : ''; ?>>
                <a href="<?= Url::toRoute(['/pages']) ?>">
                    <i class="fa fa-file-text-o"></i> <span>Сторінки</span>
                </a>
            </li>
            <li <?= (Tool::hasAddressBarIt('comments')) ? "class='active'" : ''; ?>>
                <a href="<?= Url::toRoute(['/comments']) ?>">
                    <i class="fa fa-comments-o"></i> <span>Коментарі</span>
                </a>
            </li>
            <li class="header">Управління сайтом</li>
            <li <?= (Tool::hasAddressBarIt('settings')) ? "class='active'" : ''; ?>>
                <a href="<?= Url::toRoute(['/settings']) ?>"><i class="fa fa-cogs"></i> <span>Налаштування</span></a>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>