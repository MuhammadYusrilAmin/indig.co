<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $address = Address::create([
            'user_id'          => Auth::user()->id,
            'location'         => $request->location,
            'name'             => $request->name,
            'phone'            => $request->phone,
            'address'          => $request->address,
            'rt'               => $request->rt,
            'rw'               => $request->rw,
            'zip_code'         => $request->zip_code,
            'province_id'      => $request->provinsi,
            'regencies_id'     => $request->kabupaten
        ]);

        $addresses = Address::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        $url = $request->url;
        if ($addresses == null) {
            if ($url != null) {
                return redirect('transaction/' . $url . '?id=' . $request->id_kabupaten);
            } else {
                return redirect('transaction?id=' . $request->id_kabupaten);
            }
        } else {
            if ($url != null) {
                return redirect('transaction/' . $url . '?id=' . $addresses->regencies_id);
            } else {
                return redirect('transaction?id=' . $addresses->regencies_id);
            }
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
        $address = Address::find($id);
        $address->location      = $request->location;
        $address->name          = $request->name;
        $address->phone         = $request->phone;
        $address->address       = $request->address;
        $address->rt            = $request->rt;
        $address->rw            = $request->rw;
        $address->zip_code      = $request->zip_code;
        $address->province_id   = $request->provinsi;
        $address->regencies_id  = $request->kabupaten;
        $address->update();
        $url = $request->url;
        $addresses = Address::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        if ($url != null) {
            return redirect('transaction/' . $url . '?id=' . $addresses->regencies_id);
        } else {
            return redirect('transaction?id=' . $addresses->regencies_id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $address =  Address::find($id);
        $address->delete();
        $url = $request->url;
        $addresses = Address::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->first();
        $url = $request->url;
        if ($addresses == null) {
            if ($url != null) {
                return redirect('transaction/' . $url . '?id=' . 1);
            } else {
                return redirect('transaction?id=' . 1);
            }
        } else {
            if ($url != null) {
                return redirect('transaction/' . $url . '?id=' . $addresses->regencies_id);
            } else {
                return redirect('transaction?id=' . $addresses->regencies_id);
            }
        }
    }
}
