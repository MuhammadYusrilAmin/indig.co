<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cooperative;
use App\Models\User;
use Dipantry\Rajaongkir\Models\ROProvince;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RegisterCooperativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces  = ROProvince::all();
        return view('auth.register-cooperative')->with([
            'provinces' =>  $provinces
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
        $id = mt_rand(1000, 9999);
        return Validator::make($request, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // 'avatar' => ['required', 'image' ,'mimes:jpg,jpeg,png','max:1024'],
        ]);

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
            'password' => Hash::make($request->password),
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
