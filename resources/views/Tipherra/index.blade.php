@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Tipo de Herramientas
@endsection

@section('contentheader_title')
   Tipo de Herramientas
@endsection

@section('main-content')
<div class="form-group">
   <button class="btn btn-primary" onclick="nuevo();">Nuevo</button>
</div>
<!-- Table-->
   <table class="table table-bordered" id="datos">
       <thead>
           <th>#</th>
           <th>Nombre</th>
           <th>Acciones</th>
       </thead>
       <tbody>
           @foreach($tipherra as $mtip)
               <tr>
                   <td>{{ $mtip->id }}</td>
                   <td>{{ $mtip->nombre }}</td>
                   <td><button class="btn btn-warning" onclick="editar({{ $mtip->id }})" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fa fa-edit"></i></button><button class="btn btn-danger" onclick="eliminar({{ $mtip->id }})" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-trash"></i></button></td>
               </tr>

           @endforeach
           
       </tbody>
   </table>
<!--end Table -->
<div class="modal fade" id="nuevo" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Crear Tipo de Herramienta</h4>
       </div>
       <form action="" id="formulario">
       <div class="modal-body">
           <div class="row">
               <div class="col-sm-12">
                   <div class="col-sm-4">
                       <label for="">Nombre:</label>
                   </div>
                   <div class="col-sm-8">
                       <input type="text" name="nombre" maxlength="45" id="nombre" class="form-control required"> 
                   </div>
               </div>
               
           </div>
       </div>
       <div class="modal-footer">
           <button class="btn btn-success" type="submit">Guardar</button>
       </div>
       </form>
     </div>
     
   </div>
 </div>
<!--fin modal nuevo -->
 <!-- modal edit -->


<div class="modal fade" id="editar" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Editar Tipo Herramienta</h4>
       </div>
       <form action="" id="formularioedi">
       <div class="modal-body">
           <input type="hidden" name="idedi" id="idedi">
           <div class="row">
               <div class="col-sm-12">
                   <div class="col-sm-4">
                       <label for="">Nombre:</label>
                   </div>
                   <div class="col-sm-8">
                       <input type="text" name="nombreedi" maxlength="45" id="nombreedi" class="form-control required"> 
                   </div>
               </div>
               
           </div>
       </div>
       <div class="modal-footer">
           <button class="btn btn-success" type="submit">Guardar</button>
       </div>
       </form>
     </div>
     
   </div>
 </div>

@endsection

@section('script')
<script src="{{ asset('/js/Tipherra/index.js') }}" type="text/javascript"></script>

@endsection
