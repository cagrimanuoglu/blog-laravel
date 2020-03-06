<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index()
    {

      $pages=Page::all();
      return view('back.pages.index',compact('pages'));
    }

    public function create()
    {
      return view('back.pages.create');
    }

    public function edit($id)
    {
      $page=Page::findOrFail($id);
      return view('back.pages.update',compact('page'));
    }

    public function editPost(Request $request,$id)
    {

      $request->validate([
        'title'=>'min:3',
        'image'=>'image|mimes:jpeg,png,jpg|max:2048'

      ]);

      $page=Page::findOrFail($id);

      $page->title=$request->title;
      $page->content=$request->content;
      if($request->hasFile('image'))
      {
        $imageName=str_slug($request->title).'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
        $page->image='/uploads/'.$imageName;
      }
      $page->save();
      toastr()->success('Başarılı', 'Sayfa Başarıyla güncellendi');
      return redirect()->route('page.index');

    }

    public function delete($id)
    {
      Page::find($id)->delete();
      toastr()->success('Sayfa başarıyla silindi');
      return redirect()->route('page.index');
    }


    public function post(Request $request)
    {


      $request->validate([
        'title'=>'min:3',
        'image'=>'required|image|mimes:jpeg,png,jpg|max:2048'
      ]);

      $isExist=Page::whereSlug(str_slug($request->title))->first();
      if($isExist)
      {
        toastr()->error($request->title.' adında bir sayfa mevcut');
        return redirect()->back();
      }
      $last=Page::orderBy('order','desc')->first();
      $page = new Page;

      $page->title=$request->title;
      $page->content=$request->content;
      $page->slug=str_slug($request->title);
      $page->order=$last->order+1;

      if($request->hasFile('image'))
      {
        $imageName=str_slug($request->title).'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads'),$imageName);
        $page->image='/uploads/'.$imageName;
      }
      $page->save();
      toastr()->success('Başarılı', 'Sayfa Başarıyla oluşturuldu');
      return redirect()->route('page.index');

    }






    public function switch(Request $request)
    {
      $page=Page::findOrFail($request->id);
      $page->status=$request->statu=="true" ? 1 : 0;
      $page->save();
    }

}
