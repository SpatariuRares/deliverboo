@extends('layouts.dashboard')


@section('content')
<style>
    a {
        color: black;
    }

    a:hover {
        color: grey;
    }
</style>

<div class="container">
    <div class="container-fluid">
        <div class="row g-3 d-flex">
                @foreach ($users as $user)
                    <div class="col-3">
                        <div class="img bg-dark rounded">
                            <img src="" alt="">
                        </div>
                        <div class="description py-2">
                            <a href="{{ route('restaurant.show', $user['id']) }}">
                                <h4>{{ $user['username'] }}</h4>
                            </a>
                            <p class="lh-1">
                                @foreach ($user->categories as $category)
                                    @if ($category == $user->categories->last())
                                        <a class="text-reset" href="{{ route('categories.show', $category['id']) }}">{{ $category->name }}</a>
                                    @else
                                        <a class="text-reset" href="{{ route('categories.show', $category['id']) }}">{{$category->name.', '}}</a>
                                    @endif
                                @endforeach
                            </p>
                            <p class="lh-1">{{ $user['address'] }}</p>
                        </div>
                    </div>  
                @endforeach
            </div>
        </div>
    </div>
@endsection