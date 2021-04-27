<li class="nav-item {{ Request::is('userEmailsSends*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('userEmailsSends.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Emails</span>
    </a>
</li>
@if (Auth::user()->rol_id == 1 )
    <li class="nav-item {{ Request::is('userRegisters*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('userRegisters.index') }}">
            <i class="nav-icon icon-cursor"></i>
            <span>User Registers</span>
        </a>
    </li>
@endif
