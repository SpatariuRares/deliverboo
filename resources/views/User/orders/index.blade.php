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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="my-4">Ecco i tuoi ordini</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">total</th>
                            <th scope="col">email</th>
                            <th scope="col">address</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">paymentStatus</th>
                            <th scope="col">foods</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            
                            <tr>
                                <th scope="row">{{ $order['id'] }}</th>
                                <td>{{ $order['total'] }}</td>
                                <td>{{ $order['email'] }}</td>
                                <td>{{ $order['address'] }}</td>
                                <td>{{ $order['fullName'] }}</td>
                                <td>{{ $order['paymentStatus'] }}</td>
                                <td>
                                    
                                    @if ($order->foods)
                                        @foreach ($order->foods as $food)
                                            @if ($food->last)
                                                {{$food->id}}
                                            @else
                                                {{$food->id.', '}}
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('user.orders.show', $order['id']) }}"
                                        class="btn btn-info">
                                        Details
                                    </a>
                                    <a href="{{ route('user.orders.edit', $order['id']) }}"
                                        class="btn btn-warning">
                                        Modify
                                    </a>
                                    <form class="d-inline" method="post" onclick="return confirm('Questa azione è irreversibile!!! Sei sicuro di voler cancellare?')" action="{{ route('user.orders.destroy', $order['id']) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
</div>
@endsection