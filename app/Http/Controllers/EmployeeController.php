<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    public function index()
    {
        $datas = Employee::all()->sortByDesc('updated_at');

        return view(
            'admin.employee.index',
            compact('datas'),
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'cooperative_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'joining_date' => 'required',
            'status' => 'required',
            'password' => 'required',
            'avatar' => 'required',
        ]);

        $employee = Employee::create([
            'user_id' => 1,
            'cooperative_id' => 1,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'joining_date' => $request->joining_date,
            'status' => $request->status,
            'password' => Hash::make('Employee' . date('dmy')), // Empolyee180722
            'avatar' => 'https://ui-avatars.com/api/?name=' . $request->name . '&background=random',
        ]);

        if ($employee) {
            return redirect('employees')->with('successfully', 'Employee added successfully');
        } else {
            return redirect('employees')->with('error', 'Employee failed to add');
        }
    }
}
