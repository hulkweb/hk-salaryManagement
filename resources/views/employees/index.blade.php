@extends('layout')
@section('content')
    <div class="container">
        <h2>Empoyees</h2>


        <table class="table portal-table section asd">
            <thead>
                <tr>
                    <th>
                        Num
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        Mobile
                    </th>
                    <th>
                        Base Salary
                    </th>
                    <th>
                        <a href="#" class="" data-pjax>Action</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $i => $employee)
                    <tr>
                        <th>
                            {{ $i + 1 }}
                        </th>
                        <th>
                            <a href="#" class="" data-pjax>{{ $employee->name }}</a>
                        </th>

                        <th>
                            <a href="#" class="" data-pjax>{{ $employee->email }}</a>
                        </th>
                        <th>
                            <a href="#" class="" data-pjax>{{ $employee->mobile }}</a>
                        </th>
                        <th>
                            <a href="#" class="" data-pjax>{{ $employee->base_salary }}</a>
                        </th>
                        <th>
                            <a href="/employees/{{ $employee->id }}" class="btn btn-light btn-sm"><i class="fa fa-eye"
                                    aria-hidden="true"></i></a>
                            <a href="/employees/{{ $employee->id }}/edit" class="btn btn-primary btn-sm"><i
                                    class="fa fa-pencil" aria-hidden="true"></i></a>
                            <form action="/employees/{{ $employee->id }}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button type="su" class="btn btn-danger btn-sm"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center p-2">{{ $employees->links() }}</div>

    </div>
@endsection
