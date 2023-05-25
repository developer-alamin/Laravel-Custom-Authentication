@extends('admin.layout.app')
@section('title', 'Admin | Pannel')
@section('content')
    <div class="homeDiv"><br>
        <div class="row" id="pannelRow">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4>All Users</h4>
                        <h3>{{ $usersData; }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Verifyed Users</h4>
                        <h3>{{ $verifyData; }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h4>Non Verifyed</h4>
                        <h3>{{ $nonVerify; }}</h3>
                    </div>
                </div>
            </div>
        </div>
        <br>
	<div class="chartDiv">
		<div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Verifyed Users
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                       Non Veriyed Users
                    </div>
                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                </div>
            </div>
        </div>
	</div>
    </div>
@endsection

@section('chartScript')
<script type="text/javascript">
    /*chart bar custom js start form here*/
    var _YverifyChartarea = JSON.parse('{!! json_encode($verifyDays) !!}');
    var _XverifyChartarea = JSON.parse('{!! json_encode($verifydaysCount) !!}');
    /*chart bar custom js end form here*/
    


</script>
@endsection