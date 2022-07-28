<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
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
        $datas = User::where('role', 'Employee')->get()->sortByDesc('updated_at');

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
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'avatar' => 'required',
            'status' => 'required',
            'address' => 'required',
        ]);

        $image = $request->file('avatar');
        $new_image = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/images/outrusers'), $new_image);

        if ($request->hasfile('avatar')) {
            $employee = User::create([
                'cooperative_id' => $request->cooperative_id,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make('Employee' . date('dmy')), // Empolyee180722
                'avatar' => $new_image,
                'role' => 'Employee',
                'status' => $request->status,
                'address' => $request->address,
            ]);
        }

        if ($employee) {
            return redirect()->route('employees.index')->with('success', 'Employee added successfully');
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
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'status' => 'required',
            'address' => 'required',
        ]);

        if ($request->hasfile('avatar')) {
            $image = $request->file('avatar');
            $new_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images/users'), $new_image);

            $employee = User::find($id);
            $employee->cooperative_id = $request->cooperative_id;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->avatar = $request->avatar;
            $employee->status = $request->status;
            $employee->address = $request->address;
            $employee->update();
        } else {
            $employee = User::find($id);
            $employee->cooperative_id = $request->cooperative_id;
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->phone = $request->phone;
            $employee->status = $request->status;
            $employee->address = $request->address;
            $employee->update();
        }

        if ($employee) {
            return redirect('employees')->with('success', 'Employee updated successfully');
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
        $user = User::find($id);
        $location = 'assets/images/outrusers' . $user->avatar;
        if (File::exists($location)) {
            File::delete($location);
        }
        $user->delete();
        return redirect()->route('employees.index')->with('success', 'Data Barang Berhasil Di Hapus');
    }
}
