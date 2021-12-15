<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class contactController extends Controller
{
  
    public function getData()
    {
        $data = DB::table('contactmanager')->get();
       // return $data;
        return view('contactManager',['data'=> $data]);
    }
    public function save(Request $req )
    {       
        DB::table('contactmanager')->insert([
            'name'=>$req->input('name'),
            'email'=>$req->input('email'),
            'phone'=>$req->input('phone'),
            'image'=>$req->input('image')
        ]);
        return redirect('/');
    }
    public function deleteData($id)
    {
        DB::table('contactmanager')->where('contactId',$id)->delete();
        return redirect('/');
    }
}
