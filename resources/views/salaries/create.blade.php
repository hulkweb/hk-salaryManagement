@extends('layout')
@section('content')
    <div class="container container-sm">
        <h1>Create salaries</h1>

        <section>
            <form action="{{ route('salaries.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="title">Employee</label>
                        <select name="employee_id" id="" class="form-control">
                            @foreach ($employees as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-3">
                        <label for="month">month</label>
                        <input type="number" class="form-control" name="month" required>
                    </div>

                    <div class="form-group col-sm-3">
                        <label for="year">year</label>
                        <input type="number" class="form-control" name="year" required>
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="total_working_days">total working days</label>
                        <input type="number" class="form-control" name="total_working_days" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="total_leave_taken">total leave taken</label>
                        <input type="number" class="form-control" name="total_leave_taken" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="over_time">over time</label>
                        <input type="number" class="form-control" name="over_time" required>
                    </div>
                    <div class="form-group col-sm-6 text-center">
                        <button class="btn btn-primary">create</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
