<header>
    <div class="container">
        <div class="row p-2 justify-content-between">
            <div class="h-100">
                <a href="{{ route('index') }}"><img src="{{asset('images/Logo_Deliveboo.PNG')}}" alt=""></a>
            </div>
            {{-- <div class="col-5 h-100 d-flex align-items-center search-bar">
                <form class="d-flex w-100 h-75">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    <input class="w-100" type="search" placeholder="Digita il ristorante che vuoi cercare" aria-label="Search">
                </form>
            </div>
            --}}
            <div id="search">

            </div>
            <div id="button-container" class="d-inline-flex justify-content-center align-items-center h-100">
                @guest
                    <div class=" d-inline-flex justify-content-center align-items-center">
                        <a class="accedi btn text-white" href="{{ route('login') }}"><i class="fas fa-home"></i><span class="d-none d-sm-inline">Accedi</span></a>
                        @if (Route::has('register'))
                            <a class="registrati btn mx-3" href="{{ route('register') }}">Registrati</a>
                        @endif
                    </div>
                    @else
                    <div class="d-inline-flex justify-content-center align-items-center">
                        <ul class="list-group list-unstyled flex-row">
    
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.restaurant.index')}}">
                                    <i class="fas fa-user-alt fa-2x" style="color: #14D0C1"></i>
                                </a>
                            </li>
                            <li>
                                <a class="btn btn-outline-danger" href="{{ route('logout') }}"
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