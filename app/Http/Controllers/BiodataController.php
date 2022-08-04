<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kelas;
use Illuminate\Support\Facades\Session;

class BiodataController extends Controller
{

    public function saveBiodata(Request $request){
       $request->validate([
        "nama"=>"required|max:255",
        "NIS"=>"required|unique:Biodata",
        "kelas"=>"required",
        "tempat_lahir"=>"required",
        "tanggal_lahir"=>"required",
        "no_absen"=>"required"
       ],
       [
       'nama.required' => 'kolom nama harus diisi',
       'NIS.required' => 'kolom NIS harus diisi',
       'kelas.required' => 'kolom kelas harus diisi',
       'tempat_lahir.required' => 'kolom tempat lahir harus diisi',
       'tanggal_lahir.required' => 'kolom tanggal lahir harus diisi',
       'no_absen.required' => 'kolom No absen lahir harus diisi',
       ]
       );
       $kelas_id=collect(Kelas::all()->where("kelas", "=", $request->kelas))->first()->id;

       $data=Biodata::create([
        "nama"=>$request->nama,
        "NIS"=>$request->NIS,
        "kelas_id"=>$kelas_id,
        "tempat_lahir"=>$request->tempat_lahir,
        "tanggal_lahir"=>$request->tanggal_lahir,
        "no_absen"=>$request->no_absen
       ]);
       if($data){
          Session::flash("sukses", "Tambah data sukses");
          return redirect("/createpost");
       }
    }

    public function getBiodata(){
        return view("pages.biodata",[
            "biodata"=>Biodata::latest()->filter(request(["search"]))->get()->load("kelas"),
            "query"=>"biodata"
          ]);
    }

    public function getBiodataDetail($query){
        return view("pages.biodataDetail",[
            "biodata"=>Biodata::with("kelas")->where("NIS", "=", $query)->firstOrFail()
        ]);
    }

}
