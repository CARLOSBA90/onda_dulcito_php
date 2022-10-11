<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
<script> 
        ClassicEditor
        .create(document.querySelector('#editor'))
        .catch( error => {
            console.error( error );
        } );
$("#div-editor").fadeIn();
</script>
