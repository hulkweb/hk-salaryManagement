@extends('layout')
@section('content')
<h1>Welcome</h1>
<div class="header-responsive d-flex flex-wrap mb-4 mt-4" style="justify-content:space-between">


</div>
<div class="mt-2">
    <div class="row" id="data">

        <div class="col-sm-3 p-4">
            <a href="/employees" class="card m-0 p-0">
                <div class="card  shadow ">
                    <h1>{{ $employees }}</h1>
                    <h3>Employees</h3>
                </div>
            </a>
        </div>

        <div class="col-sm-3 p-4">
            <a href="#" class="card m-0 p-0">
                <div class="card shadow ">
                    <h1>{{ $this_month }} % </h1>
                    <h3>This month attendence</h3>
                </div>
            </a>
        </div>
        <div class="col-sm-3 p-4">
            <a href="#" class="card m-0 p-0">
                <div class="card shadow ">
                    <h1>{{ $last_month }} %</h1>
                    <h3>Last Month Attendence</h3>
                </div>
            </a>
        </div>
        

    </div>
</div>
@endsection