<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $storeData = new Category();
        $storeData-> name =$request->name;
        $storeData ->slug = strtolower(str_replace(' ','-',$request->name));
        $storeData->save();


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
        $update = Category::findOrFail($id)->update([
            'name' =>$request->name,
            'slug' => strtolower(str_replace(' ','-',$request->name)),


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
    // public function upload(Request $request)
    // {
    //     if($request->hasFile('upload')) {
    //         $originName = $request->file('upload')->getClientOriginalName();
    //         $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //         $extension = $request->file('upload')->getClientOriginalExtension();
    //         $fileName = $fileName.'_'.time().'.'.$extension;

    //         $request->file('upload')->move(('images'), $fileName);

    //         $CKEditorFuncNum = $request->input('CKEditorFuncNum');
    //         $url = asset('images/'.$fileName);
    //         $msg = 'Image uploaded successfully';
    //         $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

    //         @header('Content-type: text/html; charset=utf-8');
    //         echo $response;
    //     }
    // }
}
