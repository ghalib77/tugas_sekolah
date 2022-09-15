<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Facades\Datatables;

use App\Models\Kelas;

class KelasController extends Controller
{
    public function index(){
      return view('pages.kelas.index');
    }

    public function addIndex(){
      return view('pages.kelas.create');
    }

    public function editIndex($query){
      $data=Kelas::findOrFail($query);
      return view('pages.kelas.edit',[
        "query"=>$data
      ]);
    }

    public function datatables(){
      $query=Kelas::all();

      return Datatables($query)
            ->addColumn('action', function($query){
              return "<div class='row align-items-center justify-content-around'><button class='col-sm-4 mb-2 mb-2 btn btn-sm btn-danger btn-delete-data' data-id='$query->id'>Hapus</button><a href='/kelas/edit/$query->id' class='btn btn-sm btn-primary btn-edit-data col-sm-4 mb-2 mb-2' data-id='$query->id'>Edit</a></div>";
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make();
    }

    public function get(Request $req){
      $query=Kelas::all()->load(["biodata"]);

      if($req->ajax()){
        try{
          return response()->json([
            "kelas"=>$query
          ],200);
        }catch(\Throwable $th){
          abort(500, $th->getMessage());
        }
      }

    }

    public function store(Request $req){
      $validatedData=$req->validate([
       "kelas"=>"required|unique:kelas",
       "wali_kelas"=>"required|unique:kelas",
      ],
      [
        "kelas.required"=>"kelas harus diisi",
        "wali_kelas.required"=>"wali kelas harus diisi",
        "kelas.unique"=>"kelas sudah ada",
        "wali_kelas.unique"=>"wali kelas sudah ada"
      ]
     );

      if($validatedData){
        Kelas::create($validatedData);
        return redirect('/kelas')->with('sukses', 'tambah data sukses');
      }
    }

    public function update(Request $req, $id){
      $currentData=Kelas::findOrFail($id);
      $validatedData=$req->validate([
        "kelas"=>"required",
        "wali_kelas"=>"required"
      ],
      [
        "kelas.required"=>"kelas harus diisi",
        "wali_kelas.required"=>"wali kelas harus diisi",
      ]
      );

      if($req->kelas !== $currentData->kelas){
        $validatedData=$req->validate([
        "kelas"=>"unique:kelas",
        ],
        [
          "kelas.unique"=>"kelas sudah ada",
        ]
       );
      }else if($req->wali_kelas !== $currentData->wali_kelas){
        $validatedData=$req->validate([
           "wali_kelas"=>"unique:kelas",
          ],
          [
            "wali_kelas.unique"=>"wali kelas sudah ada"
          ]
         );
      }

      if($validatedData){
        $currentData->update($validatedData);
        return redirect('/kelas')->with('sukses', 'edit data sukses');
      }
    }

    public function delete(Request $req){
      $id=$req->input('id');

      try{
          Kelas::destroy($id);
          return response()->json(200);
      }catch(\Throwable $th){
          return abort(500, $th->getMessage());
      }
    }
}
