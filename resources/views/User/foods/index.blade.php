@extends('layouts.dashboard')


@section('content')
<div class="container">
    @if (session('updated'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('updated') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session('inserted'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('inserted') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif
    @if (session('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('deleted') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif
    <div class="row mb-3">
        <div class="col-12">
            <div class="">
                <button class="btn p-2 btn-success">
                    <a class="text-white text-decoration-none" href="{{ route('user.foods.create') }}">
                        Aggiungi un piatto al menù
                    </a>
                </button>
            </div>
        </div>
    </div>    
    <div class="row">
        @foreach ($foods as $food)
            @if ($food->name !=null)
                <div class="col-4 p-2 d-flex">
                    <div class="border rounded flex-fill d-flex">
                        <div class="container-fluid d-flex flex-column justify-content-between">
                            <div class="row p-2">
                                <div class="w-50">
                                    @if($food->thumb)
                                        <img class="figure-img img-fluid" src="{{ asset('storage/'.$food->thumb)}}" alt="{{ $food->name}}">
                                    @endif
                                </div>
                                <div class="w-50 d-flex flex-column justify-content-between align-items-center">
                                    <span class="fw-bold text-truncate">{{ $food['name'] }}</span>
                                    <span>{{ $food['ingredients'] }}</span>
                                    <span class="">{{ $food['price'] }}€</span>
                                    <span class="">Acquistabile: {{ $food['visible'] }}</span>  
                                </div>
                            </div>
                            <div class="row p-2">
                                <div class="col-6 d-flex justify-content-center">
                                    <a href="{{ route('user.foods.edit', $food['id']) }}" class="btn btn-warning">
                                        Modify
                                    </a>
                                </div>
                                <div class="col-6 d-flex justify-content-center">
                                    <form class="d-inline" method="post" onclick="return confirm('Questa azione è irreversibile!!! Sei sicuro di voler cancellare?')" action="{{ route('user.foods.destroy', $food['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
            @endif
        @endforeach
    </div>
</div>
@endsection