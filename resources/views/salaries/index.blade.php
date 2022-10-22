@extends('layout')
@section('content')
    <div class="container">
        <h2>Recent Salary</h2>


        <table class="table portal-table section asd">
            <thead>
                <tr>
                    <th>
                        Num
                    </th>
                    <th>
                        Employee
                    </th>
                    <th>
                        Month / Year
                    </th>
                    <th>
                        Worked / Total Working Days
                    </th>
                    <th>
                        Over Time
                    </th>
                    <th>
                        <a href="#" class="" data-pjax>Action</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($salaries as $i => $item)
                    <tr>
                        <th>
                            {{ $i + 1 }}
                        </th>
                        <th>
                            <a href="#" class="" data-pjax>{{ $item->employee->name }}</a>
                        </th>

                        <th>
                            <a href="#" class="" data-pjax>{{ $item->month }} / {{ $item->year }}</a>
                        </th>
                        <th>
                            <a href="#" class=""
                                data-pjax>{{ $item->total_working_days - $item->total_leave_taken }} days /
                                {{ $item->total_working_days }} days</a>
                        </th>
                        <th>
                            <a href="#" class="" data-pjax>{{ $item->over_time }} hours</a>
                        </th>
                        <th>

                            <form action="/salaries/{{ $item->id }}" method="POST" style="display: inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"
                                        aria-hidden="true"></i></button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-center p-2">{{ $salaries->links() }}</div>

    </div>
@endsection
