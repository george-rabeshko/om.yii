<!-- BEGIN page-container -->
<div class="page-container">
    <div id="page">
        <!-- BEGIN sidebar -->
        <div class="slider">
            <img src="/public/images/slide-photo.jpg" alt="Любомльська районна газета">
        </div>
        <!-- END sidebar -->

        <?= $this->render('//common/left-bar', ['categories' => $categories]) ?>

        <!-- BEGIN content (article block) -->
        <div class="content">
            <article id="post-1" class="post">
                <h2 class="post-title"><a href="#">Some title #1</a></h2>
                <img src="/public/images/no-photo.png" alt="no-photo">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p><a href="#" class="button">Детальніше...</a><p>
            </article>

            <article id="post-1" class="post">
                <h2 class="post-title"><a href="#">Some title #2</a></h2>
                <img src="/public/images/no-photo.png" alt="no-photo">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p><a href="#" class="button">Детальніше...</a><p>
            </article>

            <article id="post-1" class="post">
                <h2 class="post-title"><a href="#">Some title #3</a></h2>
                <img src="/public/images/no-photo.png" alt="no-photo">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p><a href="#" class="button">Детальніше...</a><p>
            </article>
        </div>
        <!-- END content -->

        <?= $this->render('//common/right-bar') ?>
    </div>
</div>
<!-- END page-container -->