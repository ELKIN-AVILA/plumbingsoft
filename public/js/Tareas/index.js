$(document).ready(function(){
    $("#datos").DataTable({
        language:{
            url:'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
        }
    });
    $("#formulario").validate({
        rules:{
            nombre:{
                required:true,
            },
            tipdificultad_id:{
                required:true,
            }
        },
        submitHandler:function(){
            var nombre=$("#nombre").val();
            var tipdificultad_id=$("#tipdificultad_id").val();
            $.ajax({
                type:'POST',
                url:'/Tareas/guardar',
                data:{
                    '_token':_token,
                    'nombre':nombre,
                    'tipdificultad_id':tipdificultad_id
                },
                success:function(data){
                    $.notify(data, "success");
                    location.reload();
                }
            });
        }
    });
    $("#formularioedi").validate({
        rules:{
            nombreedi:{
                required:true
            },
            tipdificultad_id
        },
        submitHandler:function(){
            var id=$("#idedi").val();
            var nombre=$("#nombreedi").val();
            var tipdificultad_id=$("#tipdificultad_idedi").val();
            $.ajax({
                type:'PUT',
                url:'/Tareas/actualizar',
                data:{
                    '_token':_token,
                    'id':id,
                    'nombre':nombre,
                    'tipdificultad_id':tipdificultad_id
                },
                success:function(data){
                    $.notify(data, "success");
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
        url:'/Tareas/editar',
        data:{
            '_token':_token,
            'id':id
        },
        success:function(data){
            data.forEach(element => {
                $("#idedi").val(element.id);
                $("#nombreedi").val(element.nombre);
                $("#tipdificultad_idedi").val(element.tipdificultad_id);
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
            url:'/Tareas/eliminar',
            data:{
                '_token':_token,
                'id':id
            },
            success:function(data){
                $.notify(data, "success");
                location.reload();
            }
        });
    });
}
