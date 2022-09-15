<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Biodata;

class RegController extends Controller
{
    public function index()
    {
        return view("pages.register.regTampil");
    }

    public function createIndex()
    {
        return view("pages.register.regTambah",[
            "biodata"=>Biodata::all() ?? []
        ]);
    }

    public function editIndex(User $query)
    {
        return view('pages.register.regEdit',[
            "query"=>$query
        ]);
    }

    public function datatables()
    {
        $query=User::all();
  
        return Datatables($query)
              ->addColumn('action', function($query){
                return "<div class='row align-items-center justify-content-around'><button class='col-sm-4 mb-2 mb-2 btn btn-sm btn-danger btn-delete-data' data-id='$query->id'>Hapus</button><a href='/register/edit/$query->id' class='btn btn-sm btn-primary btn-edit-data col-sm-4 mb-2 mb-2' data-id='$query->id'>Edit</a></div>";
              })
              ->addIndexColumn()
              ->rawColumns(['action'])
              ->make();
    }

    public function add(Request $request)
    {
        $request->validate([
            "first_name"=>"required",
            "last_name"=>"required",
            "email"=>"unique:user|email|required",
            "password"=>"required|required_with:password_confirm|same:password_confirm|min:8",
            "password_confirm"=>"min:8"
        ]);
        $fullName=$request->first_name . " " . $request->last_name;
        
        $data=User::create([
            "name"=>$fullName,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            "email_verified_at"=>date("Y-m-d H:i:s")
        ]);
    
        if($data){
            return redirect("/login")->with("sukses", "register success");
        }
    }

    public function update(Request $request, $id)
    {
        $currentData=User::findOrFail($id);

        $rules=[
        "name"=>"required",
        "email"=>"required|email",
        "password"=>"required|min:8",
        ];

        if($request->email != $currentData->email){
            $rules["email"]="unique:biodata";
        }
        $validateData=$request->validate($rules);

        $data=[
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>Hash::make($request->password),
            "email_verified_at"=>date("Y-m-d H:i:s")
        ];

        if($data){
        Biodata::where('email', $currentData->email)->firstOrFail()->update([
            "email"=>$data["email"]
        ]);
        $currentData->update($data);
        }

        return redirect("/register/data")->with("sukses", "update data sukses");
    }

    public function delete(Request $req){
        $id=$req->input('id');
  
        try{
            User::destroy($id);
            return response()->json(200);
        }catch(\Throwable $th){
            return abort(500, $th->getMessage());
        }
      }
}
