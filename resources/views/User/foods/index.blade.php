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
    <div class="row">
        <div class="col-12">
            <h1 class="mt-4 mb-4">all food</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">thumb</th>
                        <th scope="col">name</th>
                        <th scope="col">price</th>
                        <th scope="col">ingredients</th>
                        <th scope="col">visible</th>
                        <th scope="col">quantity</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($foods as $food)
                        @if ($food->name!==null)
                            <tr>
                                <td>
                                    @if($food->thumb)
                                        <img src="{{ asset('storage/'.$food->thumb)}}" alt="{{ $food->name}}">
                                    @endif
                                </td>
                                <td>{{ $food['name'] }}</td>
                                <td>{{ $food['price'] }}</td>
                                <td>{{ $food['ingredients'] }}</td>
                                <td>{{ $food['visible'] }}</td>
                                <td>{{ $food['quantity'] }}</td>
                                <td>
                                    <a href="{{ route('user.foods.edit', $food['id']) }}"
                                        class="btn btn-warning">
                                        Modify
                                    </a>
                                    <form class="d-inline" method="post" onclick="return confirm('Questa azione è irreversibile!!! Sei sicuro di voler cancellare?')" action="{{ route('user.foods.destroy', $food['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    
</div>
@endsection