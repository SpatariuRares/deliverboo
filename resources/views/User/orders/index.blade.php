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
        class="btn btn-info mt-2 ml-3">
        Visualizza le tue statistiche
    </a>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="my-4">Ecco i tuoi ordini</h1>
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Nome Completo</th>
                            <th class="d-none d-lg-block">Email</th>
                            <th>Indirizzo</th>
                            <th>Ordinazione</th>
                            <th>Totale</th>
                            <th scope="col">Dettagli Ordine</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($orders)!=0)
                            @foreach ($orders as $order)
                                    <tr>    
                                        <td>{{ $order['fullName'] }}</td>
                                        <td class="d-none d-lg-block">{{ $order['email'] }}</td>
                                        <td>{{ $order['address'] }}</td>
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
                                        <td>{{ $order['total'] }}€</td>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('user.orders.show', $order['id']) }}"
                                                class="btn btn-info">
                                                <i class="fas fa-clipboard-list"></i>
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