@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Etapas de la obra
@endsection

@section('contentheader_title')
   Etapas de la obra
@endsection

@section('main-content')
<div class="form-group">
   <button class="btn btn-primary" onclick="nuevo();">Crear</button>
</div>	
<!-- Table-->
<div class="panel panel-info">
		<!-- Default panel contents -->
	<div class="panel-heading">Listado de Etapas de la Obra</div>
<table class="table table-bordered" id="datos">
       <thead>
		   <th>#</th>
		   <th>Nombre</th>
		   <th>Obra</th>
           <th>Acciones</th>
       </thead>
       <tbody>
           @foreach($etapas as $metapa)
               <tr>
				   <td>{{ $metapa->id }}</td>
                   <td>{{ $metapa->nombre }}</td>
                   @foreach($obras as $mobra)
                        @if($mobra->id == $metapa->obras_id)
                            <td>{{ $mobra->nombre }}</td>
                        @endif
                   @endforeach
                   <td><button class="btn btn-warning" onclick="editar({{ $metapa->id }})" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fa fa-edit"></i></button><button class="btn btn-danger" onclick="eliminar({{ $metapa->id }})" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-trash"></i></button></td>
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
         <h4 class="modal-title">Crear Etapa de la obra</h4>
       </div>
       <form  id="formulario">
       <div class="modal-body">
           <div class="row">
               <div class="col-sm-12">
                   <div class="col-sm-4">
                       <label for="">Obra:</label>
                   </div>
                   <div class="col-sm-8">
                       <select name="obras_id" id="obras_id" class="form-control">
                           <option value="">---Seleccion--</option>
                            @foreach($obras as $mobra)
                                <option value="{{ $mobra->id }}">{{ $mobra->nombre }}</option>
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
         <h4 class="modal-title">Editar Etapa de obra</h4>
       </div>
       <form action="" id="formularioedi">
       <div class="modal-body">
           <input type="hidden" name="idedi" id="idedi">
           <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <label for="">Obra:</label>
                </div>
                <div class="col-sm-8">
                    <select name="obras_idedi" id="obras_idedi" class="form-control">
                        <option value="">---Seleccion--</option>
                         @foreach($obras as $mobra)
                             <option value="{{ $mobra->id }}">{{ $mobra->nombre }}</option>
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
<script src="{{ asset('/js/Etapas/index.js') }}" type="text/javascript"></script>

@endsection
