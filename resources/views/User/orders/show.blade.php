@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>{{$order->total}}</h1>
        <h2>{{$order->email}}</h2>
        <h2>{{$order->address}}</h2>
        <h2>{{$order->fullName}}</h2>
        <h2>{{$order->paymentStatus}}</h2>
    </div>
@endsection