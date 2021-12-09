@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h2>Email: {{$detailOrder->email}}</h2>
        <h2>Indirizzo: {{$detailOrder->address}}</h2>
        <h2>Nome Cliente: {{$detailOrder->fullName}}</h2>
        <h2>Check pagament: {{$detailOrder->paymentStatus}}</h2>
        <hr>
        @foreach ($foods as $food)
            <h2>Cibo: {{ $food->name}}</h2>
            <h2>Prezzo: €{{ $food->price}}</h2>
            <h2>Ingredienti: {{ $food->ingredients}}</h2>
            <h2>Quantità: {{ $food->quantity}}</h2>
            <hr>
        @endforeach
        <h1>Totale: €{{$detailOrder->total}}</h1>
    </div>
@endsection