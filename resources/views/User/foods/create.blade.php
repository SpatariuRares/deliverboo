@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('user.foods.store')}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    @method('POST')
                    
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{old('name')}}">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" id="price" placeholder="Enter price" value="{{old('price')}}">
                    </div>

                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ingredients">Ingredients</label>
                        <textarea type="text" name="ingredients" class="form-control" id="ingredients" placeholder="Enter ingredients">{{old('ingredients')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="visible">Visible</label>
                        <input type="checkbox" name="visible" class="form-control" id="visible" value="{{true}}" > 
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