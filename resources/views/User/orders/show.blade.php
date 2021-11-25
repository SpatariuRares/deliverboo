@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>{{$detailOrder->total}}</h1>
        <h2>{{$detailOrder->email}}</h2>
        <h2>{{$detailOrder->address}}</h2>
        <h2>{{$detailOrder->fullName}}</h2>
        <h2>{{$detailOrder->paymentStatus}}</h2>
    </div>
@endsection