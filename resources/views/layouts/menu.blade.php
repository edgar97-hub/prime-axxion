@can('Manage-Users')
<li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}">
        <i class="nav-icon icon-user"></i>
        <span>Administrar usuarios</span>
    </a>
</li>
@endcan

<li class="nav-item {{ Request::is('banners*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('banners.index') }}">
        <i class="nav-icon fa fa-picture-o"></i>
        <span>Banners</span>
    </a>
</li>

<li class="nav-item nav-dropdown  {{ Request::is('solutions*') ? 'active' : '' }}" >
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="nav-icon fa fa-bullhorn"></i> Soluciones</a>
  <ul class="nav-dropdown-items">
    <li class="nav-item {{ Request::is('solutions.getView*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('solutions.getView',1) }}">
        <i class="nav-icon"></i>Titulo</a>
    </li>
    <li class="nav-item {{ Request::is('solutions.getView*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('solutions.getView',2) }}">
        <i class="nav-icon"></i>Tarjetas</a>
    </li>
    
    
  </ul>
</li>

<li class="nav-item {{ Request::is('calltoActions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('calltoActions.index') }}">
        <i class="nav-icon fa fa-phone"></i>
        <span>Llamada a la acción</span>
    </a>
</li>
<li class="nav-item {{ Request::is('takeAxxions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('takeAxxions.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Take Axxion</span>
    </a>
</li>

<li class="nav-item nav-dropdown  {{ Request::is('nosotrosdetalles*') ? 'active' : '' }}" >
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="nav-icon fa fa-user-secret"></i> Nosotros</a>
  <ul class="nav-dropdown-items">
    <li class="nav-item {{ Request::is('nosotrosdetalles.section*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('nosotrosdetalles.section',1) }}">
        <i class="nav-icon"></i>Sección azul</a>
    </li>
    <li class="nav-item {{ Request::is('nosotrosdetalles.section*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('imgs.getTextImg',2) }}">
        <i class="nav-icon"></i>Fotografía Inst.</a>
    </li>
    <li class="nav-item {{ Request::is('imgs.getTextImg*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('imgs.getTextImg',3) }}">
        <i class="nav-icon"></i>Somos parte</a>
     </li>
    <li class="nav-item {{ Request::is('nosotrosdetalles.section*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('imgs.getTextImg',4) }}">
        <i class="nav-icon"></i>Bancos</a>
    </li>
    
  </ul>
</li>

<li class="nav-item {{ Request::is('ayudas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('ayudas.index') }}">
        <i class="nav-icon fa fa-question-circle"></i>
        <span>Ayuda</span>
    </a>
</li> 
 
<li class="nav-item {{ Request::is('customerInquiries*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('customerInquiries.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Consultas de Clientes</span>
    </a>
</li>

 