window.onload = function() {
        //CKEDITOR.replace( 'text' );
        tinymce.init({
        selector: ".editor",
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste moxiemanager"
        ],
        toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        toolbar2: "styleselect formatselect fontselect fontsizeselect code",
        
        toolbar_items_size: 'small',
        menubar: false,
    });
};
