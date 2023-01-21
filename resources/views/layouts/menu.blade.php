    <li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class=" fa fa-home"></i><span>Principal</span>
        </a>
    </li>
@if($op==0)

    <li class="side-menus {{ Request::is('usuarios*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('usuarios.index') }}"><i class="fas fa-user-graduate"></i><span>Usuarios</span></a>
    </li>

    <li class="side-menus {{ Request::is('materias*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('materias.index') }}"><i class="fas fa-list"></i><span>Materias</span></a>
    </li>

    <li class="side-menus {{ Request::is('carreras*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('carreras.index') }}"><i class="fa fa-address-book"></i><span>Carreras</span></a>
    </li>

    <li class="side-menus {{ Request::is('cursos*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('cursos.index') }}"><i class="fa fa-graduation-cap"></i><span>Cursos</span></a>
    </li>

    <li class="side-menus {{ Request::is('asignaCarreras*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('asignaCarreras.index') }}"><i class="fa fa-arrow-right"></i><span>Asigna Carreras</span></a>
    </li>

    <li class="side-menus {{ Request::is('horarios*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('horarios.index') }}"><i class="fas fa-list-alt"></i><span>Horarios</span></a>
    </li>
@endif
@if($op==1)
    <li class="side-menus {{ Request::is('materias*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('materias.index') }}"><i class="fas fa-list"></i><span>Materias</span></a>
    </li>

    <li class="side-menus {{ Request::is('cursos*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('cursos.index') }}"><i class="fa fa-graduation-cap"></i><span>Cursos</span></a>
    </li>

    <li class="side-menus {{ Request::is('horarios*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('horarios.index') }}"><i class="fas fa-list-alt"></i><span>Horarios</span></a>
    </li>
    
@endif
@if($op==2)

    <li class="side-menus {{ Request::is('horarios*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('horarios.docente') }}"><i class="fas fa-list-alt"></i><span>Horario</span></a>
    </li>

    <li class="side-menus {{ Request::is('aula_virtual') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('aula_virtual') }}"><i class="fas fa-bookmark"></i><span>Aula Virtual</span></a>
    </li>

@endif

