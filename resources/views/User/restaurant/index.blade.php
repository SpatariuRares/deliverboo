@extends('guest.restaurant.show')


@section('gestioneutenteregistrato')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Gestisci il tuo account</h1>
        </div>
        <div class="col-12 d-flex justify-content-between">
            <div class="">
                <button class="btn p-2 btn-success">
                    <a class="text-white" href="{{ route('user.orders.index') }}">
                        Visualizza i tuoi ordini
                    </a>
                </button>
            </div>
            <div class="">
                <button class="btn p-2 btn-success">
                    <a class="text-white" href="{{ route('user.foods.index') }}">
                        Visualizza i tuoi cibi
                    </a>
                </button>
            </div>
            <div class="">
                <button class="btn p-2 btn-success">
                    <a class="text-white" href="{{ route('user.foods.create') }}">
                        Aggiungi un piatto al menù
                    </a>
                </button>
            </div>
            <div class="">
                <button class="btn p-2 btn-outline-secondary">
                    <a class="text-warning" href="{{ route('user.restaurant.edit', $user['slug']) }}">
                        Modify
                    </a>
                </button>
            </div>
            <form class="" method="post" onclick="return confirm('Questa azione è irreversibile!!! Sei sicuro di voler cancellare?')" action="{{ route('user.restaurant.destroy', $user['id']) }}">
                @csrf
                @method('DELETE')
                <button class="btn p-2 btn-outline-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>    
</div>
@endsection