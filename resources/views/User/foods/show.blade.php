@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>{{$food->name}}</h1>
        <h2>{{$food->price}}</h2>
        <h2>{{$food->thumb}}</h2>
        <h2>{{$food->ingredients}}</h2>
        <h2>{{$food->visible}}</h2>
        <h2>{{$food->quantity}}</h2>
    </div>
@endsection