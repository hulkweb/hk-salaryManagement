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
                        Salary Made
                    </th>
                    <th>
                        <a>Action</a>
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
                            <span>{{ $item->employee->name }}</span>
                        </th>

                        <th>
                            <span>{{ $item->month }} / {{ $item->year }}</span>
                        </th>
                        <th>
                            <span href="#" class=""
                                data-pjax>{{ $item->total_working_days - $item->total_leave_taken }} days /
                                {{ $item->total_working_days }} days</span>
                        </th>
                        <th>
                            <span>{{ $item->over_time }} hours</span>
                        </th>
                        <th>
                            <span>INR {{ intval($item->total_salary_made) }} </span>
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
