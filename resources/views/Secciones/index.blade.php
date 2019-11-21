@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Secciones de la obra
@endsection

@section('contentheader_title')
   Secciones de la obra
@endsection

@section('main-content')
<div class="form-group">
   <button class="btn btn-primary" onclick="nuevo();">Crear</button>
</div>	
<!-- Table-->
<div class="panel panel-info">
		<!-- Default panel contents -->
	<div class="panel-heading">Listado de Secciones de la Obra</div>
<table class="table table-bordered" id="datos">
       <thead>
		   <th>#</th>
		   <th>Nombre</th>
		   <th>Secciones</th>
           <th>Acciones</th>
       </thead>
       <tbody>
           @foreach($secciones as $mseccion)
               <tr>
				   <td>{{ $mseccion->id }}</td>
                   <td>{{ $mseccion->nombre }}</td>
                   @foreach($etapas as $metapa)
                        @if($metapa->id == $mseccion->etapas_id)
                            <td>{{ $metapa->nombre }}</td>
                        @endif
                   @endforeach
                   <td><button class="btn btn-warning" onclick="editar({{ $mseccion->id }})" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fa fa-edit"></i></button><button class="btn btn-danger" onclick="eliminar({{ $mseccion->id }})" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-trash"></i></button></td>
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
         <h4 class="modal-title">Crear Seccion de la obra</h4>
       </div>
       <form  id="formulario">
       <div class="modal-body">
           <div class="row">
               <div class="col-sm-12">
                   <div class="col-sm-4">
                       <label for="">Etapa:</label>
                   </div>
                   <div class="col-sm-8">
                       <select name="etapa_id" id="etapa_id" class="form-control">
                           <option value="">---Seleccion--</option>
                            @foreach($etapas as $metapa)
                                <option value="{{ $metapa->id }}">{{ $metapa->nombre }}</option>
                            @endforeach
                       </select>
                   </div>
               </div>
               <div class="col-sm-12">
                   <div class="col-sm-4">
                       <label for="">Nombre:</label>
                   </div>
                   <div class="col-sm-8">
                       <input type="text" name="nombre" id="nombre" class="form-control">
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
         <h4 class="modal-title">Editar Seccion de la obra</h4>
       </div>
       <form action="" id="formularioedi">
       <div class="modal-body">
           <input type="hidden" name="idedi" id="idedi">
           <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <label for="">Etapa:</label>
                </div>
                <div class="col-sm-8">
                    <select name="etapa_idedi" id="etapa_idedi" class="form-control">
                        <option value="">---Seleccion--</option>
                         @foreach($etapas as $metapa)
                             <option value="{{ $metapa->id }}">{{ $metapa->nombre }}</option>
                         @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <label for="">Nombre:</label>
                </div>
                <div class="col-sm-8">
                    <input type="text" name="nombreedi" id="nombreedi" class="form-control">
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
<script src="{{ asset('/js/Secciones/index.js') }}" type="text/javascript"></script>

@endsection
