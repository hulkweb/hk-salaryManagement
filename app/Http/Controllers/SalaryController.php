<?php

namespace App\Http\Controllers;

use App\Jobs\SendMail;
use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::paginate(10);
        $data = ['salaries' => $salaries];
        return view('salaries.index', $data);
    }
    public function details()
    {
        $salaries = Salary::where("is_salary_calculated", 1)->orderBy("id", "desc")->paginate(10);
        $data = ['salaries' => $salaries];
        return view('salaries.details', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $employees = Employee::all();
        $data = ['employees' => $employees];
        return view('salaries.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $salary = Salary::where("employee_id", $request->employee_id)->where("year", $request->year)->where("month", $request->month)->count();
        if ($salary == 0) {
            $created = Salary::create($request->all());
            if ($created) {
                return redirect()->back()->with('success', 'Created Successfully');
            }
        }
        return redirect()->back()->with('errore', 'Something Went Wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $salary = Salary::find($id);
        $data = ['salary' => $salary];
        return view('salaries.show', $data);
    }
    public function destroy($id)
    {
        $salary = Salary::findOrFail($id);
        if ($salary) {
            $salary->delete();
        }
        return redirect()->back()->with('Deleted', 'Created Successfully');
    }
    public function calculate()
    {

        $salaries = Salary::where("is_salary_calculated", 0)->get();
        foreach ($salaries as $salary) {
            $employee_base_salary = $salary->employee->base_salary;
            $total_working_days = $salary->total_working_days;
            $total_leave_taken = $salary->total_leave_taken;
            $over_time = $salary->over_time;

            $per_day_salary = floatval($employee_base_salary / $total_working_days);
            $total_salary = ($per_day_salary * ($total_working_days - $total_leave_taken +  $over_time / 8));

            $salary->is_salary_calculated = 1;
            $salary->total_salary_made = number_format((float)$total_salary, 2, '.', '');
            $salary->save();
            $details=array();
            $details['email'] = $salary->employee->email;
            $details['salary'] = $salary;

            SendMail::dispatch($details);
        }
    }
    public function sendMail($salary_id)
    {
    }
}
