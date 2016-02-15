<?php

use backend\widgets\CategoriesWidget;
use yii\helpers\Url;

?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/dist/images/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
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
                <a href="/"><i class="fa fa-link"></i> <span>Категорії</span> <i
                        class="fa fa-angle-down pull-right"></i></a>
                <?= CategoriesWidget::widget() ?>
            </li>
            <li><a href="<?= Url::toRoute(['/pages']) ?>"><i class="fa fa-link"></i> <span>Сторінки</span></a></li>
            <li><a href="<?= Url::toRoute(['/comments']) ?>"><i class="fa fa-link"></i> <span>Коментарі</span></a></li>
            <li class="header">Управління сайтом</li>
            <li><a href="/"><i class="fa fa-link"></i> <span>Налаштування</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>