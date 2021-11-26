@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('user.user.update', $user["id"])}}" method="post">
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

                    
                    {{-- <div class="form-group">
                        <p>Seleziona la categoria</p>
                        <select name="category" id="category">
                            @foreach ($categories as $category)
                            <option 
                            value="{{ $category->id }}"
                            {{ old("category") == $category->id ? "selected" : null }}
                            >{{ $category->name }}</option>
                            @endforeach
                            @error("title")
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                    </div> --}}
                        
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
                        
                        
                    <button type="submit" class="btn btn-success my-3">Submit</button>
                    
                </form>
            </div>
        </div>
    </div> 
@endsection