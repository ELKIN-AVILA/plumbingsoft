@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Tareas
@endsection

@section('contentheader_title')
   Tareas
@endsection

@section('main-content')
<div class="form-group">
   <button class="btn btn-primary" onclick="nuevo();">Nuevo</button>
</div>
<!-- Table-->
<div class="panel-success">
    <div class="panel-heading">
        Listado de tareas
    </div>
   <table class="table table-bordered" id="datos">
       <thead>
           <th>#</th>
           <th>Nombre</th>
           <th>Dificultad</th>
           <th>Acciones</th>
       </thead>
       <tbody>
           @foreach($tareas as $mtarea)
               <tr>
                   <td>{{ $mtarea->id }}</td>
                   <td>{{ $mtarea->nombre }}</td>
                   @foreach($tipdificultad as $mtip)
                        @if($mtarea->tipdificultad_id==$mtip->id)
                            <td>{{ $mtip->nombre }}</td>
                        @else
                            
                        @endif
                   @endforeach
                   <td><button class="btn btn-warning" onclick="editar({{ $mtarea->id }})" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fa fa-edit"></i></button><button class="btn btn-danger" onclick="eliminar({{ $mtarea->id }})" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-trash"></i></button></td>
               </tr>

           @endforeach
           
       </tbody>
   </table>
</div>
   <!--end Table -->
<div class="modal fade" id="nuevo" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Crear Tarea</h4>
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
               <div class="col-sm-12">
                   <div class="col-sm-4">
                       <label for="">Tipo Dificultad:</label>
                   </div>
                   <div class="col-sm-8">
                       <select name="tipdificultad_id" id="tipdificultad_id" class="form-control">
                           <option value="">---Seleccione---</option>
                           @foreach($tipdificultad as $mtip)
                                <option value="{{ $mtip->id }}">{{ $mtip->nombre }}</option>
                           @endforeach
                       </select>
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
         <h4 class="modal-title">Editar Tarea</h4>
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
               <div class="col-sm-12">
                <div class="col-sm-4">
                    <label for="">Tipo Dificultad:</label>
                </div>
                <div class="col-sm-8">
                    <select name="tipdificultad_idedi" id="tipdificultad_idedi" class="form-control">
                        <option value="">---Seleccione---</option>
                        @foreach($tipdificultad as $mtip)
                             <option value="{{ $mtip->id }}">{{ $mtip->nombre }}</option>
                        @endforeach
                    </select>
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
<script src="{{ asset('/js/Tareas/index.js') }}" type="text/javascript"></script>

@endsection
