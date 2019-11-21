$(document).ready(function(){
    $("#datos").DataTable({
        language:{
            url:'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
        }
    });
    $("#formulario").validate({
        rules:{
            nit:{
                required:true
            },
            razonsoc:{
                required:true
            },
            correo:{
                required:true
            },
            celular:{
                required:true
            }
        },
        submitHandler:function(){
            var nit=$("#nit").val();
            var razonsoc=$("#razonsoc").val();
            var correo=$("#correo").val();
            var celular=$("#celular").val();

            $.ajax({
                type:'POST',
                url:'/Empresa/guardar',
                data:{
                    '_token':_token,
                    'nit':nit,
                    'razonsoc':razonsoc,
                    'correo':correo,
                    'celular':celular
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
            nitedi:{
                required:true
            },
            razonsocedi:{
                required:true
            },
            correoedi:{
                required:true
            },
            celularedi:{
                required:true
            }
        },
        submitHandler:function(){
            
            var idedi=$("#idedi").val();
            var nitedi=$("#nitedi").val();
            var razonsocedi=$("#razonsocedi").val();
            var correoedi=$("#correoedi").val();
            var celularedi=$("#celularedi").val();

            $.ajax({
                type:'POST',
                url:'/Empresa/actualizar',
                data:{
                    '_token':_token,
                    'id':idedi,
                    'nit':nitedi,
                    'razonsoc':razonsocedi,
                    'correo':correoedi,
                    'celular':celularedi
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
        url:'/Empresa/editar',
        data:{
            '_token':_token,
            'id':id
        },
        success:function(data){
            data.forEach(element => {
                $("#idedi").val(element.id);
                $("#nitedi").val(element.nit);
                $("#razonsocedi").val(element.razsoc);
                $("#correoedi").val(element.correo);
                $("#celularedi").val(element.celular);

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
            url:'/Empresa/eliminar',
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