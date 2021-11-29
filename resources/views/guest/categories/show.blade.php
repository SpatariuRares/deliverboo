@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>{{$category->name}}</h1>
        @dump($category->user)
    </div>
@endsection