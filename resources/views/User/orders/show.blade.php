@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <canvas id="barChar" width="800" height="400"></canvas>
        <button id="btnMonth" class="mx-2 btn btn-primary">Month</button><button id="btnYear"class="mx-2 btn btn-primary">Year</button>
    </div>
    <div class="container">
        <canvas id="doughnutChar" width="800" height="400"></canvas>
    </div>
<script>
    let barLabelsMonth = {!! json_encode($dateMonth) !!};
    let barOrderDataMonth = {!! json_encode($labelsMonth) !!};
    let barLabelsYear = {!! json_encode($dateYear) !!};
    let barOrderDataYear = {!! json_encode($labelsYear) !!};
    let donOrderData = {!! json_encode($donData) !!};
    let donFoodLabels = {!! json_encode($donLabels) !!};
</script>
    
    
@endsection