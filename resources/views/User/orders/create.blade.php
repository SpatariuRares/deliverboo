@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('user.orders.store')}}" method="post">
                    @csrf
                    @method('POST')
                    
                    <div class="form-group">
                      <label for="total">Total</label>
                      <input type="number" name="total" class="form-control" id="total" placeholder="Enter total" value="{{old('total')}}">
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{old('email')}}">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" id="address" placeholder="Enter address" value="{{old('address')}}">
                    </div>

                    <div class="form-group">
                        <label for="fullName">FullName</label>
                        <input type="text" name="fullName" class="form-control" id="fullName" placeholder="Enter fullName" value="{{old('fullName')}}">
                    </div>

                    <div class="form-group">
                        <label for="paymentStatus">paymentStatus</label>
                        {{-- da impostare non so come --}}
                        <input type="checkbox" name="paymentStatus" class="form-control" id="paymentStatus" value="{{true}}">
                    </div>
                      
                    <div class="form-group">
                        <p>Seleziona i food:</p>
                        @foreach ($foods as $food)
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="{{ 'food' . $food->id }}">{{ $food->name }}</label>
                                <input value="{{ $food->id }}" type="checkbox" name="food[]" class="form-check-input" id="{{'food' . $food->id}}">
                            </div>   
                        @endforeach
                    </div>


                    <button type="submit" class="btn btn-success my-3">Submit</button>
                </form>
            </div>
        </div>
    </div> 
@endsection