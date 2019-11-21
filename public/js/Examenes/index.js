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
            tipoexa_id:{
                required:true
            }
        },
        submitHandler:function(){
            var nombre=$("#nombre").val();
            var tipoexa_id=$("#tipoexa_id").val();
            $.ajax({
                type:'POST',
                url:'/Examenes/guardar',
                data:{
                    '_token':_token,
                    'nombre':nombre,
                    'tipoexa_id':tipoexa_id
                },
                success:function(data){
                    $.notify(data,"success");
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
            tipoexa_idedi:{
                required:true
            }
        },
        submitHandler:function(){
            var id=$("#idedi").val();
            var nombre=$("#nombreedi").val();
            var tipoexa_id=$("#tipoexa_idedi").val();

            $.ajax({
                type:'PUT',
                url:'/Examenes/actualizar',
                data:{
                    '_token':_token,
                    'id':id,
                    'nombre':nombre,
                    'tipoexa_id':tipoexa_id
                },
                success:function(data){
                    $.notify(data,"success");
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
        url:'/Examenes/editar',
        data:{
            '_token':_token,
            'id':id
        },
        success:function(data){
            data.forEach(element => {
                $("#idedi").val(element.id);
                $("#nombreedi").val(element.nombre);
                $("#tipoexa_idedi").val(element.tipoexa_id);
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
            url:'/Examenes/eliminar',
            data:{
                '_token':_token,
                'id':id
            },
            success:function(data){
                $.notify(data,"success");
                location.reload();
            }
        });
    });
}
