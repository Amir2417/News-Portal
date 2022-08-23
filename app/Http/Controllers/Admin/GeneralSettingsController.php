<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use Image;

class GeneralSettingsController extends Controller
{
    public function index(){
        $items = GeneralSettings::latest()->get();
        return view('admin.seetings.general_seetings.index',compact('items'));
    }
    public function store(Request $request){
        $request->validate([
            'title' =>'required',
            'favicon_image' =>'required',
            'logo_image' =>'required',
            'advertisement_image' =>'required',

        ],
        [
            'title.required' => 'Please Write The Name',
            'favicon_image.required' => 'Please Insert The Image',
            'logo_image.required' => 'Please Insert The Image',
            'advertisement_image.required' => 'Please Insert The Image',

        ]);
        // favicon_image
        $favicon_image = $request->file('favicon_image');
        $name_gen = hexdec(uniqid()).'.'.$favicon_image->getClientOriginalExtension();
        Image::make($favicon_image)->resize(870,370)->save('upload/favicon_image/'.$name_gen);
        $save_url= 'upload/favicon_image/'.$name_gen;

        // Logo_image
        $logo_image = $request->file('logo_image');
        $name_gen_logo = hexdec(uniqid()).'.'.$logo_image->getClientOriginalExtension();
        Image::make($logo_image)->resize(870,370)->save('upload/logo_image/'.$name_gen_logo);
        $save_url_logo= 'upload/logo_image/'.$name_gen_logo;

        // advertisement_image
        $advertisement_image = $request->file('advertisement_image');
        $name_ge = hexdec(uniqid()).'.'.$advertisement_image->getClientOriginalExtension();
        Image::make($advertisement_image)->resize(870,370)->save('upload/advertisement_image/'.$name_ge);
        $save_ur= 'upload/advertisement_image/'.$name_ge;


        $dataInsert = new GeneralSettings();
        $dataInsert-> title =$request->title;
        $dataInsert-> favicon_image =$save_url;
        $dataInsert-> logo_image =$save_url_logo;
        $dataInsert-> advertisement_image =$save_ur;
        $dataInsert->save();

        return Redirect()->back();
    }

    public function edit($id){
        $data = GeneralSettings::findOrFail($id);
        return view('admin.seetings.general_seetings.edit',compact('data'));
    }
    public function update(Request $request,$id){
        // favicon_image
        $favicon_image = $request->file('favicon_image');
        $name_gen = hexdec(uniqid()).'.'.$favicon_image->getClientOriginalExtension();
        Image::make($favicon_image)->resize(870,370)->save('upload/favicon_image/'.$name_gen);
        $save_url= 'upload/favicon_image/'.$name_gen;

        // Logo_image
        $logo_image = $request->file('logo_image');
        $name_gen_logo = hexdec(uniqid()).'.'.$logo_image->getClientOriginalExtension();
        Image::make($logo_image)->resize(870,370)->save('upload/logo_image/'.$name_gen_logo);
        $save_url_logo= 'upload/logo_image/'.$name_gen_logo;

        // advertisement_image
        $advertisement_image = $request->file('advertisement_image');
        $name_ge = hexdec(uniqid()).'.'.$advertisement_image->getClientOriginalExtension();
        Image::make($advertisement_image)->resize(870,370)->save('upload/advertisement_image/'.$name_ge);
        $save_ur= 'upload/advertisement_image/'.$name_ge;

        $update = GeneralSettings::findOrFail($id)->update([
            'title' =>$request->title,
            'favicon_image' =>$save_url,
            'logo_image' =>$save_url_logo,
            'advertisement_image' =>$save_ur,
        ]);
        return Redirect()->route('general.settings');
    }
    public function delete($id){
        GeneralSettings::findOrFail($id)->delete();
        return Redirect()->route('general.settings');
    }
    
}
