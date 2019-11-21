$(document).ready(function(){
    $("#formulario").validate({
        rules:{
            tipdoc_id:{
                required:true
            },
            numdoc:{
                required:true
            },
            priape:{
                required:true
            },
            prinom:{
                required:true
            },
            celular:{
                required:true
            },
            cargos_id:{
                required:true
            },
            pais_id:{
                required:true
            },
            departamentos_id:{
                required:true
            },
            ciudades_id:{
                required:true
            },
        },
        submitHandler:function(){
            var tipdoc_id=$("#tipdoc_id").val();
            var numdoc=$("#numdoc").val();
            var priape=$("#priape").val();
            var segape=$("#segape").val();
            var prinom=$("#prinom").val();
            var segnom=$("#segnom").val();
            var cargos_id=$("#cargos_id").val();
            var pais_id=$("#pais_id").val();
            var departamentos_id=$("#departamentos_id").val();
            var ciudades_id=$("#ciudades_id").val();
            var celular=$("#celular").val();

            $.ajax({
                type:'POST',
                url:'/Personas/guardar',
                data:{
                    '_token':_token,
                    'tipdoc_id':tipdoc_id,
                    'numdoc':numdoc,
                    'priape':priape,
                    'segape':segape,
                    'prinom':prinom,
                    'segnom':segnom,
                    'cargos_id':cargos_id,
                    'celular':celular,
                    'pais_id':pais_id,
                    'departamentos_id':departamentos_id,
                    'ciudades_id':ciudades_id
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
            tipdoc_idedi:{
                required:true
            },
            numdocedi:{
                required:true
            },
            priapeedi:{
                required:true
            },
            prinomedi:{
                required:true
            },
            celularedi:{
                required:true
            },
            cargos_idedi:{
                required:true
            },
            pais_idedi:{
                required:true
            },
            departamentos_idedi:{
                required:true
            },
            ciudades_idedi:{
                required:true
            },
        },
        submitHandler:function(){
            var idedi=$("#idedi").val();
            var tipdoc_id=$("#tipdoc_idedi").val();
            var numdoc=$("#numdocedi").val();
            var priape=$("#priapeedi").val();
            var segape=$("#segapeedi").val();
            var prinom=$("#prinomedi").val();
            var segnom=$("#segnomedi").val();
            var cargos_id=$("#cargos_idedi").val();
            var pais_id=$("#pais_idedi").val();
            var departamentos_id=$("#departamentos_idedi").val();
            var ciudades_id=$("#ciudades_idedi").val();
            var celular=$("#celularedi").val();
            $.ajax({
                type:'PUT',
                url:'/Personas/actualizar',
                data:{
                    '_token':_token,
                    'id':idedi,
                    'tipdoc_id':tipdoc_id,
                    'numdoc':numdoc,
                    'priape':priape,
                    'segape':segape,
                    'prinom':prinom,
                    'segnom':segnom,
                    'cargos_id':cargos_id,
                    'celular':celular,
                    'pais_id':pais_id,
                    'departamentos_id':departamentos_id,
                    'ciudades_id':ciudades_id
                },
                success:function(data){
                    $.notify(data,"success");
                    location.reload();
                }
            });
        }
    });
    $("#formularioexa").validate({
        rules:{
            examen_id:{
                required:true
            },
            fechaexa:{
                required:true
            }
        },
        submitHandler:function(){
            var idper=$("#idper").val();
            var examen=$("#examen_id").val();
            var fechaexa=$("#fechaexa").val();
            $.ajax({
                type:'POST',
                url:'/Personas/guardarexamenesxper',
                data:{
                    '_token':_token,
                    'personas_id':idper,
                    'examenes_id':examen,
                    'fecha':fechaexa  
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


function departamentos(id){
    $("#departamentos_id").empty();
    var idv=id.value;
    $.ajax({
        type:'POST',
        url:'/Personas/getdepart',
        data:{
            '_token':_token,
            'id':idv
        },
        success:function(data){
            $("#departamentos_id").append("<option value=''>----Seleccione---</option>")
            data.forEach(ele=>{
                $("#departamentos_id").append("<option value="+ele.id+">"+ele.nombre+"</option>");
            });
        }
    });
}
function ciudades(id){
    var idv=id.value;
    $.ajax({
        type:'POST',
        url:'/Personas/getciudades',
        data:{
            '_token':_token,
            'id':idv
        },
        success:function(data){
            $("#ciudades_id").append("<option value=''>----Seleccione---</option>")
            data.forEach(ele=>{
                $("#ciudades_id").append("<option value="+ele.id+">"+ele.nombre+"</option>");
            });
        }
    });
} 
function departamentosedi(id){
    $("#departamentos_idedi").empty();
    var idv=id.value;
    $.ajax({
        type:'POST',
        url:'/Personas/getdepart',
        data:{
            '_token':_token,
            'id':idv
        },
        success:function(data){
            $("#departamentos_idedi").append("<option value=''>----Seleccione---</option>")
            data.forEach(ele=>{
                $("#departamentos_idedi").append("<option value="+ele.id+">"+ele.nombre+"</option>");
            });
        }
    });
}
function ciudadesedi(id){
    var idv=id.value;
    $.ajax({
        type:'POST',
        url:'/Personas/getciudades',
        data:{
            '_token':_token,
            'id':idv
        },
        success:function(data){
            $("#ciudades_idedi").append("<option value=''>----Seleccione---</option>")
            data.forEach(ele=>{
                $("#ciudades_idedi").append("<option value="+ele.id+">"+ele.nombre+"</option>");
            });
        }
    });
} 
function editar(id){
    $.ajax({
        type:'POST',
        url:'/Personas/editar',
        data:{
            '_token':_token,
            'id':id
        },
        success:function(data){
            data.forEach(ele=>{
                $("#idedi").val(ele.id);
                $("#tipdoc_idedi").val(ele.tipdoc_id);
                $("#numdocedi").val(ele.numdoc);
                $("#priapeedi").val(ele.priape);
                $("#segapeedi").val(ele.segape);
                $("#prinomedi").val(ele.prinom);
                $("#segnomedi").val(ele.segnom);
                $("#cargos_idedi").val(ele.cargos_id);
                $("#pais_idedi").val(ele.pais_id);
                $("#departamentos_idedi").val(ele.departamentos_id);
                $("#ciudades_idedi").val(ele.ciudades_id);
                $("#celularedi").val(ele.celular);
            });
            $("#editar").modal("show");
        }
    });
}
function eliminar(id){
    alertify.confirm("Esta seguro de eliminar el Registro",
    function(){
        $.ajax({
            type:'DELETE',
            url:'/Personas/eliminar',
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
function examenes(id){
    $("#examenespersona tr:not(:first-child)").remove();
    $("#idper").val(id);
    $.ajax({
        type:'POST',
        url:'/Personas/getexamenes',
        data:{
            '_token':_token,
            'id':id
        },
        success:function(data){
        data['examenes'].forEach(ele=>{   
                $("#examenespersona tr:last").after("<tr><td>"+ele+"</td></tr>");
            });
        }
    });
    $("#examenes").modal("show");
}