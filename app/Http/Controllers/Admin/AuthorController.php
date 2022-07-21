<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use Image;
use Carbon\Carbon;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.author.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['authors'] = Author::latest()->get();
        return view('admin.author.index',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'email' =>'required',
            'phone' =>'required',

        ],
        [
            'name.required'=>'Please Write The Author Name',
            'email.required'=>'Please Write The Author email',
            'phone.required'=>'Please Write The Author phone',

        ]);

        $image = $request->file('photo');
        $image_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/author/'.$image_gen);
        $save_url = 'upload/author/'.$image_gen;

        Author::insert([
            'name' =>$request->name,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'photo'=>$save_url,
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message' => "Author Inserted Succesfully",
            'alert-type'=>'success',
        );
        return Redirect()->route('authors.create')->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['authors'] = Author::findOrFail($id);
        return view('admin.author.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $old_image = $request->old_image;
        if($request->file('photo')){
            unlink($old_image);
            $photo = $request->file('photo');
            $name_gen = hexdec(uniqid()).'.'.$photo->getClientOriginalExtension();
            Image::make($photo)->resize(870,370)->save('upload/author/'.$name_gen);
            $save_url= 'upload/author/'.$name_gen;

            Author::findOrFail($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'photo'=>$save_url,
            ]);

            $notification = array(
                'message' =>'Author Updated Successfully',
                'alert-type'=>"success",
            );
            return Redirect()->route('authors.create')->with($notification);

        }else{
            Author::findOrFail($id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,

            ]);

            $notification = array(
                'message' =>'Author Updated Without Image Successfully',
                'alert-type'=>"success",
            );
            return Redirect()->route('authors.create')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $authors = Author::find($id);
        $authors->delete();

        $notification = array(
            'message' =>'Author Deleted Successfully',
            'alert-type'=>"success",
        );
        return Redirect()->back()->with($notification);
    }
}
