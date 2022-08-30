<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Article;
use Image;
use Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $items = Article::latest()->get();
        return view('admin.article.index',compact('items'));
    }
    public function create(){
        $categories = Category::where('status',1)->orderBy('name','ASC')->get();
        $subcategories = SubCategory::where('status',1)->orderBy('subcategory_name','ASC')->get();

        return view('admin.article.create',compact('categories','subcategories'));
    }
    public function store(Request $request){
        $request->validate([
            'cat_id' =>'required',

            'location' =>'required',
            'date' =>'required',
            'tags' =>'required',
            'title' =>'required',

            'long_description' =>'required',



        ],
        [
            'cat_id.required' => 'Please Select Category',

            'location.required' => 'Please Write The Location',
            'date.required' => 'Please Select Date',
            'tags.required' => 'Please Write The Tags',
            'title.required' => 'Please Write The Title',
            'long_description.required' => 'Please Write The Long Description',


        ]);
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/article/'.$name_gen);
        $save_url= 'upload/article/'.$name_gen;

        $dataInsert = new Article();
        $dataInsert-> cat_id =$request->cat_id;
        $dataInsert-> name =$request->name;

        $dataInsert-> location =$request->location;
        $dataInsert-> date =$request->date;
        $dataInsert-> tags =$request->tags;
        $dataInsert-> title =$request->title;
        $dataInsert-> latest_news =$request->latest_news;
        $dataInsert-> sports =$request->sports;
        $dataInsert-> long_description =$request->long_description;
        $dataInsert-> image =$save_url;
        $dataInsert->save();

        $notification = array(
            'message' => "Article Inserted Succesfully",
            'alert-type'=>'success',
        );

        return Redirect()->back()->with($notification);
    }
    public function edit($id){
        $categories = Category::where('status',1)->orderBy('name','ASC')->get();
        $subcategories = SubCategory::latest()->get();
        $items = Article::findOrFail($id);

        return view('admin.article.edit',compact('categories','subcategories','items'));
    }
    public function update(Request $request,$id){


        if ($image = $request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/article/'.$name_gen);
            $save_url= 'upload/article/'.$name_gen;

            $update = Article::findOrFail($id)->update([
                'cat_id' =>$request->cat_id,
                'name' =>$request->name,

                'location' =>$request->location,
                'date' =>$request->date,
                'tags' =>$request->tags,
                'title' =>$request->title,
                'latest_news' =>$request->latest_news,
                'sports' =>$request->sports,
                'long_description' =>$request->long_description,
                'image' =>$save_url,

            ]);
            $notification = array(
                'message' => "Articles Updated Succesfully",
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        } else {
            $update = Article::findOrFail($id)->update([
                'cat_id' =>$request->cat_id,
                'name' =>$request->name,

                'location' =>$request->location,
                'date' =>$request->date,
                'tags' =>$request->tags,
                'title' =>$request->title,
                'latest_news' =>$request->latest_news,
                'sports' =>$request->sports,
                'long_description' =>$request->long_description,


            ]);
            $notification = array(
                'message' => "Articles Updated Without Image Succesfully",
                'alert-type'=>'success',
            );
            return Redirect()->back()->with($notification);
        }

    }
    public function delete($id){
        Article::findOrFail($id)->delete();
        $notification = array(
            'message' => "Articles Deleted Succesfully",
            'alert-type'=>'success',
        );
        return Redirect()->back()->with($notification);
    }
    public function show(){
        $articles = Article::latest()->where('name',Auth::user()->name)->get();
        return view('admin.article.specific',compact('articles'));
    }
    public function inactive($id){
        Article::findOrFail($id)->update(['status'=> 0]);

        $notification = array(
            'message' =>'Article Inactive Successfully',
            'alert-type'=>"success",
        );
        return Redirect()->route('articles.index')->with($notification);
    }
    public function active($id){
        $ar = Article::findOrFail($id)->update(['status'=> 1]);

        $notification = array(
            'message' =>'Article active Successfully',
            'alert-type'=>"success",
        );
        return Redirect()->route('articles.index')->with($notification);
    }
    public function reject($id){
        $ar = Article::findOrFail($id)->update(['status'=> 2]);

        $notification = array(
            'message' =>'Article Reject Successfully',
            'alert-type'=>"success",
        );
        return Redirect()->route('articles.index')->with($notification);
    }
    public function view($id){
        $items = Article::findOrFail($id);
        return view('admin.article.view',compact('items'));
    }
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;

            $request->file('upload')->move(('images'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/'.$fileName);
            // $msg = 'Image uploaded successfully';, '$msg'
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }
}
