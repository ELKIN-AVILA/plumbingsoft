$(document).ready(function(){
    $("#datos").DataTable({
        language:{
            url:'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
        }
    });
    $("#formulario").validate({
        rules:{
            obras_id:{
                required:true
            },
            nombre:{
                required:true
            }
        },
        submitHandler:function(){
            var nombre=$("#nombre").val();
            var obras=$("#obras_id").val();
            $.ajax({
                type:'POST',
                url:'/Etapas/guardar',
                data:{
                    '_token':_token,
                    'nombre':nombre,
                    'obras_id':obras
                },
                success:function(data){
                    $.notify(data,'success');
                    location.reload();
                }
            });
        }
    });
    $("#formularioedi").validate({
        rules:{
            obras_id:{
                required:true
            },
            nombre:{
                required:true
            }
        },
        submitHandler:function(){
            
            var idedi=$("#idedi").val();
            var obras=$("#obras_idedi").val();
            var nombre=$("#nombreedi").val();
            $.ajax({
                type:'PUT',
                url:'/Etapas/actualizar',
                data:{
                    '_token':_token,
                    'id':idedi,
                    'nombre':nombre,
                    'obras_id':obras
                },
                success:function(data){
                    $.notify(data,'success');
                    location.reload();
                }
            });
        }
    });
});
function nuevo(){
    $("#nuevo").modal('show');
}
function editar(id){

    $.ajax({
        type:'POST',
        url:'/Etapas/editar',
        data:{
            '_token':_token,
            'id':id
        },
        success:function(data){
            data.forEach(element => {
                $("#idedi").val(element.id);
                $("#obras_idedi").val(element.obras_id);
                $("#nombreedi").val(element.nombre);
            });
            $("#editar").modal('show');
        }
    });
}
function eliminar(id){
    alertify.confirm("Esta seguro de eliminar el Registro",
    function(){
        $.ajax({
            type:'DELETE',
            url:'/Etapas/eliminar',
            data:{
                '_token':_token,
                'id':id
            },
            success:function(data){
                $.notify(data,'success');
                location.reload();
            }
        });
    });
}