<nav class="navbar bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold text-white">Admin Dashboard</a>
        <form class="d-flex align-items-center" method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-danger" type="submit">Logout</button>
        </form>
    </div>
</nav>
