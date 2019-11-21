$(document).ready(function(){
    $("#datos").DataTable({
        language:{
            url:'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
        }
    });
    $("#formulario").validate({
        rules:{
            empresa_id:{
                required:true
            },
            mision:{
                required:true
            },
            vision:{
                required:true
            },
            reglamento:{
                required:true
            },
            objetivos:{
                required:true
            },
        },
        submitHandler:function(){
            var empresa=$("#empresa_id").val();
            var mision=$("#mision").val();
            var vision=$("#vision").val();
            var reglamento=$("#reglamento").val();
            var objetivos=$("#objetivos").val();

            $.ajax({
                type:'POST',
                url:'/Infoempresa/guardar',
                data:{
                    '_token':_token,
                   'empresa_id':empresa,
                   'mision':mision,
                   'vision':vision,
                   'reglamento':reglamento,
                   'objetivos':objetivos
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
            empresa_idedi:{
                required:true
            },
            misionedi:{
                required:true
            },
            visionedi:{
                required:true
            },
            reglamentoedi:{
                required:true
            },
            objetivosedi:{
                required:true
            },
        },
        submitHandler:function(){
            
            var idedi=$("#idedi").val();
            var empresa=$("#empresa_idedi").val();
            var mision=$("#misionedi").val();
            var vision=$("#visionedi").val();
            var reglamento=$("#reglamentoedi").val();
            var objetivos=$("#objetivosedi").val();
            $.ajax({
                type:'POST',
                url:'/Infoempresa/actualizar',
                data:{
                    '_token':_token,
                    'id':idedi,
                    'empresa_id':empresa,
                    'mision':mision,
                    'vision':vision,
                    'reglamento':reglamento,
                    'objetivos':objetivos
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
        url:'/Infoempresa/editar',
        data:{
            '_token':_token,
            'id':id
        },
        success:function(data){
            data.forEach(element => {
                $("#idedi").val(element.id);
                $("#empresa_idedi").val(element.empresa_id);
                $("#misionedi").val(element.mision);
                $("#visionedi").val(element.vision);
                $("#reglamentoedi").val(element.reglamento);
                $("#objetivosedi").val(element.objetivos);

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
            url:'/Infoempresa/eliminar',
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