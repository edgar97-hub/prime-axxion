@can('Manage-Users')
<li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('users.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Administrar usuarios</span>
    </a>
</li>
@endcan
@can('Manage-Roles')
<li class="nav-item {{ Request::is('roles*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('roles.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>administrar roles</span>
    </a>
</li>
@endcan

<li class="nav-item {{ Request::is('banners*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('banners.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Banners</span>
    </a>
</li>

 

<li class="nav-item nav-dropdown  {{ Request::is('solutions*') ? 'active' : '' }}" >
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="nav-icon icon-cursor"></i> Solution</a>
  <ul class="nav-dropdown-items">
    <li class="nav-item {{ Request::is('solutions.getView*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('solutions.getView',1) }}">
        <i class="nav-icon"></i>titulo</a>
    </li>
    <li class="nav-item {{ Request::is('solutions.getView*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('solutions.getView',2) }}">
        <i class="nav-icon"></i>tarjetas</a>
    </li>
    
    
  </ul>
</li>

 



<li class="nav-item {{ Request::is('calltoActions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('calltoActions.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>llamada a la acción</span>
    </a>
</li>
<li class="nav-item {{ Request::is('takeAxxions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('takeAxxions.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Take Axxions</span>
    </a>
</li>

<li class="nav-item nav-dropdown  {{ Request::is('nosotrosdetalles*') ? 'active' : '' }}" >
  <a class="nav-link nav-dropdown-toggle" href="#">
    <i class="nav-icon icon-cursor"></i> Nosotros</a>
  <ul class="nav-dropdown-items">
    <li class="nav-item {{ Request::is('nosotrosdetalles.section*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('nosotrosdetalles.section',1) }}">
        <i class="nav-icon"></i>Sección azúl</a>
    </li>
    <li class="nav-item {{ Request::is('nosotrosdetalles.section*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('imgs.getTextImg',2) }}">
        <i class="nav-icon"></i>fotografía institucional</a>
    </li>
    <li class="nav-item {{ Request::is('imgs.getTextImg*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('imgs.getTextImg',3) }}">
        <i class="nav-icon"></i>somos parte</a>
     </li>
    <li class="nav-item {{ Request::is('nosotrosdetalles.section*') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('imgs.getTextImg',4) }}">
        <i class="nav-icon"></i>bancos</a>
    </li>
    
  </ul>
</li>

 


 

<li class="nav-item {{ Request::is('ayudas*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('ayudas.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Ayudas</span>
    </a>
</li> 
{{-- 
   <li class="nav-item {{ Request::is('nosotros*') ? 'active' : '' }}">
    <nav>
      <ul id='menu'>
        <li>
          <span>Nosotros</span>
          <ul class='menus'>
        
            <li><a href="{{ route('nosotros.index') }}" >Sección </a></li>
            <li><a href="{{ route('nosotrosdetalles.index') }}" >Nosotros detalle </a></li>
         </ul>
        </li>
      </ul>
</nav>
           
</li>--}}

 
 <li class="nav-item {{ Request::is('imgs*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('imgs.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Imgs</span>
    </a>
</li>
