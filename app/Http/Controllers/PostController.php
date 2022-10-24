<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use App\Models\post;
use App\Models\tag;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts=post::all();

        return view('dashboard.post.allpost',compact('posts'));


    }


    public function create()
    {
        //
       $users=User::all()->where('type','writer');
       $cats=categorie::all();
       $tags=tag::all();
        return view('dashboard.post.addpost',compact('users','cats','tags'));
    }

    public function store(Request $request)
    {

        $img=$request->img;
        $imgName=time().".".$img->getClientOriginalExtension();
        $img->move('postimg',$imgName);

       post::create([
        "title"=>$request->title,
        "desc"=>$request->desc,
        "img"=>$imgName,
        "categories_id"=>$request->cat_id,
        "user_id"=>$request->user_id,

         ]);

         return redirect()->back()->with("add","تم اضافة المنشور بنجاح");

    }


    public function show($id)
    {
        //
        $post=post::find($id);
        $tags=tag::all();
        return view('dashboard.post.addtagspost',compact('post','tags'));
    }


    public function edit($id)

    {
           $post=post::findorfail($id);
           $cats=categorie::all();
           $users=User::all();
           $tags=tag::all();
           return view('dashboard.post.editpost',compact('post','cats','users','tags'));
    }

    public function update(Request $request, $id)
    {
        //
       if(isset($request->img))
       {
        $img=$request->img;
        $imgName=time().".".$img->getClientOriginalExtension();
        $img->move('postimg',$imgName);
       }
       else{
        $imgName =post::where('id',$id)->select('img');

       }

       $post=post::find($id);
       $post->update
       ([
        "title"=>$request->title,
        "desc"=>$request->desc,
        "img"=>$imgName,
        "categories_id"=>$request->cat_id,
        "user_id"=>$request->user_id,

       ]);
       $post->tags()->sync($request->tags);

  return redirect()->route('post.index')->with("edit","تم تعديل البيانات بنجاح");

    }

    public function destroy($id)
    {
        //
        post::destroy($id);
        return redirect()->back()->with("delet","تم الحذف بنجاح");
    }

    public function add_tags(Request $request)
    {

             $post=post::find($request->post_id);
             $post->tags()->attach($request->tags);
            return redirect()->route('post.index')->with("tag","تم اضافة التاج بنجاح");


    }
}
