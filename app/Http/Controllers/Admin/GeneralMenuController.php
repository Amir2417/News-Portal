<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralMenu;

class GeneralMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $items = GeneralMenu::latest()->get();
        return view('admin.menu.general_menu.index',compact('items'));
    }
    public function show(){
        return view('admin.menu.general_menu.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' =>'required',
            'key' =>'required',
            'position' =>'required',
        ],
        [
            'name.required' => 'Please Write The Name',
            'key.required' => 'Please Write The Key',
            'position.required' => 'Please Write The Position',

        ]);
        $storeData = new GeneralMenu();
        $storeData-> name =$request->name;
        $storeData-> key =$request->key;
        $storeData-> position =$request->position;
        $storeData->save();


        $notification = array(
            'message' => "Data Inserted Succesfully",
            'alert-type'=>'success',
        );
        return Redirect('general/menu/')->with($notification);
    }
    public function edit($id){
        $items = GeneralMenu::findOrFail($id);
        return view('admin.menu.general_menu.edit',compact('items'));
    }
    public function update(Request $request,$id){
        GeneralMenu::findOrFail($id)->update([
            'name' =>$request->name,
            'key'=>$request->key,
            'position'=>$request->position,
        ]);
        $notification = array(
            'message' => "Data Updated Succesfully",
            'alert-type'=>'success',
        );
        return Redirect('general/menu/')->with($notification);
    }
    public function destroy($id){
        GeneralMenu::findOrFail($id)->delete();
        $notification = array(
            'message' => "Data Deleted Succesfully",
            'alert-type'=>'success',
        );
        return Redirect('general/menu/')->with($notification);
    }
    public function inactive($id){
        GeneralMenu::findOrFail($id)->update(['status'=>0]);
        $notification = array(
            'message' => "Data Inactive Succesfully",
            'alert-type'=>'success',
        );
        return Redirect('general/menu/')->with($notification);
    }
    public function active($id){
        GeneralMenu::findOrFail($id)->update(['status'=>1]);
        $notification = array(
            'message' => "Data Active Succesfully",
            'alert-type'=>'success',
        );
        return Redirect('general/menu/')->with($notification);
    }

}
