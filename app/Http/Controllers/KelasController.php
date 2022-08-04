<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function getAllKelas(){
      return view("pages.kelas",[
        "kelas"=>Kelas::oldest("no_ruang")->get()
      ]);
    }

    public function getKelasDetail($query){
        return view("pages.kelasDetail",[
            "kelas"=>Kelas::where("kelas", "=", $query)->firstOrFail(),
            "biodata"=>Kelas::latest()->filter(request(["biodata"]))->get()->where("kelas", "=", $query)->firstOrFail()
        ]);
    }
}
