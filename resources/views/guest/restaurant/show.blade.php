@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid p-5 mb-5">
        <div class="row gx-4 mb-5">
            <div class="col-4">
                <div class="img rounded">
                    <img src="" alt="">
                </div>
            </div>
            <div class="col">
                <h1>{{$user->username}}</h1>
                <h4>
                    @foreach ($user->categories as $category)
                        @if ($category == $user->categories->last())
                            <a class="text-reset" href="{{ route('categories.show', $category['id']) }}">{{ $category->name }}</a>
                        @else
                            <a class="text-reset" href="{{ route('categories.show', $category['id']) }}">{{$category->name.', '}}</a>
                        @endif
                    @endforeach
                </h4>
            </div>
        </div>
    </div>

    
        
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-5">
                <h2>Menù</h2>
            </div>
        </div>
        <div class="row row-cols-3 g-3">
            @foreach ($user->foods as $food)
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
            @endforeach
        </div>
    </div>
@endsection