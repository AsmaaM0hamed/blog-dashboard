<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\tag;
use Illuminate\Http\Request;

class tagcontroller extends Controller
{

    public function index()
    {
        //
        $tag=tag::all();
        return response($tag,200,['ok']);

    }


public function insert(Request $request)
{
    $tag= tag::create($request->all());
    $aray=array('data'=>$tag,
       'mas'=>"تم اضافة البيانات بنجاح",
       'status'=>201,);
       return response($aray);
}


}
