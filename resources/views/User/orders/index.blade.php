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
    <a href="{{ route('user.statistic') }}"
        class="btn btn-info">
        statistic
    </a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="my-4">Ecco i tuoi ordini</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>total</th>
                            <th class="d-none d-lg-block">email</th>
                            <th>address</th>
                            <th>Full Name</th>
                            <th>foods</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($orders)!=0)
                            @foreach ($orders as $order)
                                    <tr>    
                                        <td>{{ $order['total'] }}</td>
                                        <td class="d-none d-lg-block">{{ $order['email'] }}</td>
                                        <td>{{ $order['address'] }}</td>
                                        <td>{{ $order['fullName'] }}</td>
                                        <td>
                                            @if ($order->foods)
                                                @foreach ($order->foods as $food)
                                                    @if ($food->last)
                                                        {{$food->name.', '}}
                                                    @else
                                                        {{$food->name}}
                                                    @endif
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user.orders.show', $order['id']) }}"
                                                class="btn btn-info">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
    
</div>
@endsection