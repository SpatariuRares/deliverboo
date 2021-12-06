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
                            <a class="text-reset" href="{{ route('categories.show', $category['id']) }}">{{ $category->name }}</a>
                        @else
                            <a class="text-reset" href="{{ route('categories.show', $category['id']) }}">{{$category->name.', '}}</a>
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
                {{-- @foreach ($user->foods as $food)
                    <div class="col p-4 border d-flex justify-content-between align-items-center">
                        <div>
                            <h4>{{$food->name}}</h4>
                            <p>{{$food->ingrediends}}</p>
                            <p>{{$food->price}}</p>
                        </div>
                        <div class="test">
                            @if($food->thumb)
                                <img src="{{ asset('storage/'.$food->thumb)}}" alt="{{ $food->name}}">
                            @endif
                        </div>           
                    </div>
                @endforeach --}}
            </div>
        </div>
        @else
            @yield('gestioneutenteregistrato')
    @endguest
@endsection