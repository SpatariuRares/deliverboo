@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('user.foods.store')}}" method="post">
                    @csrf
                    @method('POST')
                    
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" id="price" placeholder="Enter price" value="{{old('price')}}">
                    </div>

                    <div class="form-group">
                        <label for="thumb">Thumb</label>
                        {{-- da inserire input per immagini --}}
                        {{-- <input type="text" name="thumb" class="form-control" id="thumb" placeholder="Enter thumb" value="{{old('thumb')}}"> --}}
                    </div>

                    <div class="form-group">
                        <label for="ingredients">Ingredients</label>
                        {{-- da ampliare a textarea --}}
                        <input type="text" name="ingredients" class="form-control" id="ingredients" placeholder="Enter ingredients" value="{{old('ingredients')}}">
                    </div>

                    <div class="form-group">
                        <label for="visible">Visible</label>
                        {{-- da impostare checkbox --}}
                        {{-- //risolvere bug --}}
                        <input type="checkbox" name="visible" class="form-control" id="visible" placeholder="Enter visible" value="{{'checked' ? true : false}}" > 
                    </div>

                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" name="quantity" class="form-control" id="quantity" placeholder="Enter quantity" value="{{old('quantity')}}">
                    </div>
                    <button type="submit" class="btn btn-success my-3">Submit</button>
                </form>
            </div>
        </div>
    </div> 
@endsection