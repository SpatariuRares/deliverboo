@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('user.foods.update', $food->id)}}" method="post" enctype='multipart/form-data'>
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
                        <label for="image">image</label>
                        @if ($food['thumb'])
                            <img src="{{ asset('storage/'.$food->thumb)}}" alt="{{ $food->name}}">
                        @endif
                        <div class="custom-file">
                            <label class="custom-file-label" id="imageUrl" for="image">image</label>
                            <input type="file" name="image" id="image" onchange="readURL(this)" class="custom-file-input @error('image') is-invalid @enderror" accept="image/*">
                        </div>
                        @error('image')
                            <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <div class="form-check">
                            <input type="checkbox" name="deleteImage" class="form-check-input" id="deleteImage" value="{{true}}" > 
                            <label for="deleteImage" class="form-check-label">delete image</label>
                        </div>
                        @error('image')
                            <div class="alert alert-danger">{{message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ingredients">Ingredients</label>
                        <input value="{{ $food['ingredients']}}" type="text" name="ingredients" class="form-control" id="ingredients" placeholder="Enter ingredients">
                    </div>

                    <div class="form-check">
                        <input value="{{true}}" {{ $food['visible']?'checked':null}} type="checkbox" name="visible" class="form-check-input" id="visible" value="{{true}}">
                        <label for="visible" class="form-check-label"> Visible</label>
                    </div>
                    <button type="submit" class="btn btn-success my-3">Submit</button>
                </form>
            </div>
        </div>
    </div> 
    <script>
        function readURL(file){
            document.getElementById("imageUrl").innerHTML=file.value.substring(file.value.lastIndexOf('\\') + 1).toLowerCase()
        }
    </script>
@endsection