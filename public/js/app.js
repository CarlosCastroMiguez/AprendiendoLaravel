$(function(){
    $('#list-of-projects').on('change', onNewProyectSelected);
});

function onNewProyectSelected(){
    var project_id = $(this).val();
    location.href = '/seleccionar/proyecto/'+ project_id;
}