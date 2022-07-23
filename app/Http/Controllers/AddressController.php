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
        $provinsi = Province::where('id', $request->provinsi)->first();
        $kabupaten = Regency::where('id', $request->kabupaten)->first();
        $kecamatan = District::where('id', $request->kecamatan)->first();
        $desa = Village::where('id', $request->desa)->first();
        if ($provinsi) {
            $namaProvinsi =   $provinsi->name . ' ';
        } else {
            $namaProvinsi =  null;
        }

        if ($kabupaten) {
            $namaKabupaten =   $kabupaten->name . ', ';
        } else {
            $namaKabupaten =  null;
        }

        if ($kecamatan) {
            $namaKecamatan =   $kecamatan->name . ', ';
        } else {
            $namaKecamatan =  null;
        }

        if ($desa) {
            $namaDesa =   $desa->name . ', ';
        } else {
            $namaDesa =  null;
        }

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
            'regencies_id'     => $request->id_kabupaten,
            'district_id'      => $request->id_kecamatan,
            'village_id'       => $request->id_desa,
        ]);

        $url = $request->url;
        if ($url != null) {
            return redirect('transaction/' . $url);
        } else {
            return redirect('transaction');
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
        $address->regencies_id  = $request->id_kabupaten;
        $address->district_id   = $request->id_kecamatan;
        $address->village_id   = $request->id_desa;
        $address->update();
        $url = $request->url;
        if ($url != null) {
            return redirect('transaction/' . $url);
        } else {
            return redirect('transaction');
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
        if ($url != null) {
            return redirect('transaction/' . $url);
        } else {
            return redirect('transaction');
        }
    }
}
