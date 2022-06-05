<ul class="nav justify-content-end">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link">Home</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('companies.index') }}" class="nav-link">Companies</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('clients.index') }}" class="nav-link">Clients</a>
    </li>
    <li class="nav-item">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            {{ csrf_field() }}
            <button type="submit" class="btn btn-primary nav-link">Logout</button>
        </form>
    </li>
</ul>
