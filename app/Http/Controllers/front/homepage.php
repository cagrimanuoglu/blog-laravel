<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use App\Models\Page;
use App\Models\Contact;

use Validator;

class homepage extends Controller
{
  public function __construct()
  {
    view()->share('pages',Page::orderBy('order','ASC')->get()); // butun controller lar ıcın gecerlı satır.
  }

    public function index()
    {

      $data['articles']=Article::orderBy('id','DESC')->paginate(3);



      $data['articles']->withPath(url('yazilar/sayfa'));
      $data['categories']=Category::inRandomOrder()->get();

      $data['pages']=Page::orderBy('order','ASC')->get();

      return view('front.homepage',$data);
    }

    public function single($category,$slug)
    {
      $cat=Category::whereSlug($category)->first()?? abort(404);
      $article=Article::where('string',$slug)->whereCategoryId($cat->id)->first() ?? abort(404);

      $article->increment('hit');
      $data['article']=$article;

      $data['categories']=Category::inRandomOrder()->get();
      return view('front.single',$data);
    }

    public function category($slug)
    {
      $cat=Category::whereSlug($slug)->first()?? abort(404);
      $data['category']=$cat;
      $data['articles']=Article::where('category_id',$cat->id)->get();
      $data['categories']=Category::inRandomOrder()->get();
      return view('front.category',$data);
    }

    public function page($slug)
    {  $data['pages']=Page::orderBy('order','ASC')->get();
      $page=Page::whereSlug($slug)->first()?? abort(404);
      $data['page']=$page;

      return view('front.page',$data);


    }

    public function contact()
    {
      return view('front.contact');
    }

    public function contactPost(Request $request)
    {

      $rules=[
        'name'=>'required|min:5',
        'email'=>'required|email',
        'topic'=>'required',
        'message'=>'required|min:10'

      ];

    $validate=  Validator::make($request->post(),$rules);

    if($validate->errors())
    {
  return  redirect()->route('contact')->withErrors($validate)->withInput();
    }


      $contact=new Contact;
      $contact->name=$request->name;
      $contact->email=$request->email;
      $contact->topic=$request->topic;
      $contact->message=$request->message;
      $contact->save();
      return redirect()->route('contact')->with('success','Mesajınız iletildi.');

    }






}
