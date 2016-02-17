tinymce.init({
    selector:'textarea',
    content_css: "/uploads/js/tinymce/tiny-content.css",
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