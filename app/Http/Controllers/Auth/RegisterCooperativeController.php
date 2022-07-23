<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterCooperativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register-cooperative');
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
        $id = mt_rand(1000, 9999);

        $cooperative = Cooperative::create([
            'id' => $id,
            'cities_id' => 1,
            'provinces_id' => 1,
            'nik' => $request->nik,
            'name' => $request->name,
            'since_year' => $request->since_year,
            'owner_name' => $request->owner_name,
            'company_name' => $request->company_name,
            'email' => $request->email,
            'website' => $request->website,
            'contact' => $request->contact,
            'fax' => $request->fax,
            'location' => $request->location,
            'status' =>  'notverified',
            'avatar' =>  'avatar-11.png', // logo cooperative
        ]);

        $user = User::create([
            'cooperative_id' => $id,
            'name' => $request->owner_name,
            'email' => $request->email,
            'password' => $request->password,
            'photo' =>  'avatar-11.png',
            'avatar' =>  'avatar-11.png',
            'role' =>  'Admin', // user photo
        ]);

        return $user;
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
        //
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
