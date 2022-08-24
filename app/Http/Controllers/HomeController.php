<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Article;
use App\Models\FooterSettings;
use App\Models\GeneralSettings;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }
    public function logout()
    {
        Auth::logout();
        return Redirect()->route('login');
    }
    public function CatProduct($id){

        $article = Article::where('cat_id',$id)->latest()->get();
        $categories = Category::findOrFail($id);
        $items = GeneralSettings::latest()->get();
		return view('frontend.latest',compact('article','categories','items'));


	}
    public function ArticleDetails($id){

        $articles = Article::findOrFail($id);
        $social_links = FooterSettings::latest()->get();

        $cat_id = $articles->cat_id;
        $related_articles = Article::where('cat_id',$cat_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
        $items = GeneralSettings::latest()->get();

        return view('frontend.single-post',compact('articles','related_articles','social_links','items'));
    }
    public function address(){
        $addresses = FooterSettings::latest()->get();
        return view('frontend.address',compact('addresses'));
    }
}
