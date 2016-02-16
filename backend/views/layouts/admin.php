<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use backend\assets\AdminAsset;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= \Yii::$app->params['title'] ?></title>
    <script src="/uploads/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            content_css: "../public/css/tiny-content.css",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools responsivefilemanager"
            ],
            automatic_uploads: true,
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link | responsivefilemanager image",
            image_advtab: true,
            external_filemanager_path: "/uploads/filemanager/",
            filemanager_title: "Filemanager" ,
            external_plugins: { "filemanager" : "/uploads/js/tinymce/plugins/responsivefilemanager/plugin.min.js" },
            imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
            file_picker_types: 'image media',
            file_picker_callback: function(callback, value, meta) {
                // Provide image and alt text for the image dialog
                if (meta.filetype == 'image') {
                    callback('myimage.jpg', {alt: 'My alt text'});
                }

                // Provide alternative source and posted for the media dialog
                if (meta.filetype == 'media') {
                    callback('movie.mp4', {source2: 'alt.ogg', poster: 'image.jpg'});
                }
            }
        });
    </script>
    <?php $this->head() ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

<?= $this->render('//common/header') ?>

<?= $this->render('//common/sidebar') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">

        <?= $content ?>

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->

<?= $this->render('//common/footer') ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
