<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;

class postcontroler extends Controller
{
    //
    public function index()
    {
        //
        $categories=post::all();
        $aray=array('data'=>$categories,
        'image path'=>asset('postimg/'),

        'status'=>201,);
        return response($aray);

    }



}
