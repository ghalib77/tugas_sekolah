<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\Datatables\Facades\Datatables;

use App\Models\Biodata;
use App\Models\Kelas;

class BiodataController extends Controller
{

   public function index(){
      return view("pages.biodata.index");
   }

   public function addIndex(){
      return view("pages.biodata.create",[
        "kelas"=>Kelas::all()
      ]);
   }

   public function editIndex($query){
    $data=Biodata::findOrFail($query);
    return view("pages.biodata.edit",[
      "query"=>$data,
      "kelas"=>Kelas::all()
    ]);
   }

   public function datatables(){
    $query=Biodata::with(['kelas']);
    return Datatables($query)
          ->addColumn('action', function($query){
            return "<div class='row'><button class='col-sm-12 mb-2 btn btn-sm btn-danger btn-delete-data' data-id='$query->id'>Hapus</button><a href='/biodata/edit/$query->id' class='btn btn-sm btn-primary btn-edit-data col-sm-12 gap-2' data-id='$query->id'>Edit</a></div>";
          })
          ->addIndexColumn()
          ->rawColumns(['action'])
          ->make();
   }

    public function delete(Request $req){
      $id=$req->input('id');

      try{
          Biodata::destroy($id);
          return response()->json(200);
      }catch(\Throwable $th){
          return abort(500, $th->getMessage());
      }
    }

    public function store(Request $req){
       $validatedData=$req->validate([
        "nama"=>"required|max:255",
        "NIS"=>"required|unique:biodata",
        "kelas_id"=>"required",
        "tempat_lahir"=>"required",
        "tanggal_lahir"=>"required",
        "email"=>"required|unique:biodata"
       ],
       [
       'nama.required' => 'kolom nama harus diisi',
       'NIS.required' => 'kolom NIS harus diisi',
       'kelas_id.required' => 'kolom kelas harus diisi',
       'tempat_lahir.required' => 'kolom tempat lahir harus diisi',
       'tanggal_lahir.required' => 'kolom tanggal lahir harus diisi',
       'email.required'=> 'kolom email harus diisi',
       'email.unique'=>'email sudah ada yang punya'
       ]
      );

        if($validatedData){
          Biodata::create($validatedData);
          return redirect("/biodata")->with("sukses", "Tambah data sukses");
       }
    }

    public function update(Request $req, $id){
      $currentData=Biodata::findOrFail($id);
      $validatedData=$req->validate([
        "nama"=>"required|max:255",
        "NIS"=>"required",
        "kelas_id"=>"required",
        "tempat_lahir"=>"required",
        "tanggal_lahir"=>"required",
        "email"=>"required"
       ],
       [
       'nama.required' => 'kolom nama harus diisi',
       'NIS.required' => 'kolom NIS harus diisi',
       'kelas_id.required' => 'kolom kelas harus diisi',
       'tempat_lahir.required' => 'kolom tempat lahir harus diisi',
       'tanggal_lahir.required' => 'kolom tanggal lahir harus diisi',
       'email.required'=> 'kolom email harus diisi',
       ]
      );

      
      if($req->email !== $currentData->email){
        $validatedData=$req->validate([
          "email"=>"unique:biodata"
         ],
         [
         'email.unique'=>'email sudah ada yang punya'
         ]
        ); 
      }else if($req->NIS !== $currentData->NIS){
        $validatedData=$req->validate([
          "NIS"=>"unique:biodata",
         ],
         [
         'NIS.unique"=>"NIS sudah ada yang punya',
         ]
        ); 
      }

      if($validatedData){
          $currentData->update($validatedData);
          return redirect("/biodata")->with("sukses", "Edit data sukses");
      }
    }

}
