<?php

use backend\widgets\CategoriesWidget;
use yii\helpers\Url;

?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Пошук...">
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
            <li class="treeview active">
                <a href="/"><i class="fa fa-list"></i> <span>Категорії</span> <i
                        class="fa fa-angle-down pull-right"></i></a>
                <?= CategoriesWidget::widget() ?>
            </li>
            <li><a href="<?= Url::toRoute(['/pages']) ?>"><i class="fa fa-file-text-o"></i> <span>Сторінки</span></a></li>
            <li><a href="<?= Url::toRoute(['/comments']) ?>"><i class="fa fa-comments-o"></i> <span>Коментарі</span></a></li>
            <li class="header">Управління сайтом</li>
            <li><a href="/"><i class="fa fa-cogs"></i> <span>Налаштування</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>