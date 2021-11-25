@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('user.foods.update', $food->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                    <label for="name">Name</label>
                    <input value="{{ $food['name']}}" type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input value="{{ $food['price']}}" type="number" step="0.01" price="price" class="form-control" id="price" placeholder="Enter price">
                    </div>

                    <div class="form-group">
                        <label for="thumb">Thumb</label>

                        {{-- da inserire input per immagini --}}
                        {{-- <input type="text" thumb="thumb" class="form-control" id="thumb" placeholder="Enter thumb" value="{{old('thumb')}}"> --}}
                    </div>

                    <div class="form-group">
                        <label for="ingredients">ingredients</label>
                        <input value="{{ $food['ingredients']}}" type="text" ingredients="ingredients" class="form-control" id="ingredients" placeholder="Enter ingredients">
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input value="{{ $food['name']}}" type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input value="{{ $food['name']}}" type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                    </div>
                    
                    <button type="submit" class="btn btn-success my-3">Submit</button>
                </form>
            </div>
        </div>
    </div> 
@endsection