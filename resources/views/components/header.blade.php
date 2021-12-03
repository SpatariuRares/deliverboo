<header style="background-color: white">
    <div class="container">
        <div class="row p-2 justify-content-around">
            <div class="d-inline-flex justify-content-center" style="height: 80px;">
                <a href="{{ route('index') }}"><img class="h-100" src="{{asset('images/Logo_Deliveboo.PNG')}}" alt=""></a>
            </div>
            {{-- <div class="col">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div> --}}
            
            <div class="d-inline-flex justify-content-center align-items-center">
                @guest
                    <div class=" d-inline-flex justify-content-center align-items-center">
                        <a class="btn btn-outline-secondary mx-3" href="{{ route('login') }}">Accedi</a>
                        @if (Route::has('register'))
                            <a class="btn btn-outline-secondary mx-3" href="{{ route('register') }}">Registrati</a>
                        @endif
                    </div>
                    @else
                    <div class="d-inline-flex justify-content-center">
                        <ul class="list-group list-unstyled flex-row">
    
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('user.restaurant.index')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form> 
                        </ul>
                    </div>
                @endguest 
            </div>
        </div>
    </div>
</header>