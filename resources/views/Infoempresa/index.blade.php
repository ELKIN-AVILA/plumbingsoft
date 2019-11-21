@extends('adminlte::layouts.app')


@section('htmlheader_title')
   Informacion Empresa
@endsection

@section('contentheader_title')
   Informacion Empresa
@endsection

@section('main-content')
<div class="form-group">
   <button class="btn btn-primary" onclick="nuevo();">Nuevo</button>
</div>
<!-- Table-->
   <table class="table table-bordered" id="datos">
       <thead>
		   <th>#</th>
		   <th>Empresa</th>
		   <th>Mision</th>
		   <th>Vision</th>
		   <th>Acciones</th>
       </thead>
       <tbody>
           @foreach($infoempresa as $mempre)
               <tr>
				   <td>{{ $mempre->id }}</td>
				   @foreach($empresa as $mempresa)
						@if($mempresa->id==$mempre->empresa_id)   
						   <td>{{ $mempresa->razsoc }}</td>
						@endif
					@endforeach
					<td>{{ $mempre->mision}}</td>
					<td>{{ $mempre->vision }}</td>
                   <td><button class="btn btn-warning" onclick="editar({{ $mempre->id }})" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fa fa-edit"></i></button><button class="btn btn-danger" onclick="eliminar({{ $mempre->id }})" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-trash"></i></button></td>
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
         <h4 class="modal-title">Crear Informacion de la Empresa</h4>
       </div>
       <form action="" id="formulario">
       <div class="modal-body">
           <div class="row">
               <div class="col-sm-12">
				   <div class="col-sm-4">
					   <label for="">Empresa:</label>
				   </div>
				   <div class="col-sm-8">
					   <select name="empresa_id" id="empresa_id" class="form-control">
						   <option value="">--Selecione--</option>
						   @foreach ($empresa as $mempresa)
								<option value="{{ $mempresa->id }}">{{ $mempresa->razsoc }}</option>
						   @endforeach
					   </select>
				   </div>
			   </div>
			   <div class="col-sm-12">
				   <div class="col-sm-4">
					   <label for="">Mision</label>
				   </div>
				   <div class="col-sm-8">
						<textarea name="mision" id="mision" rows="10" cols="50" class="form-control"></textarea>
				   </div>
			   </div>
			   <div class="col-sm-12">
					<div class="col-sm-4">
						<label for="">Vision</label>
					</div>
					<div class="col-sm-8">
						 <textarea name="vision" id="vision" rows="10" cols="50" class="form-control"></textarea>
					</div>
				</div>
				<div class="col-sm-12">
						<div class="col-sm-4">
							<label for="">Reglamento</label>
						</div>
						<div class="col-sm-8">
							 <textarea name="reglamento" id="reglamento" rows="10" cols="50" class="form-control"></textarea>
						</div>
				</div>
				<div class="col-sm-12">
						<div class="col-sm-4">
							<label for="">Objetivos</label>
						</div>
						<div class="col-sm-8">
							 <textarea name="objetivos" id="objetivos" rows="10" cols="50" class="form-control"></textarea>
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
         <h4 class="modal-title">Editar Nivel de prioridad</h4>
       </div>
       <form action="" id="formularioedi">
       <div class="modal-body">
           <input type="hidden" name="idedi" id="idedi">
           <div class="row">
               
				<div class="col-sm-12">
						<div class="col-sm-4">
							<label for="">Empresa:</label>
						</div>
						<div class="col-sm-8">
							<select name="empresa_idedi" id="empresa_idedi" class="form-control">
								<option value="">--Selecione--</option>
								@foreach ($empresa as $mempresa)
									 <option value="{{ $mempresa->id }}">{{ $mempresa->razsoc }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-4">
							<label for="">Mision</label>
						</div>
						<div class="col-sm-8">
							 <textarea name="misionedi" id="misionedi" rows="10" cols="50" class="form-control"></textarea>
						</div>
					</div>
					<div class="col-sm-12">
						 <div class="col-sm-4">
							 <label for="">Vision</label>
						 </div>
						 <div class="col-sm-8">
							  <textarea name="visionedi" id="visionedi" rows="10" cols="50" class="form-control"></textarea>
						 </div>
					 </div>
					 <div class="col-sm-12">
							 <div class="col-sm-4">
								 <label for="">Reglamento</label>
							 </div>
							 <div class="col-sm-8">
								  <textarea name="reglamentoedi" id="reglamentoedi" rows="10" cols="50" class="form-control"></textarea>
							 </div>
					 </div>
					 <div class="col-sm-12">
							 <div class="col-sm-4">
								 <label for="">Objetivos</label>
							 </div>
							 <div class="col-sm-8">
								  <textarea name="objetivosedi" id="objetivosedi" rows="10" cols="50" class="form-control"></textarea>
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
<script src="{{ asset('/js/Infoempresa/index.js') }}" type="text/javascript"></script>

@endsection