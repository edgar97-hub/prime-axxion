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
<li class="nav-item {{ Request::is('calltoActions*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('calltoActions.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>llamada a la acción</span>
    </a>
</li>
