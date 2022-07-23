<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use Dipantry\Rajaongkir\Models\ROCity;
use App\Models\Village;

class IndoRegionController extends Controller
{
    public function getkabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabupatens = ROCity::where('province_id', $id_provinsi)->get();

        echo "<option selected disabled>Choose..</option>";
        foreach ($kabupatens as $kabupaten) {
            echo "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
    }

    public function getkecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        echo "<option selected disabled>Choose..</option>";
        foreach ($kecamatans as $kecamatan) {
            echo "<option value='$kecamatan->id'>$kecamatan->name</option>";
        }
    }

    public function getdesa(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $desas = Village::where('district_id', $id_kecamatan)->get();

        echo "<option selected disabled>Choose..</option>";
        foreach ($desas as $desa) {
            echo "<option value='$desa->id'>$desa->name</option>";
        }
    }
}