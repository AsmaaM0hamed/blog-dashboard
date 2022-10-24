<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class usercontroler extends Controller
{
    //
    public function index()
    {
        //
        $User=User::all();
        return response($User,200,['ok']);

    }


public function insert(Request $request)
{
    $User= User::create($request->all());
    $aray=array('data'=>$User,
       'mas'=>"تم اضافة البيانات بنجاح",
       'status'=>201,);
       return response($aray);
}

}
