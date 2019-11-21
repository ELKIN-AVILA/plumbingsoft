$(document).ready(function(){
    $("#formulario").validate({
        rules:{
            obras_id:{
                required:true
            },
            etapas_id:{
                required:true
            },
            secciones_id:{
                required:true
            },
            tipedificacion_id:{
                required:true
            },
            cantidad:{
                required:true
            }
        },
        submitHandler:function(){
            var secciones=$("#secciones_id").val();
            var tipedificacion=$("#tipedificacion_id").val();
            var cantidad=$("#cantidad").val();
            $.ajax({
                type:'POST',
                url:'/Casas/guardar',
                data:{
                    '_token':_token,
                    'secciones_id':secciones,
                    'tipedificacion_id':tipedificacion,
                    'cantidad':cantidad
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
    $("#nuevo").modal("show");
}
function traeetapa(id){
    $("#etapas_id").empty();
    var idv=id.value;
    $.ajax({
        type:'POST',
        url:'/Casas/traeetapas',
        data:{
            '_token':_token,
            'id':idv
        },
        success:function(data){
            $("#etapas_id").append("<option>---Selecione---</option>");
            data.forEach(element => {
                $("#etapas_id").append("<option value="+element.id+">"+element.nombre+"</option>");
            });
        } 
    });
}
function traesecciones(id){
    $("#secciones_id").empty();
    var idv=id.value;
    $.ajax({
        type:'POST',
        url:'/Casas/traesecciones',
        data:{
            '_token':_token,
            'id':idv
        },
        success:function(data){
            $("#secciones_id").append("<option>---Selecione---</option>");
            data.forEach(element => {
                $("#secciones_id").append("<option value="+element.id+">"+element.nombre+"</option>");
            });
        } 
    });
}
function casas(id){
    $.ajax({
        type:'POST',
        url:'/Casas/traecasas',
        data:{
            '_token':_token,
            'id':id
        },
        success:function(data){
            console.log(data);
        }
    });
}