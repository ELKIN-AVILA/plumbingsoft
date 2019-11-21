$(document).ready(function(){
    $("#datos").DataTable({
        language:{
            url:'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
        }
    });
    $("#formulario").validate({
        rules:{
            etapa_id:{
                required:true
            },
            nombre:{
                required:true
            }
        },
        submitHandler:function(){
            var nombre=$("#nombre").val();
            var etapas=$("#etapa_id").val();
            $.ajax({
                type:'POST',
                url:'/Secciones/guardar',
                data:{
                    '_token':_token,
                    'nombre':nombre,
                    'etapas_id':etapas
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
            etapa_id:{
                required:true
            },
            nombre:{
                required:true
            }
        },
        submitHandler:function(){
            
            var idedi=$("#idedi").val();
            var etapas=$("#etapa_idedi").val();
            var nombre=$("#nombreedi").val();
            $.ajax({
                type:'PUT',
                url:'/Secciones/actualizar',
                data:{
                    '_token':_token,
                    'id':idedi,
                    'nombre':nombre,
                    'etapas_id':etapas
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
        url:'/Secciones/editar',
        data:{
            '_token':_token,
            'id':id
        },
        success:function(data){
            data.forEach(element => {
                $("#idedi").val(element.id);
                $("#etapa_idedi").val(element.etapas_id);
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
            url:'/Secciones/eliminar',
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