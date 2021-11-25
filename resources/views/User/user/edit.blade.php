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
                    
                    
                    
                    <button type="submit" class="btn btn-success my-3">Submit</button>
                </form>
            </div>
        </div>
    </div> 
@endsection