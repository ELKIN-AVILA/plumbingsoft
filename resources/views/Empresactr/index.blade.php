@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Empresa Contratante
@endsection

@section('contentheader_title')
   Empresa Contratante
@endsection

@section('main-content')
<div class="form-group">
   <button class="btn btn-primary" onclick="nuevo();">Crear</button>
</div>	
<!-- Table-->
<div class="panel panel-info">
		<!-- Default panel contents -->
	<div class="panel-heading">Listado de Empresas Contratantes</div>
<table class="table table-bordered" id="datos">
       <thead>
		   <th>#</th>
		   <th>Nit</th>
		   <th>Razon social</th>
		   <th>Correo</th>
		   <th>Celular</th>
           <th>Acciones</th>
       </thead>
       <tbody>
           @foreach($empresa as $mempre)
               <tr>
				   <td>{{ $mempre->id }}</td>
				   <td>{{ $mempre->nit }}</td>
				   <td>{{ $mempre->razsoc }}</td> 
				   <td>{{ $mempre->correo }}</td>
				   <td>{{ $mempre->celular }}</td>
                   <td><button class="btn btn-warning" onclick="editar({{ $mempre->id }})" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fa fa-edit"></i></button><button class="btn btn-danger" onclick="eliminar({{ $mempre->id }})" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-trash"></i></button></td>
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
         <h4 class="modal-title">Crear Empresa Contrante</h4>
       </div>
       <form action="" id="formulario">
       <div class="modal-body">
           <div class="row">
               <div class="col-sm-12">
				   <div class="col-sm-4">
					   <label for="">Nit:</label>
				   </div>
				   <div class="col-sm-8">
					   <input type="text" id="nit" name="nit" class="form-control">
				   </div>
			   </div>
               <div class="col-sm-12">
				   <div class="col-sm-4">
					   <label for="">Razon Social:</label>
				   </div>
				   <div class="col-sm-8">
					   <input type="text" id="razonsoc" name="razonsoc" class="form-control">
				   </div>
			   </div>
			   <div class="col-sm-12">
				   <div class="col-sm-4">
					   <label for="">Correo:</label>
				   </div>
				   <div class="col-sm-8">
					   <input type="email" name="correo" id="correo" class="form-control">
				   </div>
			   </div>
			   <div class="col-sm-12">
				   <div class="col-sm-4">
					   <label for="">Celular:</label>
				   </div>
				   <div class="col-sm-8">
					   <input type="text" name="celular" id="celular" class="form-control"> 
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
         <h4 class="modal-title">Editar Empresa Contratante</h4>
       </div>
       <form action="" id="formularioedi">
       <div class="modal-body">
           <input type="hidden" name="idedi" id="idedi">
           <div class="row">
               
				<div class="col-sm-12">
						<div class="col-sm-4">
							<label for="">Nit:</label>
						</div>
						<div class="col-sm-8">
							<input type="text" id="nitedi" name="nitedi" class="form-control">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-4">
							<label for="">Razon Social:</label>
						</div>
						<div class="col-sm-8">
							<input type="text" id="razonsocedi" name="razonsocedi" class="form-control">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-4">
							<label for="">Correo:</label>
						</div>
						<div class="col-sm-8">
							<input type="email" name="correoedi" id="correoedi" class="form-control">
						</div>
					</div>
					<div class="col-sm-12">
						<div class="col-sm-4">
							<label for="">Celular:</label>
						</div>
						<div class="col-sm-8">
							<input type="text" name="celularedi" id="celularedi" class="form-control"> 
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
<script src="{{ asset('/js/Empresactr/index.js') }}" type="text/javascript"></script>

@endsection