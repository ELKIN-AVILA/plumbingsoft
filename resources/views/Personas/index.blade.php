@extends('adminlte::layouts.app')


@section('htmlheader_title')
  Trabajadores
@endsection

@section('contentheader_title')
  Trabajadores
@endsection

@section('main-content')
<div class="form-group">
   <button class="btn btn-primary" onclick="nuevo();">Nuevo</button>
</div>

<!-- nueva forma-->
<div class="row">
    @foreach($personas as $mper)
        <div class="col-sm-4">
                <div class="panel panel-success">
                        <div class="panel-heading" style="text-align:center;"><b>{{ $mper->priape }} {{ $mper->prinom }}</b></div>
                        <div class="panel-body">
                                <td><button class="btn btn-warning" onclick="editar({{ $mper->id }})" data-toggle="tooltip" data-placement="left" title="Editar" style="font-size:x-large;"><i class="fa fa-edit"></i></button><button class="btn btn-danger" onclick="eliminar({{ $mper->id }})" data-toggle="tooltip" data-placement="right" title="Eliminar" style="font-size:x-large;"><i class="fa fa-trash"></i></button><button class="btn btn-success" onclick="examenes({{ $mper->id }});"><img src="{{ asset('/img/examenes.png') }}" style="height:37px;"></button> </td>
                        </div>
                        <div class="panel-footer">
                            @foreach($cargos as $mcargo)
                                @if($mcargo->id==$mper->cargos_id)
                                 <p><b>Cargo</b>:{{ $mcargo->nombre }}</p>
                                @endif
                             @endforeach
                            
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
          <h4 class="modal-title">Crear Trabajador</h4>
        </div>
        <form  id="formulario">
        <div class="modal-body">
            <div class="row">
              <div class="col-sm-12">
                  <div class="col-sm-4">
                      <label for="">Tipo Documento:</label>
                  </div>
                  <div class="col-sm-8">
                      <select name="tipdoc_id" id="tipdoc_id" class="form-control">
                          <option value="">--Seleccione--</option>
                          @foreach ($tipdoc as $mtipdoc)
                            <option value="{{ $mtipdoc->id }}">{{ $mtipdoc->nombre }}</option>                              
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="col-sm-4">
                      <label for="">Numero Documento:</label>
                  </div>
                  <div class="col-sm-8">
                      <input type="text" id="numdoc" name="numdoc" class="form-control">
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="col-sm-4">
                      <label for="">Primer Nombre:</label>
                  </div>
                  <div class="col-sm-8">
                      <input type="text" id="prinom" name="prinom" class="form-control">
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="col-sm-4">
                      <label for="">Segundo Nombre:</label>
                  </div>
                  <div class="col-sm-8">
                      <input type="text" id="segnom" name="segnom" class="form-control">
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="col-sm-4">
                      <label for="">Primer Apellido:</label>
                  </div>
                  <div class="col-sm-8">
                      <input type="text" id="priape" name="priape" class="form-control">
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="col-sm-4">
                      <label for="">Segundo Apellido:</label>
                  </div>
                  <div class="col-sm-8">
                      <input type="text" id="segape" name="segape" class="form-control">
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="col-sm-4">
                      <label for="">Celular:</label>
                  </div>
                  <div class="col-sm-8">
                      <input type="number" id="celular" name="celular" class="form-control">
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="col-sm-4">
                      <label for="">Cargo:</label>
                  </div>
                  <div class="col-sm-8">
                      <select name="cargos_id" id="cargos_id" class="form-control">
                          <option value="">--Seleccione--</option>
                          @foreach ($cargos as $mcargo)
                              <option value="{{ $mcargo->id }}">{{ $mcargo->nombre }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="col-sm-4">
                      <label for="">Pais:</label>
                  </div>
                  <div class="col-sm-8">
                      <select name="pais_id" id="pais_id" class="form-control" onchange="departamentos(this);">
                          <option value="">--Seleccione--</option>
                          @foreach($pais as $mpais)
                            <option value="{{ $mpais->id }}">{{ $mpais->nombre }}</option>
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="col-sm-4">
                      <label for="">Departamentos:</label>
                  </div>
                  <div class="col-sm-8">
                      <select name="departamentos_id" id="departamentos_id" class="form-control" onchange="ciudades(this);"></select>
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="col-sm-4">
                      <label for="">ciudades:</label>
                  </div>
                  <div class="col-sm-8">
                      <select name="ciudades_id" id="ciudades_id" class="form-control"></select>
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
<!-- modal edit-->

<div class="modal fade" id="editar" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Editar Trabajador</h4>
            </div>
            <form  id="formularioedi">
            <div class="modal-body">
                <input type="hidden" name="idedi" id="idedi">
                <div class="row">
                  <div class="col-sm-12">
                      <div class="col-sm-4">
                          <label for="">Tipo Documento:</label>
                      </div>
                      <div class="col-sm-8">
                          <select name="tipdoc_idedi" id="tipdoc_idedi" class="form-control">
                              <option value="">--Seleccione--</option>
                              @foreach ($tipdoc as $mtipdoc)
                                <option value="{{ $mtipdoc->id }}">{{ $mtipdoc->nombre }}</option>                              
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="col-sm-4">
                          <label for="">Numero Documento:</label>
                      </div>
                      <div class="col-sm-8">
                          <input type="text" id="numdocedi" name="numdocedi" class="form-control">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="col-sm-4">
                          <label for="">Primer Nombre:</label>
                      </div>
                      <div class="col-sm-8">
                          <input type="text" id="prinomedi" name="prinomedi" class="form-control">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="col-sm-4">
                          <label for="">Segundo Nombre:</label>
                      </div>
                      <div class="col-sm-8">
                          <input type="text" id="segnomedi" name="segnomedi" class="form-control">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="col-sm-4">
                          <label for="">Primer Apellido:</label>
                      </div>
                      <div class="col-sm-8">
                          <input type="text" id="priapeedi" name="priapeedi" class="form-control">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="col-sm-4">
                          <label for="">Segundo Apellido:</label>
                      </div>
                      <div class="col-sm-8">
                          <input type="text" id="segapeedi" name="segapeedi" class="form-control">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="col-sm-4">
                          <label for="">Celular:</label>
                      </div>
                      <div class="col-sm-8">
                          <input type="number" id="celularedi" name="celularedi" class="form-control">
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="col-sm-4">
                          <label for="">Cargo:</label>
                      </div>
                      <div class="col-sm-8">
                          <select name="cargos_idedi" id="cargos_idedi" class="form-control">
                              <option value="">--Seleccione--</option>
                              @foreach ($cargos as $mcargo)
                                  <option value="{{ $mcargo->id }}">{{ $mcargo->nombre }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="col-sm-4">
                          <label for="">Pais:</label>
                      </div>
                      <div class="col-sm-8">
                          <select name="pais_idedi" id="pais_idedi" class="form-control" onchange="departamentosedi(this);">
                              <option value="">--Seleccione--</option>
                              @foreach($pais as $mpais)
                                <option value="{{ $mpais->id }}">{{ $mpais->nombre }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="col-sm-4">
                          <label for="">Departamentos:</label>
                      </div>
                      <div class="col-sm-8">
                          <select name="departamentos_idedi" id="departamentos_idedi" class="form-control" onchange="ciudadesedi(this);">
                            @foreach($departamentos as $mdepar)
                                <option value="{{ $mdepar->id }}">{{ $mdepar->nombre }}</option>
                            @endforeach
                          </select>
                      </div>
                  </div>
                  <div class="col-sm-12">
                      <div class="col-sm-4">
                          <label for="">ciudades:</label>
                      </div>
                      <div class="col-sm-8">
                          <select name="ciudades_idedi" id="ciudades_idedi" class="form-control">
                                @foreach($ciudades as $mciu)
                                <option value="{{ $mciu->id }}">{{ $mciu->nombre }}</option>
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
    <!-- modal examenes-->
    <div class="modal fade" id="examenes" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Asignar Examenes</h4>
            </div>
            <form action="" id="formularioexa">
            <div class="modal-body">
                <input type="hidden" name="idper" id="idper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <label for="">Examen:</label>
                        </div>
                        <div class="col-sm-8">
                            <select name="examen_id" id="examen_id" class="form-control">
                                <option value="">--Seleccione--</option>
                                @foreach($examenes as $mexamen)
                                    <option value="{{ $mexamen->id }}">{{ $mexamen->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="col-sm-4">
                            <label for="">Fecha:</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="date" name="fechaexa" id="fechaexa" class="form-control">
                        </div>
                    </div>
                    <div class="col-sm-12" style="text-align:end;">
                        <br>
                            <button class="btn btn-success" type="submit">Guardar</button>
                    </div>
                </div>
            </div>
            </form>
            <div class="modal-footer">
                <table class="table table-bordered" id="examenespersona">
                    <thead>
                        <th>Nombre Examen</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            
          </div>
          
        </div>
      </div>

    <!-- end modal--->
  @endsection

@section('script')
<script src="{{ asset('/js/Personas/index.js') }}" type="text/javascript"></script>

@endsection
