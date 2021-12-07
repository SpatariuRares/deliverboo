@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid mb-5 px-5">
        <div class="row gx-4 mb-5">
            <div class="col-3 ml-3">
                <div class="img rounded">
                    @if($user->thumb)
                        <img class="img-thumbnail border-success" src="{{ asset('storage/'.$user->thumb)}}" alt="{{ $user->name}}">
                    @endif
                </div>
            </div>
            <div class="col-6 d-flex flex-column justify-content-center">
                <h1>{{$user->username}}</h1>
                <h5 class="text-muted">
                    @foreach ($user->categories as $category)
                        @if ($category == $user->categories->last())
                            <p class="text-reset">{{ $category->name }}</p>
                        @else
                            <p class="text-reset">{{$category->name.', '}}</p>
                        @endif
                    @endforeach
                </h5>
            </div>
        </div>
    </div>
    @guest     
        <div class="container-fluid px-5">
            <div class="row">
                <div class="col-12 mb-5">
                    <h2 class="ml-3">Menù</h2>
                </div>
            </div>
            <div class="row row-cols-3 p-5" id="app">
            </div>
        </div>
        @else
            @yield('gestioneutenteregistrato')
    @endguest
@endsection