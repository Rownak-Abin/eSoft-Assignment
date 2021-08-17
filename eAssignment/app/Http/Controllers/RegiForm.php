<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Http;

class RegiForm extends Controller
{
   function FormSubmit(){

       return view('Member.signup');

    }

    function insertMember(UserRequest $req){

        if($req->pass == $req->passConf){

            if($req->hasFile('photo') && $req->hasFile('nid')){

            $nid = $req->file('nid');  
            $photo = $req->file('photo');
            $ldate = date('Y-m-d');
           

            if($nid->move('contents', $nid->getClientOriginalName()) && $photo->move('contents', $photo->getClientOriginalName())){

                DB::table('member')->insert(
                             array(
                               
                                'name'   =>  $req->nm,
                                'address'   =>  $req->address,
                                'phone' => $req->phn,
                                'district'   =>  $req->dist,
                                'nid' => $nid->getClientOriginalName(),
                                'photo' => $photo->getClientOriginalName(),
                                'fee' => $req->fee,
                                'user_id' => $req->email,
                                'pass' => $req->pass,
                                'conPass' => $req->pass,
                                'created_at' => $ldate
                             )
                        );
                
                
               return redirect()->back()->with('message', 'Successfully Added!');
                    
                    
                 
            }
    }
}
            else{
                echo "Passwords should be matched";
            }
}
}
