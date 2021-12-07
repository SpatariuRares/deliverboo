@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <canvas id="barChar" width="800" height="400"></canvas>
    </div>
    <div class="container">
        <canvas id="doughnutChar" width="800" height="400"></canvas>
    </div>
<script>
    var barLabels = {!! json_encode($date) !!};
    let barOrderData = {!! json_encode($labels) !!};
    let donOrderData = {!! json_encode($donData) !!};
    let donFoodLabels = {!! json_encode($donLabels) !!};
</script>
    
    
@endsection