
@extends('adminlte::layouts.app')


@section('htmlheader_title')
    Obras
@endsection

@section('contentheader_title')
   Obras
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
            <th>Estado</th>
            <th>Empresa </th>
            <th>Empresa Contratante</th>
           <th>Acciones</th>
       </thead>
       <tbody>
           @foreach($obras as $mobra)
               <tr>
                   <td>{{ $mobra->id }}</td>
                   <td>{{ $mobra->nombre }}</td>
                   @if($mobra->estado=="A")
                        <td>ACTIVO</td>
                   @else
                        <td>FINALIZADO</td>
                   @endif
                    @foreach($empresa as $mempre)
                        @if($mempre->id==$mobra->empresa_id)
                            <td>{{ $mempre->razsoc }}</td>
                        @endif
                    @endforeach
                    @foreach($empresactr as $memprectr)
                        @if($memprectr->id==$mobra->empresactr_id)
                            <td>{{ $memprectr->razsoc }}</td>
                        @endif
                    @endforeach
                   <td><button class="btn btn-warning" onclick="editar({{ $mobra->id }})" data-toggle="tooltip" data-placement="left" title="Editar"><i class="fa fa-edit"></i></button><button class="btn btn-danger" onclick="eliminar({{ $mobra->id }})" data-toggle="tooltip" data-placement="right" title="Eliminar"><i class="fa fa-trash"></i></button></td>
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
         <h4 class="modal-title">Crear Obra</h4>
       </div>
       <form action="" id="formulario">
       <div class="modal-body">
           <div class="row">
                <div class="col-sm-12">
                        <div class="col-sm-4">
                            <label for="">Empresa:</label>
                        </div>
                        <div class="col-sm-8">
                            <select name="empresa_id" id="empresa_id" class="form-control" disabled>
                                <!-- poner en uno cuano se valla a implementar--->
                                @foreach ($empresa as $memprectr)
                                    @if($memprectr->id=="2")  
                                        <option value="{{ $memprectr->id }}">{{ $memprectr->razsoc }}</option>
                                    @endif    
                                @endforeach
                            </select>
                        </div>
                    </div>
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
                       <label for="">Empresa Contratante:</label>
                   </div>
                   <div class="col-sm-8">
                       <select name="empresactr_id" id="empresactr_id" class="form-control">
                           <option value="">---Seleccione---</option>
                           @foreach ($empresactr as $memprectr)
                               <option value="{{ $memprectr->id }}">{{ $memprectr->razsoc }}</option>
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
         <h4 class="modal-title">Editar Obra</h4>
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
                    <label for="">Empresa Contratante:</label>
                </div>
                <div class="col-sm-8">
                    <select name="empresactr_idedi" id="empresactr_idedi" class="form-control">
                        <option value="">---Seleccione---</option>
                        @foreach ($empresactr as $memprectr)
                            <option value="{{ $memprectr->id }}">{{ $memprectr->razsoc }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
               <div class="col-sm-12">
                   <div class="col-sm-4">
                       <label for="">Estado:</label>
                   </div>
                   <div class="col-sm-8">
                           <select name="estado_id" id="estado_id" class="form-control">
                            <option value="">---Seleccione---</option>
                            <option value="A">ACTIVO</option>
                           <option value="F">FINALIZADA</option>
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
<script src="{{ asset('/js/Obras/index.js') }}" type="text/javascript"></script>

@endsection
