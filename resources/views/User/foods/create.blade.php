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

                    <div class="custom-file">
                        <label class="custom-file-label" id="imageUrl" for="image">image</label>
                        <input type="file" name="image" id="image" onchange="readURL(this)" class="custom-file-input @error('image') is-invalid @enderror" accept="image/*">
                    </div>
                    @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                    
                    
                    <div class="form-group">
                        <label for="ingredients">Ingredients</label>
                        <textarea type="text" name="ingredients" class="form-control" id="ingredients" placeholder="Enter ingredients">{{old('ingredients')}}</textarea>
                    </div>

                    <div class="form-check">
                        <input value="{{true}}" type="checkbox" name="visible" class="form-check-input" id="visible">
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