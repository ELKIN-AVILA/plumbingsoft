@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Casas
@endsection

@section('contentheader_title')
   Casas
@endsection

@section('main-content')
<div class="form-group">
   <button class="btn btn-primary" onclick="nuevo();">Nuevo</button>
</div>
<div class="row">
    @foreach($obras as $mobra)
    <div class="col-sm-4">
        <div class="panel panel-success">
            <div class="panel-heading" style="text-align:center;">Obra: {{ $mobra->nombre }}</div>
            <div class="panel-body">
                <button class="btn btn-info" onclick="casas({{ $mobra->id }});">Ver Casas</button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="modal fade" id="nuevo" role="dialog">
   <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Crear Casas</h4>
       </div>
       <form action="" id="formulario">
       <div class="modal-body">
           <div class="row">
            <div class="col-sm-12">
                <div class="col-sm-4">
                    <label for="">Obra:</label>
                </div>
                <div class="col-sm-8">
                    <select name="obras_id" id="obras_id" class="form-control" onchange="traeetapa(this);">
                        <option value="">---Seleccione---</option>
                        @foreach($obras as $mobra)
                            <option value="{{ $mobra->id }}">{{ $mobra->nombre }}</option>
                        @endforeach
                    </select>
                </div>
           </div>
           <div class="col-sm-12">
               <div class="col-sm-4">
                   <label for="">Etapa:</label>
               </div>
               <div class="col-sm-8">
                   <select name="etapas_id" id="etapas_id" class="form-control" onchange="traesecciones(this);">
                   </select>
               </div>
           </div>
           <div class="col-sm-12">
               <div class="col-sm-4">
                   <label for="">Seccion:</label>
               </div>
               <div class="col-sm-8">
                   <select name="secciones_id" id="secciones_id" class="form-control">

                   </select>
               </div>
           </div>
           <div class="col-sm-12">
               <div class="col-sm-4">
                   <label for="">Tipo de Edificacion:</label>
               </div>
               <div class="col-sm-8">
                   <select name="tipedificacion_id" id="tipedificacion_id" class="form-control">
                       <option value="">---Seleccione---</option>
                       @foreach($tipedificacion as $mtip)
                            <option value="{{ $mtip->id }}">{{ $mtip->nombre }}</option>
                       @endforeach
                   </select>
               </div>
           </div>
           <div class="col-sm-12">
               <div class="col-sm-4">
                   <label for="">Cantidad:</label>
               </div>
               <div class="col-sm-8">
                   <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" max="999">
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
<script src="{{ asset('/js/Casas/index.js') }}" type="text/javascript"></script>

@endsection