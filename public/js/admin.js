$(document).ready(function(){
    $('#alert').hide();
    $('.btn-delete').click(function (e) {
        e.preventDefault();
        if (!confirm("¿Está seguro de eliminar la serie y todas sus preguntas asociadas?")) {
            return false;
        }
        var row = $(this).parents('tr');
        var form = $(this).parents('form');
        var url = form.attr('action');

        $('#alert').show();

        $.ajax(url, form.serialize(), function (result) {
            row.fadeOut();
            $('#serie-total').html(result.total);
            $('#alert').html(result.message);
        }).fail(function () {
            $('#alert').html('algo salio mal')});
    });
  
});
