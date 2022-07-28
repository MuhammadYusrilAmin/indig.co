<?php

namespace App\Http\Controllers;

use App\Models\Cooperative;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notverified = Cooperative::where('status', 'notverified')->orderBy('created_at', 'desc')->get();
        $verified = Cooperative::where('status', 'verified')->orderBy('created_at', 'desc')->get();
        $rejected = Cooperative::where('status', 'rejected')->orderBy('created_at', 'desc')->get();

        return view('super-admin.index')->with([
            'rejected'      => $rejected,
            'notverified'   => $notverified,
            'verified'      => $verified
        ]);
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
        //
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
        $cooperative = Cooperative::find($id);
        $cooperative->status = 'verified';

        $cek_email = User::where('email', $cooperative->email)->first();
        if ($cek_email == null) {
            $user = User::create([
                'cooperative_id' => $id,
                'name' => $cooperative->name,
                'email' => $cooperative->email,
                'password' => $cooperative->password,
                'avatar' => $cooperative->avatar,
                'role' =>  'Admin',
                'phone' => $cooperative->contact,
                'address' => $cooperative->location,
                'status' =>  'Active',
            ]);
            
        $cooperative->update();
            if ($user) {
                return redirect('dashboard-admin')->with('successfully', 'Cooperative verified successfully');
            } else {
                return redirect('dashboard-admin')->with('error', 'Cooperative failed to verified');
            }
        } else {
            return redirect('dashboard-admin')->with('error', 'Email Koprasi Sudah Pernah di gunakan');
        }
    }

    public function reject($id)
    {
        $cooperative = Cooperative::find($id);
        $cooperative->status = 'rejected';
        $cooperative->update();

        if ($cooperative) {
            return redirect('dashboard-admin')->with('successfully', 'Cooperative rejected successfully');
        } else {
            return redirect('dashboard-admin')->with('error', 'Cooperative failed to rejected');
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
        //
    }
}
