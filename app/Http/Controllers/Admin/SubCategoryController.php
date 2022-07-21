<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;

class SubCategoryController extends Controller
{
    public function index(){
        $data['categories'] = Category::orderBy('name','ASC')->get();
        $data['subcategory'] = SubCategory::latest()->get();
        return view('admin.subcategory.create',$data);
    }
    public function store(Request $request){
        $request->validate([
            'category_id' =>'required',
            'subcategory_name' =>'required',

        ],
        [
            'category_id.required' => 'Please Select Any Option',
            'subcategory_name.required' => 'Input SubCategory Name',

        ]);

        SubCategory::insert([
            'category_id' =>$request->category_id,
            'subcategory_name' =>$request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            'created_at'=>Carbon::now(),

        ]);
        $notification = array(
            'message' => "SubCategory Inserted Succesfully",
            'alert-type'=>'success',
        );
        return Redirect()->back()->with($notification);
    }

    public function edit($id){
        $data['categories'] = Category::orderBy('name','ASC')->get();
        $data['subcategory'] = SubCategory::findOrFail($id);
        return view('admin.subcategory.edit',$data);
    }
    public function update(Request $request,$id){

        SubCategory::findOrFail($id)->update([
            'category_id' =>$request->category_id,
            'subcategory_name' =>$request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),

        ]);
        $notification = array(
            'message' => "SubCategory Updated Succesfully",
            'alert-type'=>'success',
        );
        return Redirect()->route('all.subcategory')->with($notification);
    }
    public function delete($id){
        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => "SubCategory Deleted Succesfully",
            'alert-type'=>'success',
        );
        return Redirect()->back()->with($notification);
    }

    public function inactive($id){
        SubCategory::findOrFail($id)->update(['status'=> 0]);
        $notification = array(
            'message' =>'SubCategory Inactive Successfully',
            'alert-type'=>"success",
        );
        return Redirect()->back()->with($notification);
    }
    public function active($id){
        SubCategory::findOrFail($id)->update(['status'=>1]);
        $notification = array(
            'message' =>'SubCategory Active Successfully',
            'alert-type'=>"success",
        );
        return Redirect()->back()->with($notification);
    }
}
