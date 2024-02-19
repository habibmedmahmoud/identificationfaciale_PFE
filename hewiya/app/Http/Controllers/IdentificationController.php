<?php

namespace App\Http\Controllers;


use App\Models\Identification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request; 
use App\Http\Controllers;
use  Illuminate\Support\Facades\Auth;
use LDAP\Result;

class IdentificationController extends Controller
{
    public function index(){
        $identifications = Identification::all();
        return view('identifications.index',compact("identifications"));
    }

    public function show($id){
        $identification = Identification::find($id);
        return view('identifications.show',compact('identification'));
    }

    public function get_file($file){
        return Storage::response('images/'.$file);
    }
    
    public function store($id , Request $request){
        $identification = Identification::find($id);
        $identification->matching_human = $request->Pourcentage;
        $identification->save();
        return redirect()->back();
    }
    public function update( $id){
        $identification = Identification::find($id);
        $identification->matching = 0;
        $identification->save();
        return redirect()->back();
    }
}
    
  

   