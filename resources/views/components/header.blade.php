<header>
    <div class="container">
        <div class="row p-2 justify-content-between">
            <div class="d-inline-flex justify-content-center h-100">
                <a href="{{ route('index') }}"><img src="{{asset('images/Logo_Deliveboo.PNG')}}" alt=""></a>
            </div>
            <div class="col-5 h-100 d-flex align-items-center search-bar">
                <form class="d-flex w-100 h-75">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    <input class="w-100" type="search" placeholder="Digita il ristorante che vuoi cercare" aria-label="Search">
                </form>
            </div>
            
            <div id="button-container" class="d-inline-flex justify-content-center align-items-center h-100">
                @guest
                    <div class=" d-inline-flex justify-content-center align-items-center">
                        <a class="accedi btn text-white " href="{{ route('login') }}"><i class="fas fa-home"></i> Accedi</a>
                        @if (Route::has('register'))
                            <a class="registrati btn mx-3" href="{{ route('register') }}">Registrati</a>
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