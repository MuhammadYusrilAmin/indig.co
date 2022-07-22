<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Employee::all()->sortByDesc('updated_at');

        return view(
            'admin.employee.index',
            compact('datas'),
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->joining_date = $request->joining_date;
        $employee->status = $request->status;
        $employee->avatar = 'https://ui-avatars.com/api/?name=' . $request->name . '&background=random';
        $employee->update();

        if ($employee) {
            return redirect('employees')->with('successfully', 'Employee updated successfully');
        } else {
            return redirect('employees')->with('error', 'Employee failed to updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Employee::find($id);
        $product->delete();
        return redirect('employees')->with('successfully', 'Employee deleted successfully');
    }
}
