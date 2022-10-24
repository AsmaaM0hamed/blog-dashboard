<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\categorie;
use Illuminate\Http\Request;

class categorycontroler extends Controller
{
    //
    public function index()
    {
        //
        $categories=categorie::all();
        $aray=array('data'=>$categories,
        'image path'=>asset('categors/'),

        'status'=>201,);
        return response($aray);

    }


}
