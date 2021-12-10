@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4">
                <h5>Nome Cliente:</h5> <h2>{{$detailOrder->fullName}}</h2>
            </div>
            <div class="col-4">
                <h5>Email:</h5> <h2>{{$detailOrder->email}}</h2>
            </div>
            <div class="col-4">
                <h5>Indirizzo:</h5> <h2>{{$detailOrder->address}}</h2>
            </div>
        </div>
        <hr>
        <div class="row">
            @foreach ($foods as $food)
            <div class="col-6 p-3">
                <h2>Ordine: {{ $food->name}}</h2>
            </div>
            <div class="col-6 p-3">
                <h2>Ingredienti: {{ $food->ingredients}}</h2>
            </div>
            <div class="col-6 p-3">
                <h2>Quantità: {{ $food->quantity}}</h2>
            </div>
            <div class="col-6 p-3">
                <h2>Prezzo: €{{ $food->price}}</h2>
            </div>
            <hr class="col-12">
            @endforeach
        </div>
        <h1>Totale: {{$detailOrder->total}}€</h1>
    </div>
@endsection