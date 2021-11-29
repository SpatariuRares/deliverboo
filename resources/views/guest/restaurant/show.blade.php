@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid p-5 mb-5">
        <div class="row gx-4 mb-5">
            <div class="col-4">
                <div class="img rounded">
                    <img src="" alt="">
                </div>
            </div>
            <div class="col">
                <h1>Nome ristorante</h1>
                <h4>Categorie ristorante</h4>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row row-cols-3 g-3">
            <div class="col-12">
                <h2>Menù</h2>
            </div>
            <div class="col p-4 border d-flex justify-content-between align-items-center">
                <div>
                    <h4>Titolo piatto</h4>
                    <p>ingredienti</p>
                    <p>prezzo</p>
                </div>
                <div class="test">
                    <img src="" alt="">
                </div>           
            </div>
        </div>
    </div>
@endsection