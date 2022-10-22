@extends('layout')
@section('content')
    <div class="container container-sm">
        <h1>Edit employee</h1>

        <section>
            <form action="{{ route('employees.update', $employee->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="name">name</label>
                        <input type="text" class="form-control" value="{{ $employee->name }}" name="title" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="title">email</label>
                        <input type="text" class="form-control" value="{{ $employee->email }}" name="email" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="title">mobile</label>
                        <input type="number" class="form-control" value="{{ $employee->mobile }}" name="mobile" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="base_salary">base salary</label>
                        <input type="number" class="form-control" value="{{ $employee->base_salary }}" name="title"
                            required>
                    </div>
                    <div class="form-group col-sm-6 text-center">
                        <button class="btn btn-primary">save</button>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
