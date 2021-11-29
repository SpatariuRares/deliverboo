@extends('layouts.dashboard')

@section('content')
    <div class="container">
        @dd($user)
        <h1>{{$user->username}}</h1>
        @dump($user->id)
    </div>
@endsection