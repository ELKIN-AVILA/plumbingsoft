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
            empresactr_id:{
                required:true
            }
        },
        submitHandler:function(){
            var nombre=$("#nombre").val();
            var empresactr_id=$("#empresactr_id").val();
            var empresa=$("#empresa_id").val();

            $.ajax({
                type:'POST',
                url:'/Obras/guardar',
                data:{
                    '_token':_token,
                    'nombre':nombre,
                    'empresactr_id':empresactr_id,
                    'empresa_id':empresa
                },
                success:function(data){
                    alertify.success(data);
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
            empresactr_idedi:{
                required:true
            },
            estado_id:{
                required:true
            }
        },
        submitHandler:function(){
            var id=$("#idedi").val();
            var nombre=$("#nombreedi").val();
            var empresa=$("#empresactr_idedi").val();
            var estado=$("#estado_id").val();
            
            
            $.ajax({
                type:'POST',
                url:'/Obras/actualizar',
                data:{
                    '_token':_token,
                    'id':id,
                    'nombre':nombre,
                    'empresactr_id':empresa,
                    'estado':estado
                },
                success:function(data){
                    alertify.success(data);
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
        url:'/Obras/editar',
        data:{
            '_token':_token,
            'id':id
        },
        success:function(data){
            data.forEach(element => {
                $("#idedi").val(element.id);
                $("#nombreedi").val(element.nombre);
                $("#empresactr_idedi").val(element.empresactr_id);
                $("#estado_id").val(element.estado);
            });
            $("#editar").modal('show');
        }
    });
}
function eliminar(id){
    alertify.confirm("Esta seguro de eliminar el Registro",
    function(){
        $.ajax({
            type:'POST',
            url:'/Obras/eliminar',
            data:{
                '_token':_token,
                'id':id
            },
            success:function(data){
                alertify.success(data);
                location.reload();
            }
        });
    });
}
