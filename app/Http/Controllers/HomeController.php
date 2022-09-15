<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;

class HomeController extends Controller
{
    public function index(){
        return view("pages.biodata.index",[
            "biodata"=>Biodata::all()
        ]);
    }
}
