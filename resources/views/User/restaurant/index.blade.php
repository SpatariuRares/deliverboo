@extends('guest.restaurant.show')


@section('gestioneutenteregistrato')
<div class="container">
    <div class="row">
        <div class="col-12 mb-3">
            <h1>Gestisci il tuo account</h1>
        </div>
        <div class="col-12 d-flex justify-content-between">
            <div class="col-6">
                <button class="btn p-2 btn-success">
                    <a class="text-white text-decoration-none" href="{{ route('user.orders.index') }}">
                        Visualizza i tuoi ordini
                    </a>
                </button>
                <button class="btn p-2 btn-success">
                    <a class="text-white text-decoration-none" href="{{ route('user.foods.index') }}">
                        Visualizza i tuoi cibi
                    </a>
                </button>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a class="text-decoration-none btn p-2 btn-outline-info" href="{{ route('user.restaurant.edit', $user['slug']) }}">
                    Modify
                </a>
                <form class="ml-2" method="post" onclick="return confirm('Questa azione è irreversibile!!! Sei sicuro di voler cancellare?')" action="{{ route('user.restaurant.destroy', $user['id']) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn p-2 btn-outline-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>    
</div>
@endsection