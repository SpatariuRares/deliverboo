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
        <h2 class="text-success my-5">Menù</h2>

        <div class="row">
            <div class="col-8">
                <div class="row row-cols-2">
                    @foreach ($user->foods as $food)
                        <div class="col border p-4">
                            <div>
                                <h4>{{$food->name}}</h4>
                                <p>{{$food->ingrediends}}</p>
                                <p>{{$food->price}}</p>
                            </div>
                            <div class="">
                                @if($food->thumb)
                                    <img src="{{ asset('storage/'.$food->thumb)}}" alt="{{ $food->name}}">
                                @endif
                            </div>           
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-4">
                <h3>Questa sarà la sezione del carrello</h3>
            </div>
        </div>
    </div>
@endsection