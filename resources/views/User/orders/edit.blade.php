@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('user.orders.update', $food->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                    <label for="total">Total</label>
                    <input value="{{ $food['total']}}" type="text" name="total" class="form-control" id="total" placeholder="Enter total">
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input value="{{ $food['email']}}" type="number" step="0.01" name="email" class="form-control" id="email" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input value="{{ $food['address']}}" type="text" name="address" class="form-control" id="address" placeholder="Enter address">
                    </div>

                    <div class="form-group">
                        <label for="fullName">FullName</label>
                        <input value="{{ $food['fullName']}}" type="text" name="fullName" class="form-control" id="fullName" placeholder="Enter fullName">
                    </div>

                    <div class="form-group">
                        <label for="paymentStatus">paymentStatus</label>
                        <input value="{{ $food['paymentStatus']}}" type="text" name="paymentStatus" class="form-control" id="paymentStatus" placeholder="Enter paymentStatus">
                    </div>
                    
                    <button type="submit" class="btn btn-success my-3">Submit</button>
                </form>
            </div>
        </div>
    </div> 
@endsection