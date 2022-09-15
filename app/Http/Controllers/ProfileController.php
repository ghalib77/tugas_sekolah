<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
       return view('pages.profile.index',[
         "biodata"=>Biodata::where('email', Auth::user()->email)->firstOrFail(),
       ]);
    }
}
