<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">

            @if (auth()->user()->role_id == 1)
            <li><a href="{{ route('users') }}" class="ai-icon" aria-expanded="false">
                <i class="fa fa-users"></i>
                <span class="nav-text">Users</span>
            </a>
        </li>
        @endif
        <li><a href="{{ route('accounts') }}" class="ai-icon" aria-expanded="false">
            <i class="flaticon-013-checkmark"></i>
            <span class="nav-text">Accounts</span>
        </a>
    </li>

</div>
</div>
