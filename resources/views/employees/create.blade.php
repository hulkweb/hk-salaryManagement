@extends('layout')
@section('content')
    <div class="container container-sm">
        <h1>Create Employee</h1>

        <section>
            <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="email" class="text-capitalize">email</label>
                        <input type="text" class="form-control" name="email" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="name" class="text-capitalize">name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="mobile" class="text-capitalize">mobile</label>
                        <input type="number" class="form-control" name="mobile" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="base_salary" class="text-capitalize">base salary</label>
                        <input type="number" class="form-control" name="base_salary" required>
                    </div>
                    <div class="form-group col-sm-10">Address </label>
                        <input type="text" class="form-control" name="address" required>
                    </div>

                    <div class="form-group col-sm-6 text-center">
                        <button class="btn btn-primary">create</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
