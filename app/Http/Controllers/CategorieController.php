<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{

    public function index()
    {
        //
        $categories=categorie::all();
        return view('dashboard.categories.allcategories',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.categories.addcategories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $img=$request->img;
        $imgName=time().".".$img->getClientOriginalExtension();
        $img->move('categors',$imgName);

        categorie::create
        ([
            "title"=>$request->title,
            "img"=>$imgName,
        ]);
        return redirect()->back()->with('cat','تم اضافة القسم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $cat= categorie::findorfail($id);
        return view("dashboard.categories.editcategories",compact('cat'));

    }



    public function update(Request $request,$id)
    {
        //
        if(isset($request->img)){
            $img=$request->img;
            $imgName=time().".".$img->getClientOriginalExtension();
            $img->move('categors',$imgName);

            categorie::where('id',$id)->update
            ([
                "title"=>$request->title,
                "img"=>$imgName,
            ]);
            return redirect()->route('categories.index')->with('edit',"تم تعديل القسم بنجاح");
        }
        else
        {
            return redirect()->route('categories.index');

        }



    }

    public function destroy($id)
    {
        //
        categorie::destroy($id);
        return redirect()->back()->with("delet","تم الحذف بنجاح");
    }
}
