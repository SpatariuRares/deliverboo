@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <canvas id="myChart" width="800" height="400"></canvas>
    </div>
<script>
    var labels = {!! json_encode($date) !!};
    let data = {!! json_encode($labels) !!};
</script>
    
    
@endsection