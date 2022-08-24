<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterMenu;
use App\Models\GeneralMenu;

class FooterMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $items = FooterMenu::latest()->get();

        return view('admin.menu.footer_menu.index',compact('items'));
    }
    public function show(){
        $generals = GeneralMenu::latest()->where('status',1)->get();
        return view('admin.menu.footer_menu.create',compact('generals'));
    }
    public function store(Request $request){
        $request->validate([
            'general_menu_id' =>'required',
            'title' =>'required',
            'link' =>'required',
        ],
        [
            'general_menu_id.required' => 'Please Write The General Menu',
            'title.required' => 'Please Write The Litle',
            'link.required' => 'Please Write The Link',

        ]);
        $storeData = new FooterMenu();
        $storeData-> general_menu_id =$request->general_menu_id;
        $storeData-> title =$request->title;
        $storeData-> link =$request->link;
        $storeData->save();


        $notification = array(
            'message' => "Data Inserted Succesfully",
            'alert-type'=>'success',
        );
        return Redirect('footer_menu')->with($notification);
    }
    public function edit($id){
        $items = FooterMenu::findOrFail($id);
        $generals = GeneralMenu::latest()->where('status',1)->get();
        return view('admin.menu.footer_menu.edit',compact('items','generals'));
    }
    public function update(Request $request,$id){
        FooterMenu::findOrFail($id)->update([
            'general_menu_id' =>$request->general_menu_id,
            'title'=>$request->title,
            'link'=>$request->link,
        ]);
        $notification = array(
            'message' => "Data Updated Succesfully",
            'alert-type'=>'success',
        );
        return Redirect('footer_menu')->with($notification);
    }
    public function destroy($id){
        FooterMenu::findOrFail($id)->delete();
        $notification = array(
            'message' => "Data Deleted Succesfully",
            'alert-type'=>'success',
        );
        return Redirect('footer_menu')->with($notification);
    }
    public function inactive($id){
        FooterMenu::findOrFail($id)->update(['status'=>0]);
        $notification = array(
            'message' => "Data Inactive Succesfully",
            'alert-type'=>'success',
        );
        return Redirect('footer_menu')->with($notification);
    }
    public function active($id){
        FooterMenu::findOrFail($id)->update(['status'=>1]);
        $notification = array(
            'message' => "Data Active Succesfully",
            'alert-type'=>'success',
        );
        return Redirect('footer_menu')->with($notification);
    }

}
