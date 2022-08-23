<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\FooterSettings;

class FooterSettingsController extends Controller
{
    public function index(){
        $items = FooterSettings::latest()->get();
        return view('admin.seetings.footer_seetings.index',compact('items'));
    }
    public function create(){
        return view('admin.seetings.footer_seetings.create');
    }
    public function store(Request $request){
        $request->validate([
            'fb_url' =>'required',
            'twitter_url' =>'required',
            'linkedin_url' =>'required',
            'lctn_add' =>'required',
            'lctn_phone' =>'required',
            'lctn_email' =>'required',


        ],
        [
            'fb_url.required' => 'Please Write The Facebook Url',
            'twitter_url.required' => 'Please Insert The Twitter Url',
            'linkedin_url.required' => 'Please Insert The Linkedin Url',
            'lctn_add.required' => 'Please Insert The Location Address',
            'lctn_phone.required' => 'Please Insert The Location Phone',
            'lctn_email.required' => 'Please Insert The Location Email',

        ]);
        $dataInsert = new FooterSettings();
        $dataInsert-> fb_url =$request->fb_url;
        $dataInsert-> twitter_url =$request->twitter_url;
        $dataInsert-> linkedin_url =$request->linkedin_url;
        $dataInsert-> lctn_add =$request->lctn_add;
        $dataInsert-> lctn_phone =$request->lctn_phone;
        $dataInsert-> lctn_email =$request->lctn_email;
        $dataInsert->save();

        $notification = array(
            'message' => "Footer Settings Inserted Succesfully",
            'alert-type'=>'success',
        );

        return Redirect()->route('footer.settings.view')->with($notification);
    }
    public function edit($id){
        $data = FooterSettings::findOrFail($id);
        return view('admin.seetings.footer_seetings.edit',compact('data'));
    }
    public function update(Request $request,$id){

        $update = FooterSettings::findOrFail($id)->update([
            'fb_url' =>$request->fb_url,
            'twitter_url' =>$request->twitter_url,
            'linkedin_url' =>$request->linkedin_url,
            'lctn_add' =>$request->lctn_add,
            'lctn_phone' =>$request->lctn_phone,
            'lctn_email' =>$request->lctn_email,

        ]);
        $notification = array(
            'message' => "Footer Settings Updated Succesfully",
            'alert-type'=>'success',
        );

        return Redirect()->route('footer.settings.view')->with($notification);
    }
    //update method end

    //delete method start

    public function delete($id){
        FooterSettings::findOrFail($id)->delete();
        $notification = array(
            'message' => "Footer Settings Deleted Succesfully",
            'alert-type'=>'success',
        );

        return Redirect()->route('footer.settings.view')->with($notification);
    }


    //delete method end
    

}
