<header>
    <div class="container-fluid">
        <div class="row p-2">
            <div class="col-3 d-flex justify-content-center">
                logo
            </div>
            <div class="col">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            @guest
                <div class="col-3 d-flex justify-content-center">
                    <a class="btn btn-success mx-3" href="{{ route('login') }}">Accedi</a>
                    @if (Route::has('register'))
                        <a class="btn btn-success mx-3" href="{{ route('register') }}">Registrati</a>
                    @endif
                </div>
                @else
                <div class="col-3 d-flex justify-content-center">
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form> 
                </div>           
            @endguest 
        </div>
    </div>
</header>