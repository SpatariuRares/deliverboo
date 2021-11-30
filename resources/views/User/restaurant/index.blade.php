@extends('layouts.dashboard')


@section('content')
<div class="container">
    @if (session('updated'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('updated') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session('inserted'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('inserted') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif
    @if (session('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('deleted') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
    </div>
    @endif
    <div class="row">
        <div class="col-12">
            <h1 class="mt-4 mb-4">Info Account</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">username</th>
                        <th scope="col">image</th>
                        <th scope="col">categorie</th>
                        <th scope="col">address</th>
                        <th scope="col">email</th>
                        <th scope="col">P.iva</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($users as $user) --}}
                        <tr>
                            <th scope="row">{{ $user['id'] }}</th>
                            <td>{{ $user['username'] }}</td>
                            <td>
                                @if ($user['thumb'] != 'https://mod.go.ke/wp-content/uploads/2021/04/default-profile-pic.png')
                                    <img src="{{ asset('storage/' .$user->thumb)}}" alt="{{ $user->name}}">
                                @elseif ($user['thumb'])
                                    <img src="https://mod.go.ke/wp-content/uploads/2021/04/default-profile-pic.png">
                                @endif
                            </td>
                            <td>
                                @foreach ($user->categories as $category)
                                    @if ($category == $user->categories->last())
                                        <a class="text-reset" href="">{{ $category->name }}</a>
                                    @else
                                        <a class="text-reset" href="">{{$category->name.', '}}</a>
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $user['address'] }}</td>
                            <td>{{ $user['email'] }}</td>
                            <td>{{ $user['PIVA'] }}</td>
                            <td>
                                <a href="{{ route('user.restaurant.edit', $user['slug']) }}"  class="btn btn-warning">
                                    Modify
                                </a>
                                <form class="d-inline" method="post" onclick="return confirm('Questa azione è irreversibile!!! Sei sicuro di voler cancellare?')" action="{{ route('user.restaurant.destroy', $user['id']) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>
    
    
</div>
@endsection