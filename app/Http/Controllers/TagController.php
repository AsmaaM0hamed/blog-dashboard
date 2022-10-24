<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags=tag::all();
        return view('dashboard.tags.alltags',compact('tags'));
    }
    public function create()
    {
        //
        return view("dashboard.tags.addtags");
    }

    public function store(Request $request)
    {
        //
        tag::create([
            'title'=>$request->title,
        ]);
        return redirect()->back()->with('add',"تم اضافة التاج بنجاح");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag=tag::findorfail($id);
        return view("dashboard.tags.edittags",compact('tag'));
    }

    public function update(Request $request, $id)
    {
        //
        tag::where('id',$id)->
        update([
            'title'=>$request->title,
        ]);
        return redirect()->route("tags.index")->with("edit","تم تعديل التاج بنجاخ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tag::destroy($id);
        return redirect()->back()->with('delete',"تم الحذف بنجاح");
    }
}
