@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('user.orders.update', $order->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group">
                    <label for="total">Total</label>
                    <input value="{{ $order['total']}}" type="text" name="total" class="form-control" id="total" placeholder="Enter total">
                    </div>

                    <div class="form-group">
                        <label for="email">email</label>
                        <input value="{{ $order['email']}}" type="text" step="0.01" name="email" class="form-control" id="email" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input value="{{ $order['address']}}" type="text" name="address" class="form-control" id="address" placeholder="Enter address">
                    </div>

                    <div class="form-group">
                        <label for="fullName">FullName</label>
                        <input value="{{ $order['fullName']}}" type="text" name="fullName" class="form-control" id="fullName" placeholder="Enter fullName">
                    </div>

                    <div class="form-group">
                        <label for="paymentStatus">paymentStatus</label>
                        <input {{ $order['paymentStatus'] ? 'checked' : null}} value="{{ true }}" type="checkbox" name="paymentStatus" class="form-control" id="paymentStatus" placeholder="Enter paymentStatus">
                    </div>

                    {{-- da finire  --}}
                    <div class="form-group">
                        <p>Seleziona i food:</p>
                        @foreach ($foods as $food)
                            <div class="form-check form-check-inline">
                                <label class="form-check-label" for="{{ 'food' . $food->id }}">{{ $food->name }}</label>
                                <input {{ $food->visible ? 'checked' : null }} value="{{ true }}" type="checkbox" name="food" class="form-check-input" id="{{'food' . $food->id}}">
                            </div>   
                        @endforeach
                    </div>
                    
                    <button type="submit" class="btn btn-success my-3">Submit</button>
                </form>
            </div>
        </div>
    </div> 
@endsection