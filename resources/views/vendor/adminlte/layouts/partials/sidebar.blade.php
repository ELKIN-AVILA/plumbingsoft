<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <!--<form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Principal</span></a></li>
            <li class="treeview">
                    <a href="#"><i class="fa fa-cogs"></i><span>Configuracion Sistema</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                            <li><a href="{{ url('/Empresa') }}"><span>Empresa</span></a></li>
                            <li><a href="{{ url('/Infoempresa') }}"><span>Informacion de la Empresa</span></a></li>
                            <li><a href="{{ url('/Empresactr') }}"><span>Crear Empresa Contratante</span></a></li>
                            <li><a href="{{ url('/Obras') }}"><span>Crear Obras</span></a></li>
                            <li><a href="{{ url('/Etapas') }}"><span>Crear Etapas</span></a></li>
                            <li><a href="{{ url('/Secciones') }}"><span>Crear Secciones</span></a></li>
                            <li><a href="{{ url('/Tipedificacion') }}"><span>Crear Tipo de Edificacion</span></a></li>
                            <li><a href="{{ url('/Casas') }}"><span>Crear Casas</span></a></li>

                            <!--cargos -->
                            <li><a href="{{ url('/Cargos') }}"><span>Crear Cargos</span></a></li>
                            <li><a href="{{ url('/Personas') }}"><span>Crear Trabajadores</span></a></li>

                            <li><a href="{{ url('/Tipherra') }}"><span>Crear Tipo de Herramienta</span></a></li>
                            <li><a href="{{ url('/Herramientas') }}"><span>Crear Herramientas</span></a></li>
                            <li><a href="{{ url('/Tipoexa') }}"><span>Crear Tipo de Examen</span></a></li>
                            <li><a href="{{ url('/Examenes') }}"><span>Crear Examenes</span></a></li>

                    </ul> 
            </li>
            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
