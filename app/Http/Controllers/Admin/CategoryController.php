<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function index(){
        $data['category']= Category::latest()->get();
        return view('admin.category.create',$data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',

        ],
        [
            'name.required' => 'Please Write The Category Name',

        ]);
        Category::insert([
            'name' =>$request->name,
            'slug' => strtolower(str_replace(' ','-',$request->name)),
            'created_at'=>Carbon::now(),
        ]);

        $notification = array(
            'message' => "Category Inserted Succesfully",
            'alert-type'=>'success',
        );
        return Redirect()->back()->with($notification);
    }
    public function CategoryInactive($id){
        Category::findOrFail($id)->update(['status'=> 0]);
        $notification = array(
            'message' =>'Category Inactive Successfully',
            'alert-type'=>"success",
        );
        return Redirect()->back()->with($notification);
    }
    public function CategoryActive($id){
        Category::findOrFail($id)->update(['status'=>1]);
        $notification = array(
            'message' =>'Category Active Successfully',
            'alert-type'=>"success",
        );
        return Redirect()->back()->with($notification);
    }
    public function edit($id){
        $data['items'] = Category::findOrFail($id);
        return view('admin.category.edit',$data);
    }
    public function update(Request $request,$id){



        Category::findOrFail($id)->update([
            'name' =>$request->name,
            'slug' => strtolower(str_replace(' ','-',$request->name)),
            'created_at'=>Carbon::now(),

        ]);
        $notification = array(
            'message' => "Category Updated Succesfully",
            'alert-type'=>'success',
        );
        return Redirect()->route('all.category')->with($notification);
    }
    public function delete($id){
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => "Category Deleted Succesfully",
            'alert-type'=>'success',
        );
        return Redirect()->back()->with($notification);

    }
}
