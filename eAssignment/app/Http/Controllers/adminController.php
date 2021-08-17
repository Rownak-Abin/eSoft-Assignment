<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class adminController extends Controller
{
    function adminLogin(){

        return view('Admin.index');

    }


    function verify(Request $req){
        

         $user = DB::table('admins')
                    ->where('name', $req->username)
                    ->where('password', $req->password)
                    ->first();

        if($user != null){
            $req->session()->put('username', $req->username);
            $req->session()->put('type', $req->username);

             return redirect()->route('admin.dash');
            
        }else{
            $req->session()->flash('msg', 'invalid username/password');
            return redirect('/admin');
          
        }
    }

    function getMembers(){

        $allmembers = DB::table('member')->simplePaginate(2);


        return view('Admin.dashboard')->with('members', $allmembers);              
    }

    function editMember($id){
        $editMem = DB::table('member')
                ->where('id', $id)
                ->first();

         return view('Admin.updateMember')->with('editMem', $editMem);       
    }

    function updateMember(Request $req, $id){
           if($req->pass == $req->passConf){

            if($req->hasFile('photo') && $req->hasFile('nid')){

            $nid = $req->file('nid');  
            $photo = $req->file('photo');
            $ldate = date('Y-m-d');
           

            if($nid->move('contents', $nid->getClientOriginalName()) && $photo->move('contents', $photo->getClientOriginalName())){

                DB::table('member')->where('id', $id)

                            ->update(
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

                return redirect()->route('admin.dash');
            }
    }
}
            else{
                echo "Passwords should be matched";
            }
    }

    function deleteMember($id){
        return view('Admin.delete');
    }

    function destroy($id){
        DB::table('member')->where('id', $id)->delete();
        return redirect()->route('admin.dash');
    }

    function getSearchpage(){
        return view('Admin.searchPage');
    }

    function search(Request $req){

        $from = $req->fromdate;
        $to = $req->todate;
        $key = $req->keyword;

        $result = DB::table('member')
                   
                    ->whereBetween('created_at', [$from,$to])
                    ->where('name', 'like', $key.'%')
                    ->get();

                  // echo $result->['fee'];

         return view('Admin.searchResult')->with('members', $result);  
    }

      function logout(Request $req){

        $req->session()->flush();
        return redirect('/admin');
    }
    }
