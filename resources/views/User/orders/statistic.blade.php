@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class=" col-12 col-lg-8">
                <canvas id="barChar" width="800" height="400"></canvas>
                <div>
                    <button id="btnMonth" class="mx-2 btn btn-primary">Guarda statistiche mensili</button><button id="btnYear"class="mx-2 btn btn-primary">Guarda statistiche annuali</button>
                </div>
            </div>
            <div class=" col-12 col-lg-4">
                <canvas id="doughnutChar" width="800" height="400"></canvas>
            </div>
        </div>
    </div>
<script>
    @isset($dateMonth)
        let barLabelsMonth = {!! json_encode($dateMonth) !!};
        let barOrderDataMonth = {!! json_encode($labelsMonth) !!};
        let barLabelsYear = {!! json_encode($dateYear) !!};
        let barOrderDataYear = {!! json_encode($labelsYear) !!};
        let donOrderData = {!! json_encode($donData) !!};
        let donFoodLabels = {!! json_encode($donLabels) !!};
    @endisset
</script>
    
    
@endsection