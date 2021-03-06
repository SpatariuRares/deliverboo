@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                
                <form action="{{route('user.restaurant.update', $user["slug"])}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Username</label>
                        <input type="text" name="username" class="form-control @error("title") is-invalid @enderror" value="{{ old("username", $user->username) }}">
                        @error("title")
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Address</label>
                        <input type="text" name="address" class="form-control @error("address") is-invalid @enderror" value="{{ old("address", $user->address) }}">
                        @error("title")
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                        
                    <div class="form-group">
                        <p>Seleziona le categorie:</p>
                        @foreach ($categories as $category)
                            <div class="form-check form-check-inline">
                                @if($errors->any())
                                <input
                                {{ in_array($category->id, old("category", [])) ? "checked" : null }}
                                value="{{ $category->id }}" id="{{ "category" . $category->id }}" type="checkbox" name="categories[]" class="form-check-input">
                                <label for="{{ "category" . $category->id }}" class="form-check-label">{{ $category->name }}</label>
                                @else
                                <input
                                {{ $user->categories->contains($category->id) ? "checked" : null }}
                                value="{{ $category->id }}" id="{{ "category" . $category->id }}" type="checkbox" name="categories[]" class="form-check-input">
                                <label for="{{ "category" . $category->id }}" class="form-check-label">{{ $category->name }}</label>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    {{-- <div class="form-group">
                        @if ($user['thumb'] != 'https://mod.go.ke/wp-content/uploads/2021/04/default-profile-pic.png')
                            <img src="{{ asset('storage/' .$user->thumb)}}" alt="{{ $user->name}}" id="image">
                        @elseif ($user['thumb'])
                            <img src="https://mod.go.ke/wp-content/uploads/2021/04/default-profile-pic.png">
                        @endif
                        
                        <input type="file" name='image' id='image' class="@error('image') is-invalid @enderror">
                        
                        @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div> --}}

                    <div class="input-group mb-3">
                        <div class="col-4">
                            @if ($user['thumb'] != 'https://mod.go.ke/wp-content/uploads/2021/04/default-profile-pic.png')
                                <img class="w-100" src="{{ asset('storage/' .$user->thumb)}}" alt="{{ $user->name}}" id="image">
                            @elseif ($user['thumb'])
                                <img src="https://mod.go.ke/wp-content/uploads/2021/04/default-profile-pic.png">
                            @endif
                        </div>
                        <div class="col-8">
                            <div class="custom-file">
                                <input class="custom-file-input" type="file" onchange="readURL(this)" name='image' id='image' accept="image/*" class="@error('image') is-invalid @enderror">
                                <label class="custom-file-label" id="imageUrl" for="image">Choose file</label>
                            </div>
                            @error('image')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                            <div class="form-check">
                                <input type="checkbox" name="deleteImage" id="deleteImage" class="form-check-input" @error('deleteImage') is-invalid @enderror>
                                <label class="form-check-label" for="deleteImage"> cancellare l'immagine </label>
                            </div>
                        </div>
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