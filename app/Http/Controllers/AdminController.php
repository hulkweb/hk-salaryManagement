<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Salary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view("index");
    }
    public function login()
    {
        return view("login");
    }

    public function dashboard()
    {
        $employees = Employee::count();

        $this_month = 0;
        $total_this_month = 1;
        $total_this_month_attendence = 0;
        $salary_this_month = Salary::where("month", intval(date("m", strtotime("now"))))->get();
        foreach ($salary_this_month as $key => $salary) {
            $total_this_month += 1;
            $total_this_month_attendence +=  floatval($salary->leaves_taken / $salary->total_working_days);
        }
        $this_month = $total_this_month_attendence / $total_this_month;

        $last_month = 0;
        $total_last_month = 1;
        $total_last_month_attendence = 0;
        $salary_last_month = Salary::where("month", intval(date("m", strtotime("now"))) - 1)->get();
        foreach ($salary_last_month as $key => $salary) {
            $total_last_month += 1;
            $total_last_month_attendence +=  intval($salary->leaves_taken / $salary->total_working_days);
        }
        $last_month = $total_last_month_attendence / $total_last_month;

        $data = [
            'employees' => $employees,
            'this_month' => $this_month,
            'last_month' => $last_month,
        ];


        return view("dashboard", $data);
    }

    public function authenticate(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {
            return redirect(route('dashboard'))->with('success', 'Logged In');
        }
        return redirect(route('login'));
    }
}
