<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterCooperativeController extends Controller
{
    public function index()
    {
        return view('auth.register-cooperative');
    }

    public function create(array $data)
    {
        return User::create([
            'nik' => $data['nik'],
            'username' => $data['username'],
            'since_year' => $data['since_year'],
            'owner_name' => $data['owner_name'],
            'company_name' => $data['company_name'],
            'email' => $data['email'],
            'website' => $data['website'],
            'contact' => $data['contact'],
            'fax' => $data['fax'],
            'location' => $data['location'],
            'password' => $data['password'],
            'photo' =>  'avatar-11.png',
            'logo' =>  'avatar-11.png',
            'role' =>  'Admin',
        ]);
    }
}
