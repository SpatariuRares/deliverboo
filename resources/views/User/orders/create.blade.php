@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('user.categories.store')}}" method="post">
                    @csrf
                    @method('POST')
                    
                    <div class="form-group">
                      <label for="total">Total</label>
                      <input type="number" total="total" class="form-control" id="total" placeholder="Enter total" value="{{old('total')}}">
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="text" email="email" class="form-control" id="email" placeholder="Enter email" value="{{old('email')}}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" address="address" class="form-control" id="address" placeholder="Enter address" value="{{old('address')}}">
                    </div>

                    <div class="form-group">
                        <label for="fullName">FullName</label>
                        <input type="text" fullName="fullName" class="form-control" id="fullName" placeholder="Enter fullName" value="{{old('fullName')}}">
                    </div>

                    <div class="form-group">
                        <label for="paymentStatus">paymentStatus</label>
                        {{-- da impostare non so come --}}
                        <input type="text" paymentStatus="paymentStatus" class="form-control" id="paymentStatus" placeholder="Enter paymentStatus" value="{{old('paymentStatus')}}">
                    </div>
                      
                    <button type="submit" class="btn btn-success my-3">Submit</button>
                </form>
            </div>
        </div>
    </div> 
@endsection