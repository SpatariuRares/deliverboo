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
                        <input value="{{ $food['price']}}" type="number" step="0.01" name="price" class="form-control" id="price" placeholder="Enter price">
                    </div>

                    <div class="form-group">
                        <label for="thumb">Thumb</label>
                        <input type="file" name="thumb" id="thumb" class="form-control @error('thumb') is-invalid @enderror">
                    </div>

                    <div class="form-group">
                        <label for="ingredients">Ingredients</label>
                        <input value="{{ $food['ingredients']}}" type="text" name="ingredients" class="form-control" id="ingredients" placeholder="Enter ingredients">
                    </div>

                    <div class="form-group">
                        <label for="visible">Visible</label>
                        <input value="{{true}}" {{ $food['visible']?'checked':null}} type="checkbox" name="visible" class="form-control" id="visible">
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input value="{{ $food['quantity']}}" type="text" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity">
                    </div>
                    
                    <button type="submit" class="btn btn-success my-3">Submit</button>
                </form>
            </div>
        </div>
    </div> 
@endsection