<style>
    .nav-item {
        padding: 5px;
    }

</style>

<div>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Locadora</a>

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('customer.index') }}" class="btn btn-primary">Listar Clientes</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('movie.index') }}" class="btn btn-primary">Listar Filmes</a>
                </li>
                @if (!Auth::check())
                    <li class="nav-item">
                        <a href="{{ route('login.login') }}" class="btn btn-primary">Login</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login.logout') }}" class="btn btn-primary">Logout</a>
                    </li>
                @endif





            </ul>
        </div>
    </nav>
</div>



{{-- <div>
    <nav class="navbar navbar-light bg-light ">
        <a class="navbar-brand " href="#">Locadora</a>
        <div class="nav-item">
            <a href="{{ route('movie.index') }}" class="btn btn-secondary">Listar Filmes</a>
        </div>
        <div class="nav-item">
            <a href="{{ route('customer.index') }}" class="btn btn-secondary">Listar Clientes</a>
        </div>
    </nav>
</div> --}}
