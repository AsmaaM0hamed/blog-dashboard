<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function index()
    {
        //
       $users=User::where('type','writer')->get();

       return view('dashboard.writers.allwriters',compact('users'));

    }


    public function create()
    {
        //
       return view('dashboard.writers.addwriters');

    }


    public function store(Request $request)
    {
        //
        User::create
        ([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>$request->pass,
            'type'=>'writer',
        ]);

        return redirect()->back()->with("add","تم اضافة الكاتب بنجاح");
    }


    public function show($id)
    {
        //
        $users =User::find($id);

       return view('dashboard.writers.numberposts',compact('users'));
    }


    public function edit($id)
    {
        //
        $user=User::findorfail($id);
        return view('dashboard.writers.editwriters',compact('user'));

    }


    public function update(Request $request, $id)
    {
        //
      User::where('id',$id)->update
      ([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->pass,
      ]);
      return redirect()->route('users.index')->with('edit',"تم تحديث البيانات بناج");
    }


    public function destroy($id)
    {
        //
        User::destroy($id);
        return redirect()->back()->with('delet',"تم حذف الكاتب بنجاح");
    }
}
