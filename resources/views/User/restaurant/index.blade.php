@extends('guest.restaurant.show')


@section('gestioneutenteregistrato')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Gestisci il tuo account</h1>
        </div>
        <div class="col-12 d-flex flex-wrap">
            <div class="mt-3 d-flex justify-content-lg-center col-12 col-lg">
                <button class="btn btn-success">
                    <a class="text-white" href="{{ route('user.orders.index') }}">
                        Visualizza i tuoi ordini
                    </a>
                </button>
            </div>
            <div class="mt-3 d-flex justify-content-lg-center col-12 col-lg">
                <button class="btn btn-success">
                    <a class="text-white" href="{{ route('user.foods.index') }}">
                        Visualizza i tuoi cibi
                    </a>
                </button>
            </div>
            <div class="mt-3 d-flex justify-content-lg-center col-12 col-lg">
                <button class="btn btn-success">
                    <a class="text-white" href="{{ route('user.foods.create') }}">
                        Aggiungi un piatto al menù
                    </a>
                </button>
            </div>
            <div class="mt-3 d-flex justify-content-lg-center col-12 col-lg">
                <button class="btn btn-warning">
                    <a class="text-white" href="{{ route('user.restaurant.edit', $user['slug']) }}">
                        Modify
                    </a>
                </button>
            </div>
            <form class="mt-3 d-flex justify-content-lg-center col-12 col-lg" method="post" onclick="return confirm('Questa azione è irreversibile!!! Sei sicuro di voler cancellare?')" action="{{ route('user.restaurant.destroy', $user['id']) }}">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger text-light" type="submit">Delete</button>
            </form>
        </div>
    </div>    
</div>
@endsection